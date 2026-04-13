@extends('layouts.app')
@section('title', 'Panel Gerente')

@section('content')
<div class="container py-5">

    <!-- Título -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-success">
            <i class="bi bi-graph-up-arrow me-2"></i> Panel de Gerencia
        </h2>
        <a href="{{ route('gerente.reportes') }}" class="btn btn-success shadow-sm">
            <i class="bi bi-file-earmark-text me-1"></i> Ver Reportes
        </a>
    </div>

    <!-- Tarjetas -->
    <div class="row g-4">

        <!-- Total -->
        <div class="col-md-4">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body text-center p-4">
                    <div class="mb-2">
                        <i class="bi bi-bar-chart-fill text-success fs-1"></i>
                    </div>
                    <h6 class="text-muted">Total</h6>
                    <h2 class="fw-bold text-success">{{ $resumen['total'] }}</h2>
                </div>
            </div>
        </div>

        <!-- Críticos -->
        <div class="col-md-4">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body text-center p-4">
                    <div class="mb-2">
                        <i class="bi bi-exclamation-triangle-fill text-danger fs-1"></i>
                    </div>
                    <h6 class="text-muted">Críticos</h6>
                    <h2 class="fw-bold text-danger">{{ $resumen['criticos'] }}</h2>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection