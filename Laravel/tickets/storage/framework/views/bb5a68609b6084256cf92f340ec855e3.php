
<?php $__env->startSection('title', 'Nuevo Ticket'); ?>
<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="card shadow-sm">
 <div class="card-header bg-success text-white">
 <h5 class="mb-0"> Crear Nuevo Ticket</h5>
 </div>
 <div class="card-body">
 <form action="<?php echo e(route('tickets.store')); ?>" method="POST">
 <?php echo csrf_field(); ?>
 <div class="row g-3">
 <div class="col-md-6">
 <label class="form-label fw-semibold">N° Reporte *</label>
 <input type="text" name="numero_reporte"
 class="form-control" placeholder="TKT-2024-0001"
required>
 </div>
 <div class="col-md-6">
 <label class="form-label fw-semibold">Nombre del Cliente
*</label>
 <input type="text" name="cliente_nombre"
 class="form-control" required>
 </div>
 <div class="col-md-6">
 <label class="form-label fw-semibold">Email del
Cliente</label>
 <input type="email" name="cliente_email" class="form-control">
 </div>
 <div class="col-md-6">
 <label class="form-label fw-semibold">Departamento *</label>
 <input type="text" name="departamento"
  class="form-control" required>
 </div>
 <div class="col-md-6">
 <label class="form-label fw-semibold">Categoría *</label>
 <select name="categoria" class="form-select" required>
 <option value="">-- Selecciona --</option>
 <?php $__currentLoopData = ['software','hardware','comunicaciones',
 'plataformas','email','otro']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <option value="<?php echo e($cat); ?>"><?php echo e(ucfirst($cat)); ?></option>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 </select>
 </div>
 <div class="col-md-6">
 <label class="form-label fw-semibold">Nivel de Urgencia
*</label>
 <select name="nivel_urgencia" class="form-select" required>
 <?php $__currentLoopData = ['baja','media','alta','critica']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nivel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <option value="<?php echo e($nivel); ?>"><?php echo e(ucfirst($nivel)); ?></option>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 </select>
 </div>
 <div class="col-12">
 <label class="form-label fw-semibold">Descripción Corta
*</label>
 <input type="text" name="descripcion_corta"
 class="form-control" maxlength="255" required>
 </div>
 <div class="col-12">
 <label class="form-label fw-semibold">Descripción
Detallada</label>
 <textarea name="descripcion_detallada"
 class="form-control" rows="3"></textarea>
 </div>
 <div class="col-md-6">
 <label class="form-label fw-semibold">Técnico Asignado</label>
 <input type="text" name="tecnico_asignado" class="form-control">
 </div>
 <div class="col-md-6">
 <label class="form-label fw-semibold">Status</label>
  <select name="status" class="form-select">
 <?php $__currentLoopData = ['pendiente','en_curso','en_espera',
 'cancelada','finalizada']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <option value="<?php echo e($st); ?>">
 <?php echo e(ucfirst(str_replace('_',' ',$st))); ?>

 </option>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 </select>
 </div>
 <div class="col-md-6">
 <label class="form-label fw-semibold">Fecha de Reporte
*</label>
 <input type="datetime-local" name="fecha_reporte"
 class="form-control" required>
 </div>
 <div class="col-md-6">
 <label class="form-label fw-semibold">Fecha Promesa</label>
 <input type="datetime-local" name="fecha_promesa"
 class="form-control">
 </div>
 <div class="col-12">
 <label class="form-label fw-semibold">Comentarios
Técnico</label>
 <textarea name="comentarios_tecnico"
 class="form-control" rows="2"></textarea>
 </div>
 </div>
 <div class="mt-4 d-flex gap-2">
 <button type="submit" class="btn btn-success">Guardar
Ticket</button>
 <a href="<?php echo e(route('tickets.index')); ?>"
 class="btn btn-secondary">Cancelar</a>
 </div>
 </form>
 </div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jrhro\OneDrive\Desktop\Escuela\8vo\Internet II\Application-web-design\Laravel\tickets\resources\views/tickets/create.blade.php ENDPATH**/ ?>