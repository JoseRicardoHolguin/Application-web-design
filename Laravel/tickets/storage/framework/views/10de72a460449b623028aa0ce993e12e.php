

<?php $__env->startSection('title', 'Mis Tickets'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">
            <i class="bi bi-list-check me-2"></i>
            Mis Tickets (<?php echo e($tickets->count()); ?>)
        </h2>
        <a href="<?php echo e(route('usuario.tickets.create')); ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>
            Nuevo Ticket
        </a>
    </div>

    <?php if($tickets->isEmpty()): ?>
        <div class="text-center py-5">
            <i class="bi bi-ticket-detailed display-1 text-muted mb-4"></i>
            <h4 class="text-muted">No tienes tickets creados</h4>
            <p class="text-muted">Crea tu primer ticket de soporte</p>
            <a href="<?php echo e(route('usuario.tickets.create')); ?>" class="btn btn-success btn-lg">
                <i class="bi bi-plus-circle me-2"></i>
                Crear Primer Ticket
            </a>
        </div>
    <?php else: ?>
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
                        <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="<?php echo e($ticket->status === 'pendiente' ? 'table-warning' : ($ticket->status === 'en_curso' ? 'table-info' : 'table-success')); ?>">
                                <td>
                                    <strong class="text-primary">#<?php echo e($ticket->numero_reporte); ?></strong>
                                </td>
                                <td>
                                    <span class="badge bg-<?php echo e($ticket->status === 'pendiente' ? 'warning' : ($ticket->status === 'en_curso' ? 'info' : 'success')); ?>">
                                        <?php echo e(ucfirst($ticket->status)); ?>

                                    </span>
                                </td>
                                <td><?php echo e(ucfirst($ticket->categoria)); ?></td>
                                <td>
                                    <span class="badge bg-<?php echo e($ticket->nivel_urgencia === 'critica' ? 'danger' : ($ticket->nivel_urgencia === 'alta' ? 'warning' : ($ticket->nivel_urgencia === 'media' ? 'info' : 'secondary'))); ?>">
                                        <?php echo e(ucfirst($ticket->nivel_urgencia)); ?>

                                    </span>
                                </td>
                                <td><small class="text-muted"><?php echo e($ticket->fecha_reporte->format('d/m/Y H:i')); ?></small></td>
                                <td>
                                    <a href="<?php echo e(route('usuario.tickets.show', $ticket)); ?>" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i> Ver
                                    </a>
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


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jrhro\OneDrive\Desktop\Escuela\8vo\Internet II\Application-web-design\Laravel\tickets\resources\views/usuario/tickets/index.blade.php ENDPATH**/ ?>