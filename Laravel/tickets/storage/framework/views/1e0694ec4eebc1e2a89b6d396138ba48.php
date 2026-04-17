
<?php $__env->startSection('title', 'Editar ' . $ticket->numero_reporte); ?>
<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="card shadow-sm">
 <div class="card-header bg-warning">
 <h5 class="mb-0"> Editar: <?php echo e($ticket->numero_reporte); ?></h5>
 </div>
 <div class="card-body">
 <form action="<?php echo e(route('tickets.update',$ticket)); ?>" method="POST" enctype="multipart/form-data">
 <?php echo csrf_field(); ?>
 <?php echo method_field('PUT'); ?>
 <div class="row g-3">
 <div class="col-md-6">
 <label class="form-label fw-semibold">N° Reporte</label>
 <input type="text" class="form-control"
 value="<?php echo e($ticket->numero_reporte); ?>" disabled>
 </div>
 <div class="col-md-6">
 <label class="form-label fw-semibold">Nombre del
Cliente</label>
 <input type="text" name="cliente_nombre" class="form-control"
 value="<?php echo e($ticket->cliente_nombre); ?>">
 </div>
 <div class="col-md-6">
 <label class="form-label fw-semibold">Email</label>
 <input type="email" name="cliente_email" class="form-control"
 value="<?php echo e($ticket->cliente_email); ?>">
 </div>
 <div class="col-md-6">
 <label class="form-label fw-semibold">Departamento</label>
 <input type="text" name="departamento" class="form-control"
 value="<?php echo e($ticket->departamento); ?>">
 </div>
 <div class="col-md-6">
 <label class="form-label fw-semibold">Categoría</label>
  <select name="categoria" class="form-select">
 <?php $__currentLoopData = ['software','hardware','comunicaciones',
 'plataformas','email','otro']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <option value="<?php echo e($cat); ?>"
 <?php echo e($ticket->categoria===$cat?'selected':''); ?>>
<?php echo e(ucfirst($cat)); ?>

 </option>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 </select>
 </div>
 <div class="col-md-6">
 <label class="form-label fw-semibold">Urgencia</label>
 <select name="nivel_urgencia" class="form-select">
 <?php $__currentLoopData = ['baja','media','alta','critica']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nivel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <option value="<?php echo e($nivel); ?>"
 <?php echo e($ticket->nivel_urgencia===$nivel?'selected':''); ?>>
 <?php echo e(ucfirst($nivel)); ?>

 </option>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 </select>
 </div>
 <div class="col-12">
 <label class="form-label fw-semibold">Descripción
Corta</label>
 <input type="text" name="descripcion_corta" class="form-control"
 value="<?php echo e($ticket->descripcion_corta); ?>">
 </div>
 <div class="col-12">
 <label class="form-label fw-semibold">Descripción
Detallada</label>
 <textarea name="descripcion_detallada" class="form-control"
rows="3">
 <?php echo e($ticket->descripcion_detallada); ?>

 </textarea>
 </div>
 <div class="col-md-6">
 <label class="form-label fw-semibold">Técnico Asignado</label>
 <input type="text" name="tecnico_asignado" class="form-control"
 value="<?php echo e($ticket->tecnico_asignado); ?>">
 </div>
  <div class="col-md-6">
 <label class="form-label fw-semibold">Status</label>
 <select name="status" class="form-select">
 <?php $__currentLoopData = ['pendiente','en_curso','en_espera',
 'cancelada','finalizada']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <option value="<?php echo e($st); ?>"
 <?php echo e($ticket->status===$st?'selected':''); ?>>
<?php echo e(ucfirst(str_replace('_',' ',$st))); ?>

 </option>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 </select>
 </div>
 <div class="col-md-6">
 <label class="form-label fw-semibold">Fecha Promesa</label>
 <input type="datetime-local" name="fecha_promesa" class="form-control"
 value="<?php echo e($ticket->fecha_promesa?->format('Y-m-d\TH:i')); ?>">
 </div>
 <div class="col-md-6">
 <label class="form-label fw-semibold">Fecha Resolución</label>
 <input type="datetime-local" name="fecha_resolucion"
class="form-control"
 value="<?php echo e($ticket->fecha_resolucion?->format('Y-m-d\TH:i')); ?>">
 </div>
 <div class="col-12">
 <label class="form-label fw-semibold">Comentarios
Técnico</label>
 <textarea name="comentarios_tecnico" class="form-control"
rows="3">
 <?php echo e($ticket->comentarios_tecnico); ?>

 </textarea>
 </div>
 <!-- Adjuntos adicionales -->
 <div class="col-12">
 <label class="form-label fw-semibold">Adjuntos adicionales (Imágenes y Documentos)</label>
 <input type="file" name="attachments[]" multiple class="form-control" accept="image/*,.pdf,.doc,.docx,.txt,.xls,.xlsx">
 <small class="text-muted">Máximo 10 MB por archivo. Puedes seleccionar varios. Los adjuntos existentes no se modifican aquí.</small>
 </div>
 </div>
 <div class="mt-4 d-flex gap-2">
 <button type="submit" class="btn btn-warning">Actualizar
Ticket</button>
 <a href="<?php echo e(route('tickets.show',$ticket)); ?>"
 class="btn btn-secondary">Cancelar</a>
 </div>
 </form>
 </div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jrhro\OneDrive\Desktop\Escuela\8vo\Internet II\Application-web-design\Laravel\tickets\resources\views/tickets/edit.blade.php ENDPATH**/ ?>