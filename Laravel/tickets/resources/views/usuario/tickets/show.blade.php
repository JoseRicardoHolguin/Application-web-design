@extends('layouts.app')

@section('title', 'Detalle Ticket #{{ $ticket->numero_reporte }}')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white py-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-1 fw-bold">
                                <i class="bi bi-ticket-detailed me-3"></i>
                                #{{ $ticket->numero_reporte }}
                            </h2>
                            <p class="mb-0 opacity-75">Ticket de soporte</p>
                        </div>
                        <span class="badge fs-6 px-3 py-2 bg-{{ $ticket->status === 'pendiente' ? 'warning' : ($ticket->status === 'en_curso' ? 'info' : 'success') }} text-dark">
                            {{ ucfirst(str_replace('_', ' ', $ticket->status)) }}
                        </span>
                    </div>
                </div>
                <div class="card-body p-5">
                    <div class="row g-4 mb-5">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2"><i class="bi bi-person me-2"></i>Cliente</h6>
                            <h5 class="fw-semibold">{{ $ticket->cliente_nombre }}</h5>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2"><i class="bi bi-envelope me-2"></i>Email</h6>
                            <p class="lead">{{ $ticket->cliente_email }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2"><i class="bi bi-building me-2"></i>Departamento</h6>
                            <p class="lead">{{ ucfirst($ticket->departamento) }}</p>
                        </div>
                        <div class="col-md-3">
                            <h6 class="text-muted mb-2"><i class="bi bi-tag me-2"></i>Categoría</h6>
                            <span class="badge bg-secondary fs-6 px-3 py-2">{{ ucfirst($ticket->categoria) }}</span>
                        </div>
                        <div class="col-md-3">
                            <h6 class="text-muted mb-2"><i class="bi bi-exclamation-triangle me-2"></i>Urgencia</h6>
                            <span class="badge bg-{{ $ticket->nivel_urgencia === 'critica' ? 'danger' : ($ticket->nivel_urgencia === 'alta' ? 'warning' : 'info') }} fs-6 px-3 py-2">
                                {{ ucfirst($ticket->nivel_urgencia) }}
                            </span>
                        </div>
                        <div class="col-12">
                            <h6 class="text-muted mb-2"><i class="bi bi-chat-square-text me-2"></i>Descripción Corta</h6>
                            <p class="lead mb-0">{{ $ticket->descripcion_corta }}</p>
                        </div>
                        @if($ticket->descripcion_detallada)
                        <div class="col-12">
                            <h6 class="text-muted mb-2"><i class="bi bi-align-left me-2"></i>Descripción Detallada</h6>
                            <div class="bg-light p-4 rounded-3">
                                {!! nl2br(e($ticket->descripcion_detallada)) !!}
                            </div>
                        </div>
                        @endif
                        <div class="col-md-4">
                            <h6 class="text-muted mb-2"><i class="bi bi-calendar-event me-2"></i>Fecha Reporte</h6>
                            <p class="lead mb-0">{{ $ticket->fecha_reporte->format('d/m/Y H:i') }}</p>
                        </div>
                        @if($ticket->fecha_promesa)
                        <div class="col-md-4">
                            <h6 class="text-muted mb-2"><i class="bi bi-clock-history me-2"></i>Fecha Promesa</h6>
                            <p class="lead mb-0">{{ $ticket->fecha_promesa->format('d/m/Y H:i') }}</p>
                        </div>
                        @endif
                        @if($ticket->fecha_resolucion)
                        <div class="col-md-4">
                            <h6 class="text-muted mb-2"><i class="bi bi-check-circle me-2"></i>Fecha Resolución</h6>
                            <p class="lead mb-0">{{ $ticket->fecha_resolucion->format('d/m/Y H:i') }}</p>
                        </div>
                        @endif
                    </div>

                    <!-- Adjuntos del ticket -->
                    @if($ticket->attachments->count() > 0)
                    <h5 class="fw-bold mb-4 border-bottom pb-2">
                        <i class="bi bi-paperclip me-2"></i>
                        Adjuntos ({{ $ticket->attachments->count() }})
                    </h5>
                    <div class="row g-3">
                        @foreach($ticket->attachments as $attachment)
                        <div class="col-md-3 col-sm-6 mb-3">
                            @if($attachment->type === 'image')
                            <a href="{{ Storage::url($attachment->file_path) }}" target="_blank" class="text-decoration-none">
                                <img src="{{ Storage::url($attachment->file_path) }}" class="img-fluid rounded shadow-sm" style="height: 150px; object-fit: cover;">
                            </a>
                            @else
                            <a href="{{ Storage::url($attachment->file_path) }}" target="_blank" class="btn btn-outline-primary w-100 text-start text-truncate" title="{{ $attachment->original_name }}">
                                <i class="bi bi-file-earmark-text me-2"></i>{{ pathinfo($attachment->original_name, PATHINFO_FILENAME) }}
                            </a>
                            @endif
                            <small class="text-muted d-block mt-1">{{ Str::limit($attachment->original_name, 25) }}</small>
                            <small class="text-muted">{{ number_format($attachment->size / 1024, 1) }} KB</small>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i>No hay adjuntos para este ticket.
                    </div>
                    @endif

@if($ticket->comentarios_tecnico)
                    <hr class="my-5">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-tools me-2 text-warning"></i>
                        Comentarios del Técnico
                    </h5>
                    <div class="bg-light p-4 rounded-3">
                        {!! nl2br(e($ticket->comentarios_tecnico)) !!}
                    </div>
                    @endif

                    @if($ticket->ai_analysis)
                    <hr class="my-4">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-cpu me-2 text-primary"></i>
                        Análisis IA (Diagnóstico Automático)
                    </h5>
                    <div class="alert alert-info">
                        <strong>🤖 IA:</strong> {!! nl2br(e($ticket->ai_analysis)) !!}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
