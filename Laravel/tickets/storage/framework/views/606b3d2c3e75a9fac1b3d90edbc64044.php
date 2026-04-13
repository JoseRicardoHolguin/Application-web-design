

<?php $__env->startSection('title', 'Tickets - Gerente'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">
            <i class="bi bi-list-check me-2"></i>
            Todos los Tickets (<?php echo e($tickets->count()); ?>)
        </h2>
        <a href="<?php echo e(route('admin.tickets.create')); ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>
            Nuevo Ticket (Admin)
        </a>
    </div>

    <?php if($tickets->isEmpty()): ?>
        <div class="text-center py-5">
            <i class="bi bi-ticket-detailed display-1 text-muted mb-4"></i>
            <h4 class="text-muted">No hay tickets registrados</h4>
        </div>
    <?php else: ?>
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
                        <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="<?php echo e($ticket->status === 'pendiente' ? 'table-warning' : ($ticket->status === 'en_curso' ? 'table-info' : ($ticket->status === 'finalizada' ? 'table-success' : 'table-secondary'))); ?>">
                                <td><strong class="text-primary">#<?php echo e($ticket->numero_reporte); ?></strong></td>
                                <td><?php echo e($ticket->cliente_nombre); ?></td>
                                <td>
                                    <span class="badge bg-<?php echo e($ticket->status === 'pendiente' ? 'warning' : ($ticket->status === 'en_curso' ? 'info' : ($ticket->status === 'finalizada' ? 'success' : 'secondary'))); ?>">
                                        <?php echo e(ucfirst(str_replace('_', ' ', $ticket->status))); ?>

                                    </span>
                                </td>
                                <td><?php echo e(ucfirst($ticket->categoria)); ?></td>
                                <td>
                                    <span class="badge bg-<?php echo e($ticket->nivel_urgencia === 'critica' ? 'danger' : ($ticket->nivel_urgencia === 'alta' ? 'warning' : ($ticket->nivel_urgencia === 'media' ? 'info' : 'secondary'))); ?>">
                                        <?php echo e(ucfirst($ticket->nivel_urgencia)); ?>

                                    </span>
                                </td>
                                <td><?php echo e($ticket->tecnico_asignado ?? 'Sin asignar'); ?></td>
                                <td><small><?php echo e($ticket->fecha_reporte->format('d/m/Y H:i')); ?></small></td>
                                <td>
                                    <?php if($ticket->fecha_resolucion): ?>
                                        <small class="badge bg-success"><?php echo e($ticket->fecha_resolucion->format('d/m/Y H:i')); ?></small>
                                    <?php else: ?>
                                        <span class="text-muted">Pendiente</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="<?php echo e(route('admin.tickets.show', $ticket)); ?>" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i> Ver
                                        </a>
                                        <?php if(!in_array($ticket->status, ['finalizada', 'cancelada'])): ?>
                                            <form method="POST" action="<?php echo e(route('tickets.cerrar', $ticket)); ?>" class="d-inline" onsubmit="return confirm('¿Cerrar este ticket?')">
                                                <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-check-circle"></i> Cerrar
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jrhro\OneDrive\Desktop\Escuela\8vo\Internet II\Application-web-design\Laravel\tickets\resources\views/gerente/tickets.blade.php ENDPATH**/ ?>