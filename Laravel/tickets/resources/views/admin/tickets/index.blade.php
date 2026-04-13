@extends('layouts.app')

@section('title', 'Tickets del Sistema - Admin')

@section('content')
<div class="container py-5">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">
            <i class="bi bi-list-check me-2"></i>
            Todos los Tickets ({{ $tickets->count() ?? $tickets->count() }})
        </h2>
    </div>

    @if($tickets->isEmpty())
        <div class="text-center py-5">
            <i class="bi bi-ticket-detailed display-1 text-muted mb-4"></i>
            <h4 class="text-muted">No hay tickets registrados</h4>
            <p class="text-muted">Los tickets aparecerán aquí cuando los usuarios los creen.</p>
        </div>
    @else
        <!-- Tabla tickets -->
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white py-3">
                <h5 class="mb-0 fw-semibold">
                    <i class="bi bi-table me-2"></i>
                    Gestión de Tickets
                </h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th># Ticket</th>
                            <th>Cliente</th>
                            <th>Status</th>
                            <th>Categoría</th>
                            <th>Urgencia</th>
                            <th>Técnico</th>
                            <th>Fecha Reporte</th>
                            <th>Fecha Resolución</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                            <tr class="{{ $ticket->status === 'pendiente' ? 'table-warning' : ($ticket->status === 'en_curso' ? 'table-info' : ($ticket->status === 'finalizada' ? 'table-success' : 'table-secondary')) }}">
                                <td>
                                    <strong class="text-primary">#{{ $ticket->numero_reporte }}</strong>
                                </td>
                                <td>{{ $ticket->cliente_nombre }}<br><small class="text-muted">{{ $ticket->cliente_email }}</small></td>
                                <td>
                                    <span class="badge bg-{{ $ticket->status === 'pendiente' ? 'warning' : ($ticket->status === 'en_curso' ? 'info' : ($ticket->status === 'finalizada' ? 'success' : 'secondary')) }}">
                                        {{ ucfirst(str_replace('_', ' ', $ticket->status)) }}
                                    </span>
                                </td>
                                <td>{{ ucfirst($ticket->categoria) }}</td>
                                <td>
                                    <span class="badge bg-{{ $ticket->nivel_urgencia === 'critica' ? 'danger' : ($ticket->nivel_urgencia === 'alta' ? 'warning' : ($ticket->nivel_urgencia === 'media' ? 'info' : 'secondary')) }}">
                                        {{ ucfirst($ticket->nivel_urgencia) }}
                                    </span>
                                </td>
                                <td>{{ $ticket->tecnico_asignado ?? 'Pendiente asignación' }}</td>
                                <td><small>{{ $ticket->fecha_reporte->format('d/m/Y H:i') }}</small></td>
                                <td>
                                    @if($ticket->fecha_resolucion)
                                        <span class="badge bg-success">Resuelto: {{ $ticket->fecha_resolucion->format('d/m/Y H:i') }}</span>
                                    @else
                                        <span class="text-muted">Pendiente</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.tickets.show', $ticket) }}" class="btn btn-sm btn-outline-primary" title="Ver detalle">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        @if(!in_array($ticket->status, ['finalizada', 'cancelada']))
                                            <form method="POST" action="{{ route('admin.tickets.update', $ticket) }}" class="d-inline" onsubmit="return confirm('¿Cerrar este ticket como finalizado? Se asignará fecha de resolución actual.')">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="finalizada">
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Cerrar ticket">
                                                    <i class="bi bi-check-circle"></i> Cerrar
                                                </button>
                                            </form>
                                        @endif
                                        <a href="{{ route('admin.tickets.edit', $ticket) }}" class="btn btn-sm btn-outline-warning" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.tickets.destroy', $ticket) }}" class="d-inline" onsubmit="return confirm('¿Eliminar permanentemente este ticket?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection

