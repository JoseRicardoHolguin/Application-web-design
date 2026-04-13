@extends('layouts.app')

@section('title', 'Crear Nuevo Ticket')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-success text-white py-4">
                    <h2 class="mb-0 fw-bold">
                        <i class="bi bi-ticket-perforated-fill me-3"></i>
                        Nuevo Ticket de Soporte
                    </h2>
                    <p class="mb-0 opacity-75 mt-2">Reporta tu problema detalladamente para una resolución rápida</p>
                </div>
                <div class="card-body p-5">
                    <!-- Form -->
                    <form method="POST" action="{{ route('usuario.tickets.store') }}">
                        @csrf

                        <!-- Descripción corta -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">* Descripción Corta</label>
                            <input type="text" 
                                   name="descripcion_corta" 
                                   class="form-control form-control-lg @error('descripcion_corta') is-invalid @enderror" 
                                   placeholder="Ej: 'No funciona el login en la app'" 
                                   value="{{ old('descripcion_corta') }}" required>
                            @error('descripcion_corta')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Categoría -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">* Categoría</label>
                            <select name="categoria" class="form-select form-select-lg @error('categoria') is-invalid @enderror" required>
                                <option value="">Selecciona...</option>
                                <option value="software" {{ old('categoria') == 'software' ? 'selected' : '' }}>Software</option>
                                <option value="hardware" {{ old('categoria') == 'hardware' ? 'selected' : '' }}>Hardware</option>
                                <option value="comunicaciones" {{ old('categoria') == 'comunicaciones' ? 'selected' : '' }}>Comunicaciones</option>
                                <option value="plataformas" {{ old('categoria') == 'plataformas' ? 'selected' : '' }}>Plataformas</option>
                                <option value="email" {{ old('categoria') == 'email' ? 'selected' : '' }}>Email</option>
                                <option value="otro" {{ old('categoria') == 'otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                            @error('categoria')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nivel de urgencia -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">* Nivel de Urgencia</label>
                            <select name="nivel_urgencia" class="form-select form-select-lg @error('nivel_urgencia') is-invalid @enderror" required>
                                <option value="">Selecciona...</option>
                                <option value="baja" {{ old('nivel_urgencia') == 'baja' ? 'selected' : '' }}>Baja</option>
                                <option value="media" {{ old('nivel_urgencia') == 'media' ? 'selected' : '' }}>Media</option>
                                <option value="alta" {{ old('nivel_urgencia') == 'alta' ? 'selected' : '' }}>Alta</option>
                                <option value="critica" {{ old('nivel_urgencia') == 'critica' ? 'selected' : '' }}>Crítica</option>
                            </select>
                            @error('nivel_urgencia')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Departamento -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">* Departamento/Area</label>
                            <input type="text" 
                                   name="departamento" 
                                   class="form-control form-control-lg @error('departamento') is-invalid @enderror" 
                                   placeholder="Ej: 'Ventas', 'TI', 'Recursos Humanos'" 
                                   value="{{ old('departamento') }}" required>
                            @error('departamento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Descripción detallada (opcional) -->
                        <div class="mb-5">
                            <label class="form-label fw-bold">Descripción Detallada (opcional)</label>
                            <textarea name="descripcion_detallada" 
                                      rows="6" 
                                      class="form-control @error('descripcion_detallada') is-invalid @enderror" 
                                      placeholder="Pasos para reproducir el error, screenshots, logs, etc...">{{ old('descripcion_detallada') }}</textarea>
                            @error('descripcion_detallada')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Botones -->
                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-success btn-lg px-5">
                                <i class="bi bi-check-circle me-2"></i>
                                Crear Ticket
                            </button>
                            <a href="{{ route('usuario.tickets.index') }}" class="btn btn-outline-secondary btn-lg px-5">
                                <i class="bi bi-arrow-left me-2"></i>
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center mt-4 text-muted">
                <small>Tu ticket recibirá un número automático como TKT-2024-0001</small>
            </div>
        </div>
    </div>
</div>
@endsection

