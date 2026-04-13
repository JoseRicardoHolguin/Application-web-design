
<?php $__env->startSection('title', 'Mi Panel'); ?>
<?php $__env->startSection('content'); ?>
<div class="container py-4">
 <h2 class="mb-3">Bienvenido, <?php echo e(auth()->user()->name); ?></h2>
 <p class="text-muted">Aquí puedes ver y gestionar tus tickets de soporte.</p>
 <div class="d-flex gap-2 mb-4">
 <a href="<?php echo e(route('usuario.tickets.create')); ?>" class="btn btn-primary">
 + Nuevo Ticket
 </a>
 <a href="<?php echo e(route('usuario.tickets.index')); ?>" class="btn btn-outlineprimary">
 Ver Mis Tickets
 </a>
 </div>
 <h5>Últimos tickets</h5>
 <table class="table table-bordered">
 <thead class="table-light">
 <tr>
 <th>Número</th><th>Descripción</th><th>Estado</th>
 </tr>
 </thead>
 <tbody>
 <?php $__empty_1 = true; $__currentLoopData = $misTickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
 <tr>
 <td><?php echo e($ticket->numero_reporte); ?></td>
 <td><?php echo e($ticket->descripcion_corta); ?></td>
 <td><span class="badge bg-secondary"><?php echo e($ticket->status); ?></span></td>
 </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
 <tr><td colspan="3" class="text-center">No tienes tickets
aún.</td></tr>
 <?php endif; ?>
 </tbody>
 </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jrhro\OneDrive\Desktop\Escuela\8vo\Internet II\Application-web-design\Laravel\tickets\resources\views/usuario/dashboard.blade.php ENDPATH**/ ?>