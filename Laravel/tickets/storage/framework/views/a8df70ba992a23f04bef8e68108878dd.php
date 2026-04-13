
<?php $__env->startSection('title', 'Todos los Tickets'); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
 <h2 class="fw-bold"> Tickets de Soporte</h2>
 <span class="text-muted">Total: <?php echo e($tickets->count()); ?></span>
</div>
<?php if($tickets->isEmpty()): ?>
 <div class="alert alert-info text-center">
 <a href="<?php echo e(route('admin.tickets.create')); ?>">Crea el
primero.</a>
 </div>
<?php else: ?>
<table class="table table-hover bg-white shadow-sm rounded">
 <thead class="table-dark">
 <tr>
 <th># Reporte</th><th>Cliente</th><th>Depto.</th>
 <th>Categoría</th><th>Urgencia</th><th>Status</th>
 <th>Técnico</th><th>Acciones</th>
 </tr>
 </thead>
 <tbody>
 <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <tr>
 <td><code><?php echo e($ticket->numero_reporte); ?></code></td>
 <td><?php echo e($ticket->cliente_nombre); ?></td>
 <td><?php echo e($ticket->departamento); ?></td>
 <td><?php echo e(ucfirst($ticket->categoria)); ?></td>
 <td>
<?php
 $color = [
   'baja' => 'success',
   'media' => 'info',
   'alta' => 'warning',
   'critica' => 'danger'
 ];
 $badge_color = $color[$ticket->nivel_urgencia] ?? 'secondary';
?>
 <span class="badge bg-<?php echo e($badge_color); ?>"><?php echo e(ucfirst($ticket->nivel_urgencia)); ?></span>
 </td>
 <td>
 <span class="badge badge-<?php echo e($ticket->status); ?>">
 <?php echo e(ucfirst(str_replace('_',' ',$ticket->status))); ?>

 </span>
 </td>
 <td><?php echo e($ticket->tecnico_asignado ?? '-'); ?></td>
 <td>
 <a href="<?php echo e(route('admin.tickets.show',$ticket)); ?>"
 class="btn btn-sm btn-outline-primary">Ver</a>
 <a href="<?php echo e(route('admin.tickets.edit',$ticket)); ?>"
 class="btn btn-sm btn-outline-warning">Editar</a>
 <form action="<?php echo e(route('admin.tickets.destroy',$ticket)); ?>"
method="POST"
 class="d-inline"
onsubmit="return confirm('¿Eliminar?')">
 <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
 <button class="btn btn-sm btn-outline-danger">Eliminar</button>
 </form>
 </td>
 </tr>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 </tbody>
</table>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jrhro\OneDrive\Desktop\Escuela\8vo\Internet II\Application-web-design\Laravel\tickets\resources\views/tickets/index.blade.php ENDPATH**/ ?>