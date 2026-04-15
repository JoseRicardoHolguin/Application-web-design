<?php
namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TicketWebController extends Controller
{
 // GET /tickets
 public function index()
 {
 $tickets = Ticket::orderBy('fecha_reporte', 'desc')->paginate(10);
 return view('admin.tickets.index', compact('tickets'));
 }
 // GET /tickets/create
 public function create()
 {
 return view('tickets.create');
 }
  // POST /tickets
 public function store(Request $request)
 {
 $validated = $request->validate([
     'numero_reporte' => 'required|string|max:20|unique:tickets',
     'cliente_nombre' => 'required|string|max:100',
     'cliente_email' => 'nullable|email|max:150',
     'departamento' => 'required|string|max:100',
     'categoria' => 'required|in:software,hardware,comunicaciones,plataformas,email,otro',
     'nivel_urgencia' => 'required|in:baja,media,alta,critica',
     'descripcion_corta' => 'required|string|max:255',
     'descripcion_detallada' => 'nullable|string',
     'attachments.*' => 'nullable|file|max:10240|mimes:jpg,jpeg,png,gif,pdf,doc,docx,txt,xls,xlsx',
 ]);

 $ticket = Ticket::create($request->except('attachments'));
 if ($request->hasFile('attachments')) {
     foreach ($request->file('attachments') as $file) {
         $path = $file->store('ticket-attachments', 'public');
         $ticket->attachments()->create([
             'original_name' => $file->getClientOriginalName(),
             'file_path' => $path,
             'mime_type' => $file->getMimeType(),
             'size' => $file->getSize(),
             'type' => str_starts_with($file->getMimeType(), 'image/') ? 'image' : 'document',
         ]);
     }
 }
 return redirect()->route('admin.tickets.index')
 ->with('success', 'Ticket creado con adjuntos exitosamente.');
 }
 // GET /tickets/{ticket}
 public function show(Ticket $ticket)
 {
 return view('tickets.show', compact('ticket'));
 }
 // GET /tickets/{ticket}/edit
 public function edit(Ticket $ticket)
 {
 return view('tickets.edit', compact('ticket'));
 }
 // PATCH/PUT /admin/tickets/{ticket} - Update ticket, auto-set fecha_resolucion if finalizada
 public function update(Request $request, Ticket $ticket)
 {
     $validated = $request->validate([
         'status' => 'sometimes|required|in:pendiente,en_curso,en_espera,cancelada,finalizada',
         'tecnico_asignado' => 'sometimes|nullable|string|max:100',
         'comentarios_tecnico' => 'sometimes|nullable|string',
         'fecha_promesa' => 'sometimes|nullable|date|after:fecha_reporte',
     ]);

     $oldStatus = $ticket->status;
     $ticket->update($validated);

     // Auto-set fecha_resolucion if changing to finalizada
     if (isset($validated['status']) && $validated['status'] === 'finalizada' && $oldStatus !== 'finalizada') {
         $ticket->update(['fecha_resolucion' => now()]);
         $message = '¡Ticket cerrado exitosamente!';
     } else {
         $message = 'Ticket actualizado correctamente.';
     }

     return redirect()->route('admin.tickets.index')
         ->with('success', $message);
 }
 // DELETE /tickets/{ticket}
 /**
  * PATCH /tickets/{ticket}/cerrar - Cierra ticket como finalizado
  */
 public function cerrar(Ticket $ticket)
 {
     if (in_array($ticket->status, ['finalizada', 'cancelada'])) {
         return redirect()->back()->with('error', 'Este ticket ya está cerrado o cancelado.');
     }

     $ticket->update([
         'status' => 'finalizada',
         'fecha_resolucion' => now()
     ]);

     return redirect()->route('admin.tickets.index')
         ->with('success', '¡Ticket cerrado exitosamente!');
 }

 public function destroy(Ticket $ticket)
 {
 $ticket->delete();
 return redirect()->route('admin.tickets.index')
 ->with('success', 'Ticket eliminado.');
 }
}

