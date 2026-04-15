
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

 <!-- Adjuntos del ticket -->
 <h5>Adjuntos del ticket</h5>
 <div class="row">
 <?php $__empty_1 = true; $__currentLoopData = $ticket->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
 <div class="col-md-3 mb-3">
 <?php if(str_starts_with($attachment->mime_type, 'image/')): ?>
 <a href="<?php echo e(Storage::url($attachment->file_path)); ?>" target="_blank">
 <img src="<?php echo e(Storage::url($attachment->file_path)); ?>"
 class="img-fluid rounded shadow-sm" style="max-height: 180px; object-fit: cover;">
 </a>
 <?php else: ?>
 <a href="<?php echo e(Storage::url($attachment->file_path)); ?>" target="_blank"
 class="btn btn-outline-primary d-block text-truncate">
 <?php echo e($attachment->original_name); ?>

 </a>
 <?php endif; ?>
 <small class="text-muted"><?php echo e($attachment->original_name); ?></small>
 </div>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
 <div class="col-12">
 <div class="alert alert-info">
 <i class="bi bi-paperclip me-2"></i>No hay adjuntos para este ticket.
 </div>
 </div>
 <?php endif; ?>
 </div>
 </div>
 <div class="card-footer d-flex gap-2">
 <a href="<?php echo e(route('admin.tickets.edit', $ticket)); ?>"
 class="btn btn-warning">Editar</a>
 <a href="<?php echo e(route('admin.tickets.index')); ?>"
 class="btn btn-secondary">Volver</a>
 <form action="<?php echo e(route('admin.tickets.destroy', $ticket)); ?>" method="POST"
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