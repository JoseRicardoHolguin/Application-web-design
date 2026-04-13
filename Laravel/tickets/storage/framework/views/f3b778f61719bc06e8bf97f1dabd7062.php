<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'Sistema de Tickets'); ?> - <?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Vite/Tailwind (si compilado) -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <!-- Bootstrap 5 CDN (fallback rápido) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom styles -->
    <style>
        body { font-family: 'Nunito', sans-serif; }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(route('dashboard')); ?>">Sistema de Tickets</a>
            <div class="navbar-nav ms-auto">
                <?php if(auth()->guard()->check()): ?>
                    
                    <?php if(auth()->user()->rol === 'admin'): ?>
                        <a class="nav-link" href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a>
                        <a class="nav-link" href="<?php echo e(route('admin.tickets.index')); ?>">Tickets</a>
                        <a class="nav-link" href="<?php echo e(route('admin.usuarios.index')); ?>">Usuarios</a>
                    <?php endif; ?>
                    
                    <?php if(auth()->user()->rol === 'gerente'): ?>
                        <a class="nav-link" href="<?php echo e(route('gerente.dashboard')); ?>">Dashboard</a>
                        <a class="nav-link" href="<?php echo e(route('gerente.reportes')); ?>">Reportes</a>
                        <a class="nav-link" href="<?php echo e(route('gerente.tickets.index')); ?>">Tickets</a>
                    <?php endif; ?>
                    
                    <?php if(auth()->user()->rol === 'usuario'): ?>
                        <a class="nav-link" href="<?php echo e(route('usuario.dashboard')); ?>">Mi Panel</a>
                        <a class="nav-link" href="<?php echo e(route('usuario.tickets.index')); ?>">Mis Tickets</a>
                        <a class="nav-link" href="<?php echo e(route('usuario.tickets.create')); ?>">Nuevo Ticket</a>
                    <?php endif; ?>
                    
                    <span class="nav-link text-light">
                        <?php echo e(auth()->user()->name); ?>

                        <span class="badge bg-secondary ms-1"><?php echo e(ucfirst(auth()->user()->rol)); ?></span>
                    </span>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-sm btn-outline-light ms-2">Salir</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <main>
        
        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible m-3">
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible m-3">
                <?php echo e(session('error')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php /**PATH C:\Users\jrhro\OneDrive\Desktop\Escuela\8vo\Internet II\Application-web-design\Laravel\tickets\resources\views/layouts/app.blade.php ENDPATH**/ ?>