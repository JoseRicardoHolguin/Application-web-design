@extends('layouts.app')
@section('title', 'Panel Administrador')

@section('content')
<div class="container py-5">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">
            <i class="bi bi-speedometer2 me-2"></i> Panel de Administración
        </h2>
    </div>

    <!-- Estadísticas -->
    <div class="row g-4 mb-4">

        <!-- Total -->
        <div class="col-md-3">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body text-center p-4">
                    <i class="bi bi-ticket-perforated-fill text-primary fs-1 mb-2"></i>
                    <h6 class="text-muted">Total Tickets</h6>
                    <h2 class="fw-bold text-primary">{{ $estadisticas['total'] }}</h2>
                </div>
            </div>
        </div>

        <!-- Pendientes -->
        <div class="col-md-3">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body text-center p-4">
                    <i class="bi bi-hourglass-split text-warning fs-1 mb-2"></i>
                    <h6 class="text-muted">Pendientes</h6>
                    <h2 class="fw-bold text-warning">{{ $estadisticas['pendientes'] }}</h2>
                </div>
            </div>
        </div>

        <!-- En Curso -->
        <div class="col-md-3">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body text-center p-4">
                    <i class="bi bi-arrow-repeat text-info fs-1 mb-2"></i>
                    <h6 class="text-muted">En Curso</h6>
                    <h2 class="fw-bold text-info">{{ $estadisticas['en_curso'] }}</h2>
                </div>
            </div>
        </div>

        <!-- Finalizados -->
        <div class="col-md-3">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body text-center p-4">
                    <i class="bi bi-check-circle-fill text-success fs-1 mb-2"></i>
                    <h6 class="text-muted">Finalizados</h6>
                    <h2 class="fw-bold text-success">{{ $estadisticas['finalizados'] }}</h2>
                </div>
            </div>
        </div>

    </div>

    <!-- Acciones -->
    <div class="d-flex flex-wrap gap-3">
        <a href="{{ route('admin.tickets.index') }}" class="btn btn-primary shadow-sm px-4">
            <i class="bi bi-list-check me-1"></i> Ver Tickets
        </a>

        <a href="{{ route('admin.usuarios.index') }}" class="btn btn-outline-secondary shadow-sm px-4">
            <i class="bi bi-people-fill me-1"></i> Gestionar Usuarios
        </a>
    </div>

</div>
@endsection