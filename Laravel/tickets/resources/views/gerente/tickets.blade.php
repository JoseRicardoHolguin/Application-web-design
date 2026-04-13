@extends('layouts.app')

@section('title', 'Tickets - Gerente')

@section('content')
<div class="container py-5">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">
            <i class="bi bi-list-check me-2"></i>
            Todos los Tickets ({{ $tickets->count() }})
        </h2>
        <a href="{{ route('admin.tickets.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>
            Nuevo Ticket (Admin)
        </a>
    </div>

    @if($tickets->isEmpty())
        <div class="text-center py-5">
            <i class="bi bi-ticket-detailed display-1 text-muted mb-4"></i>
            <h4 class="text-muted">No hay tickets registrados</h4>
        </div>
    @else
        <!-- Tabla tickets -->
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-info text-white py-3">
                <h5 class="mb-0 fw-semibold">
                    <i class="bi bi-table me-2"></i>
                    Gestión de Tickets - Vista Gerente
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
                                <td><strong class="text-primary">#{{ $ticket->numero_reporte }}</strong></td>
                                <td>{{ $ticket->cliente_nombre }}</td>
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
                                <td>{{ $ticket->tecnico_asignado ?? 'Sin asignar' }}</td>
                                <td><small>{{ $ticket->fecha_reporte->format('d/m/Y H:i') }}</small></td>
                                <td>
                                    @if($ticket->fecha_resolucion)
                                        <small class="badge bg-success">{{ $ticket->fecha_resolucion->format('d/m/Y H:i') }}</small>
                                    @else
                                        <span class="text-muted">Pendiente</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.tickets.show', $ticket) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i> Ver
                                        </a>
                                        @if(!in_array($ticket->status, ['finalizada', 'cancelada']))
                                            <form method="POST" action="{{ route('tickets.cerrar', $ticket) }}" class="d-inline" onsubmit="return confirm('¿Cerrar este ticket?')">
                                                @csrf @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-check-circle"></i> Cerrar
                                                </button>
                                            </form>
                                        @endif
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
