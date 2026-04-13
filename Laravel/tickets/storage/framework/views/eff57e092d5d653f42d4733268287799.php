
<?php $__env->startSection('title', 'Panel Administrador'); ?>

<?php $__env->startSection('content'); ?>
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
                    <h2 class="fw-bold text-primary"><?php echo e($estadisticas['total']); ?></h2>
                </div>
            </div>
        </div>

        <!-- Pendientes -->
        <div class="col-md-3">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body text-center p-4">
                    <i class="bi bi-hourglass-split text-warning fs-1 mb-2"></i>
                    <h6 class="text-muted">Pendientes</h6>
                    <h2 class="fw-bold text-warning"><?php echo e($estadisticas['pendientes']); ?></h2>
                </div>
            </div>
        </div>

        <!-- En Curso -->
        <div class="col-md-3">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body text-center p-4">
                    <i class="bi bi-arrow-repeat text-info fs-1 mb-2"></i>
                    <h6 class="text-muted">En Curso</h6>
                    <h2 class="fw-bold text-info"><?php echo e($estadisticas['en_curso']); ?></h2>
                </div>
            </div>
        </div>

        <!-- Finalizados -->
        <div class="col-md-3">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body text-center p-4">
                    <i class="bi bi-check-circle-fill text-success fs-1 mb-2"></i>
                    <h6 class="text-muted">Finalizados</h6>
                    <h2 class="fw-bold text-success"><?php echo e($estadisticas['finalizados']); ?></h2>
                </div>
            </div>
        </div>

    </div>

    <!-- Acciones -->
    <div class="d-flex flex-wrap gap-3">
        <a href="<?php echo e(route('admin.tickets.index')); ?>" class="btn btn-primary shadow-sm px-4">
            <i class="bi bi-list-check me-1"></i> Ver Tickets
        </a>

        <a href="<?php echo e(route('admin.usuarios.index')); ?>" class="btn btn-outline-secondary shadow-sm px-4">
            <i class="bi bi-people-fill me-1"></i> Gestionar Usuarios
        </a>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jrhro\OneDrive\Desktop\Escuela\8vo\Internet II\Application-web-design\Laravel\tickets\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>