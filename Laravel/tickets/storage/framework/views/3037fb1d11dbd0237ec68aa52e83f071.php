
<?php $__env->startSection('title', 'Ticket ' . $ticket->numero_reporte); ?>
<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="card shadow-sm">
 <div class="card-header bg-primary text-white d-flex
 justify-content-between align-items-center">
 <h5 class="mb-0"> <?php echo e($ticket->numero_reporte); ?></h5>
 <span class="badge bg-light text-dark">
 <?php echo e(ucfirst(str_replace('_',' ',$ticket->status))); ?>

 </span>
 </div>
 <div class="card-body">
 <div class="row g-3">
 <div class="col-md-6">
 <p class="mb-1 text-muted small">Cliente</p>
 <strong><?php echo e($ticket->cliente_nombre); ?></strong>
 </div>
 <div class="col-md-6">
 <p class="mb-1 text-muted small">Email</p>
 <strong><?php echo e($ticket->cliente_email ?? '-'); ?></strong>
 </div>
 <div class="col-md-6">
 <p class="mb-1 text-muted small">Departamento</p>
 <strong><?php echo e($ticket->departamento); ?></strong>
 </div>
 <div class="col-md-6">
 <p class="mb-1 text-muted small">Categoría</p>
 <strong><?php echo e(ucfirst($ticket->categoria)); ?></strong>
 </div>
 <div class="col-md-6">
 <p class="mb-1 text-muted small">Urgencia</p>
 <strong><?php echo e(ucfirst($ticket->nivel_urgencia)); ?></strong>
 </div>
 <div class="col-md-6">
 <p class="mb-1 text-muted small">Técnico Asignado</p>
 <strong><?php echo e($ticket->tecnico_asignado ?? '-'); ?></strong>
 </div>
 <div class="col-12">
 <p class="mb-1 text-muted small">Descripción Corta</p>
  <strong><?php echo e($ticket->descripcion_corta); ?></strong>
 </div>
 <?php if($ticket->descripcion_detallada): ?>
 <div class="col-12">
 <p class="mb-1 text-muted small">Descripción Detallada</p>
 <p><?php echo e($ticket->descripcion_detallada); ?></p>
 </div>
 <?php endif; ?>
 <?php if($ticket->comentarios_tecnico): ?>
 <div class="col-12">
 <p class="mb-1 text-muted small">Comentarios del Técnico</p>
 <p><?php echo e($ticket->comentarios_tecnico); ?></p>
 </div>
 <?php endif; ?>
 <div class="col-md-4">
 <p class="mb-1 text-muted small">Fecha Reporte</p>
 <strong><?php echo e($ticket->fecha_reporte?->format('d/m/Y H:i')); ?></strong>
 </div>
 <div class="col-md-4">
 <p class="mb-1 text-muted small">Fecha Promesa</p>
 <strong><?php echo e($ticket->fecha_promesa?->format('d/m/Y H:i') ?? '-'); ?></strong>
 </div>
 <div class="col-md-4">
 <p class="mb-1 text-muted small">Fecha Resolución</p>
 <strong><?php echo e($ticket->fecha_resolucion?->format('d/m/Y H:i') ?? '-'); ?></strong>
 </div>
 </div>
 </div>
 <div class="card-footer d-flex gap-2">
 <a href="<?php echo e(route('tickets.edit',$ticket)); ?>"
 class="btn btn-warning">Editar</a>
 <a href="<?php echo e(route('tickets.index')); ?>"
 class="btn btn-secondary">Volver</a>
 <form action="<?php echo e(route('tickets.destroy',$ticket)); ?>" method="POST"
 class="ms-auto" onsubmit="return confirm('¿Eliminar?')">
 <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
 <button class="btn btn-danger">Eliminar</button>
 </form>
 </div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jrhro\OneDrive\Desktop\Escuela\8vo\Internet II\Application-web-design\Laravel\tickets\resources\views/tickets/show.blade.php ENDPATH**/ ?>