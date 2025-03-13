

<?php $__env->startSection('title', 'Agregar Proveedor'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2 class="mb-4">Agregar Proveedor</h2>

    <form action="<?php echo e(route('proveedores.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="nit" class="form-label">NIT</label>
            <input type="text" name="nit" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="digito_verificacion" class="form-label">Dígito de Verificación</label>
            <input type="number" name="digito_verificacion" class="form-control" step="1" min="0" max="9" required>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" name="correo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar Proveedor</button>
        <a href="<?php echo e(route('proveedores.index')); ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\productos\resources\views/proveedores/create.blade.php ENDPATH**/ ?>