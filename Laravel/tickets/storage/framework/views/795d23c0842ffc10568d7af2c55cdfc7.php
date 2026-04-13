

<?php $__env->startSection('title', 'Gestión de Usuarios'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">
            <i class="bi bi-people-fill me-2"></i>
            Gestión de Usuarios
        </h2>
        <a href="<?php echo e(route('admin.tickets.index')); ?>" class="btn btn-outline-primary">
            <i class="bi bi-arrow-left me-1"></i> Volver a Dashboard
        </a>
    </div>

    <!-- Alert si no hay usuarios -->
    <?php if($usuarios->isEmpty()): ?>
        <div class="alert alert-info">
            <i class="bi bi-info-circle me-2"></i>
            No hay usuarios registrados. Crea algunos desde el panel de registro.
        </div>
    <?php else: ?>
        <!-- Tabla responsive -->
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white py-3">
                <h5 class="mb-0">
                    <i class="bi bi-table me-2"></i>
                    Lista de <?php echo e($usuarios->count()); ?> usuario<?php echo e($usuarios->count() !== 1 ? 's' : ''); ?>

                </h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td>
                                    <strong><?php echo e($user->name); ?></strong>
                                </td>
                                <td><?php echo e($user->email); ?></td>
                                <td>
                                    <span class="badge bg-<?php echo e($user->rol === 'admin' ? 'danger' : ($user->rol === 'gerente' ? 'warning' : 'secondary')); ?>">
                                        <?php echo e(ucfirst($user->rol)); ?>

                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="<?php echo e(route('admin.usuarios.show', $user)); ?>" class="btn btn-outline-primary" title="Ver">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <form method="POST" action="<?php echo e(route('admin.usuarios.cambiar-rol', $user)); ?>" class="d-inline">
                                            <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                                            <select name="rol" onchange="this.form.submit()" class="form-select form-select-sm" style="width: auto;">
                                                <option value="admin" <?php echo e($user->rol === 'admin' ? 'selected' : ''); ?>>Admin</option>
                                                <option value="gerente" <?php echo e($user->rol === 'gerente' ? 'selected' : ''); ?>>Gerente</option>
                                                <option value="usuario" <?php echo e($user->rol === 'usuario' ? 'selected' : ''); ?>>Usuario</option>
                                            </select>
                                        </form>
                                        <form method="POST" action="<?php echo e(route('admin.usuarios.destroy', $user)); ?>" class="d-inline" onsubmit="return confirm('¿Eliminar a <?php echo e($user->name); ?>?')">
                                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-outline-danger" title="Eliminar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
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


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jrhro\OneDrive\Desktop\Escuela\8vo\Internet II\Application-web-design\Laravel\tickets\resources\views/admin/usuarios/index.blade.php ENDPATH**/ ?>