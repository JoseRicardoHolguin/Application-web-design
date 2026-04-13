@extends('layouts.app')

@section('title', 'Mis Tickets')

@section('content')
<div class="container py-5">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">
            <i class="bi bi-list-check me-2"></i>
            Mis Tickets ({{ $tickets->count() }})
        </h2>
        <a href="{{ route('usuario.tickets.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>
            Nuevo Ticket
        </a>
    </div>

    @if($tickets->isEmpty())
        <div class="text-center py-5">
            <i class="bi bi-ticket-detailed display-1 text-muted mb-4"></i>
            <h4 class="text-muted">No tienes tickets creados</h4>
            <p class="text-muted">Crea tu primer ticket de soporte</p>
            <a href="{{ route('usuario.tickets.create') }}" class="btn btn-success btn-lg">
                <i class="bi bi-plus-circle me-2"></i>
                Crear Primer Ticket
            </a>
        </div>
    @else
        <!-- Tabla tickets -->
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-light border-0 py-3">
                <h5 class="mb-0 fw-semibold text-muted">
                    <i class="bi bi-table me-2"></i>
                    Historial de tickets
                </h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light sticky-top">
                        <tr>
                            <th>Nº Ticket</th>
                            <th>Estado</th>
                            <th>Categoría</th>
                            <th>Urgencia</th>
                            <th>Fecha</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                            <tr class="{{ $ticket->status === 'pendiente' ? 'table-warning' : ($ticket->status === 'en_curso' ? 'table-info' : 'table-success') }}">
                                <td>
                                    <strong class="text-primary">#{{ $ticket->numero_reporte }}</strong>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $ticket->status === 'pendiente' ? 'warning' : ($ticket->status === 'en_curso' ? 'info' : 'success') }}">
                                        {{ ucfirst($ticket->status) }}
                                    </span>
                                </td>
                                <td>{{ ucfirst($ticket->categoria) }}</td>
                                <td>
                                    <span class="badge bg-{{ $ticket->nivel_urgencia === 'critica' ? 'danger' : ($ticket->nivel_urgencia === 'alta' ? 'warning' : ($ticket->nivel_urgencia === 'media' ? 'info' : 'secondary')) }}">
                                        {{ ucfirst($ticket->nivel_urgencia) }}
                                    </span>
                                </td>
                                <td><small class="text-muted">{{ $ticket->fecha_reporte->format('d/m/Y H:i') }}</small></td>
                                <td>
                                    <a href="{{ route('usuario.tickets.show', $ticket) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i> Ver
                                    </a>
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

