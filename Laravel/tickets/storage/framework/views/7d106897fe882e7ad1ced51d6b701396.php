

<?php $__env->startSection('title', 'Crear Nuevo Ticket'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-success text-white py-4">
                    <h2 class="mb-0 fw-bold">
                        <i class="bi bi-ticket-perforated-fill me-3"></i>
                        Nuevo Ticket de Soporte
                    </h2>
                    <p class="mb-0 opacity-75 mt-2">Reporta tu problema detalladamente para una resolución rápida</p>
                </div>
                <div class="card-body p-5">
                    <!-- Form -->
                    <form method="POST" action="<?php echo e(route('usuario.tickets.store')); ?>">
                        <?php echo csrf_field(); ?>

                        <!-- Descripción corta -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">* Descripción Corta</label>
                            <input type="text" 
                                   name="descripcion_corta" 
                                   class="form-control form-control-lg <?php $__errorArgs = ['descripcion_corta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   placeholder="Ej: 'No funciona el login en la app'" 
                                   value="<?php echo e(old('descripcion_corta')); ?>" required>
                            <?php $__errorArgs = ['descripcion_corta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Categoría -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">* Categoría</label>
                            <select name="categoria" class="form-select form-select-lg <?php $__errorArgs = ['categoria'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <option value="">Selecciona...</option>
                                <option value="software" <?php echo e(old('categoria') == 'software' ? 'selected' : ''); ?>>Software</option>
                                <option value="hardware" <?php echo e(old('categoria') == 'hardware' ? 'selected' : ''); ?>>Hardware</option>
                                <option value="comunicaciones" <?php echo e(old('categoria') == 'comunicaciones' ? 'selected' : ''); ?>>Comunicaciones</option>
                                <option value="plataformas" <?php echo e(old('categoria') == 'plataformas' ? 'selected' : ''); ?>>Plataformas</option>
                                <option value="email" <?php echo e(old('categoria') == 'email' ? 'selected' : ''); ?>>Email</option>
                                <option value="otro" <?php echo e(old('categoria') == 'otro' ? 'selected' : ''); ?>>Otro</option>
                            </select>
                            <?php $__errorArgs = ['categoria'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Nivel de urgencia -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">* Nivel de Urgencia</label>
                            <select name="nivel_urgencia" class="form-select form-select-lg <?php $__errorArgs = ['nivel_urgencia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <option value="">Selecciona...</option>
                                <option value="baja" <?php echo e(old('nivel_urgencia') == 'baja' ? 'selected' : ''); ?>>Baja</option>
                                <option value="media" <?php echo e(old('nivel_urgencia') == 'media' ? 'selected' : ''); ?>>Media</option>
                                <option value="alta" <?php echo e(old('nivel_urgencia') == 'alta' ? 'selected' : ''); ?>>Alta</option>
                                <option value="critica" <?php echo e(old('nivel_urgencia') == 'critica' ? 'selected' : ''); ?>>Crítica</option>
                            </select>
                            <?php $__errorArgs = ['nivel_urgencia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Departamento -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">* Departamento/Area</label>
                            <input type="text" 
                                   name="departamento" 
                                   class="form-control form-control-lg <?php $__errorArgs = ['departamento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   placeholder="Ej: 'Ventas', 'TI', 'Recursos Humanos'" 
                                   value="<?php echo e(old('departamento')); ?>" required>
                            <?php $__errorArgs = ['departamento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Descripción detallada (opcional) -->
                        <div class="mb-5">
                            <label class="form-label fw-bold">Descripción Detallada (opcional)</label>
                            <textarea name="descripcion_detallada" 
                                      rows="6" 
                                      class="form-control <?php $__errorArgs = ['descripcion_detallada'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                      placeholder="Pasos para reproducir el error, screenshots, logs, etc..."><?php echo e(old('descripcion_detallada')); ?></textarea>
                            <?php $__errorArgs = ['descripcion_detallada'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Botones -->
                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-success btn-lg px-5">
                                <i class="bi bi-check-circle me-2"></i>
                                Crear Ticket
                            </button>
                            <a href="<?php echo e(route('usuario.tickets.index')); ?>" class="btn btn-outline-secondary btn-lg px-5">
                                <i class="bi bi-arrow-left me-2"></i>
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center mt-4 text-muted">
                <small>Tu ticket recibirá un número automático como TKT-2024-0001</small>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\jrhro\OneDrive\Desktop\Escuela\8vo\Internet II\Application-web-design\Laravel\tickets\resources\views/usuario/tickets/create.blade.php ENDPATH**/ ?>