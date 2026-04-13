@extends('layouts.app')

@section('title', 'Gestión de Usuarios')

@section('content')
<div class="container py-5">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">
            <i class="bi bi-people-fill me-2"></i>
            Gestión de Usuarios
        </h2>
        <a href="{{ route('admin.tickets.index') }}" class="btn btn-outline-primary">
            <i class="bi bi-arrow-left me-1"></i> Volver a Dashboard
        </a>
    </div>

    <!-- Alert si no hay usuarios -->
    @if($usuarios->isEmpty())
        <div class="alert alert-info">
            <i class="bi bi-info-circle me-2"></i>
            No hay usuarios registrados. Crea algunos desde el panel de registro.
        </div>
    @else
        <!-- Tabla responsive -->
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white py-3">
                <h5 class="mb-0">
                    <i class="bi bi-table me-2"></i>
                    Lista de {{ $usuarios->count() }} usuario{{ $usuarios->count() !== 1 ? 's' : '' }}
                </h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <strong>{{ $user->name }}</strong>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge bg-{{ $user->rol === 'admin' ? 'danger' : ($user->rol === 'gerente' ? 'warning' : 'secondary') }}">
                                        {{ ucfirst($user->rol) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('admin.usuarios.show', $user) }}" class="btn btn-outline-primary" title="Ver">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.usuarios.cambiar-rol', $user) }}" class="d-inline">
                                            @csrf @method('PATCH')
                                            <select name="rol" onchange="this.form.submit()" class="form-select form-select-sm" style="width: auto;">
                                                <option value="admin" {{ $user->rol === 'admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="gerente" {{ $user->rol === 'gerente' ? 'selected' : '' }}>Gerente</option>
                                                <option value="usuario" {{ $user->rol === 'usuario' ? 'selected' : '' }}>Usuario</option>
                                            </select>
                                        </form>
                                        <form method="POST" action="{{ route('admin.usuarios.destroy', $user) }}" class="d-inline" onsubmit="return confirm('¿Eliminar a {{ $user->name }}?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" title="Eliminar">
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

