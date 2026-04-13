@extends('app')
@section('title', 'Todos los Tickets')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
 <h2 class="fw-bold"> Tickets de Soporte</h2>
 <span class="text-muted">Total: {{ $tickets->count() }}</span>
</div>
@if($tickets->isEmpty())
 <div class="alert alert-info text-center">
 <a href="{{ route('admin.tickets.create') }}">Crea el
primero.</a>
 </div>
@else
<table class="table table-hover bg-white shadow-sm rounded">
 <thead class="table-dark">
 <tr>
 <th># Reporte</th><th>Cliente</th><th>Depto.</th>
 <th>Categoría</th><th>Urgencia</th><th>Status</th>
 <th>Técnico</th><th>Acciones</th>
 </tr>
 </thead>
 <tbody>
 @foreach($tickets as $ticket)
 <tr>
 <td><code>{{ $ticket->numero_reporte }}</code></td>
 <td>{{ $ticket->cliente_nombre }}</td>
 <td>{{ $ticket->departamento }}</td>
 <td>{{ ucfirst($ticket->categoria) }}</td>
 <td>
@php
 $color = [
   'baja' => 'success',
   'media' => 'info',
   'alta' => 'warning',
   'critica' => 'danger'
 ];
 $badge_color = $color[$ticket->nivel_urgencia] ?? 'secondary';
@endphp
 <span class="badge bg-{{ $badge_color }}">{{ ucfirst($ticket->nivel_urgencia) }}</span>
 </td>
 <td>
 <span class="badge badge-{{ $ticket->status }}">
 {{ ucfirst(str_replace('_',' ',$ticket->status)) }}
 </span>
 </td>
 <td>{{ $ticket->tecnico_asignado ?? '-' }}</td>
 <td>
 <a href="{{ route('admin.tickets.show',$ticket) }}"
 class="btn btn-sm btn-outline-primary">Ver</a>
 <a href="{{ route('admin.tickets.edit',$ticket) }}"
 class="btn btn-sm btn-outline-warning">Editar</a>
 @if(in_array(auth()->user()->rol, ['admin', 'gerente']) && !in_array($ticket->status, ['finalizada', 'cancelada']))
     <form action="{{ route('tickets.cerrar', $ticket) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Marcar este ticket como finalizado? Se asignará fecha de resolución actual.')">
         @csrf
         @method('PATCH')
         <input type="hidden" name="status" value="finalizada">
         <button class="btn btn-sm btn-danger">Cerrar</button>
     </form>
 @endif
 <form action="{{ route('admin.tickets.destroy',$ticket) }}"
method="POST"
 class="d-inline"
onsubmit="return confirm('¿Eliminar?')">
 @csrf @method('DELETE')
 <button class="btn btn-sm btn-outline-danger">Eliminar</button>
 </form>
 </td>
 </tr>
 @endforeach
 </tbody>
</table>
@endif
@endsection
