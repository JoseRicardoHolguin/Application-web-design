<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Sistema de Tickets - <?php echo $__env->yieldContent('title', 'Inicio'); ?></title>
 <!-- Bootstrap 5 CDN -->
 <link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
 rel="stylesheet">
 <style>
 body { background-color: #f0f2f5; }
 .navbar { background-color: #1a1a2e; }
 .badge-pendiente { background-color: #6c757d; }
 .badge-en_curso { background-color: #0d6efd; }
 .badge-en_espera { background-color: #ffc107; color:#000; }
 .badge-cancelada { background-color: #dc3545; }
 .badge-finalizada { background-color: #198754; }
 </style>
</head>
<body>
<nav class="navbar navbar-dark px-4 py-3 mb-4">
 <a class="navbar-brand fw-bold fs-5" href="<?php echo e(route('dashboard')); ?>">
 Sistema de Tickets
 </a>
 <?php if(auth()->guard()->check()): ?>
 <?php if(auth()->user()->rol === 'admin'): ?>
 <a href="<?php echo e(route('admin.tickets.create')); ?>" class="btn btn-success btn-sm">
 + Nuevo Ticket
 </a>
 <?php elseif(auth()->user()->rol === 'gerente'): ?>
 <a href="<?php echo e(route('gerente.tickets.index')); ?>" class="btn btn-success btn-sm">
 Ver Tickets
 </a>
 <?php elseif(auth()->user()->rol === 'usuario'): ?>
 <a href="<?php echo e(route('usuario.tickets.create')); ?>" class="btn btn-success btn-sm">
 + Nuevo Ticket
 </a>
 <?php endif; ?>
 <?php endif; ?>
</nav>
<div class="container">
 <?php if(session('success')): ?>
 <div class="alert alert-success alert-dismissible fade show">
 <?php echo e(session('success')); ?>

 <button type="button" class="btn-close" data-bsdismiss="alert"></button>
 </div>
 <?php endif; ?>
 <?php echo $__env->yieldContent('content'); ?>
</div>
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
</script>
</body>
</html><?php /**PATH C:\Users\jrhro\OneDrive\Desktop\Escuela\8vo\Internet II\Application-web-design\Laravel\tickets\resources\views/app.blade.php ENDPATH**/ ?>