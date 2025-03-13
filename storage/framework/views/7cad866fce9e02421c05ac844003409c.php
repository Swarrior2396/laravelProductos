

<?php $__env->startSection('title', 'Detalle del Proveedor'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2 class="mb-4">Detalle del Proveedor</h2>

    <div class="card">
        <div class="card-header">
            <h4><?php echo e($proveedor->nombre); ?></h4>
        </div>
        <div class="card-body">
            <p><strong>NIT:</strong> <?php echo e($proveedor->nit); ?></p>
            <p><strong>Dígito de Verificación:</strong> <?php echo e($proveedor->digito_verificacion); ?></p>
            <p><strong>Correo:</strong> <?php echo e($proveedor->correo); ?></p>
            <p><strong>Teléfono:</strong> <?php echo e($proveedor->telefono); ?></p>
            <p><strong>Dirección:</strong> <?php echo e($proveedor->direccion); ?></p>
        </div>
        <div class="card-footer">
            <a href="<?php echo e(route('proveedores.index')); ?>" class="btn btn-secondary">Volver</a>
            <a href="<?php echo e(route('proveedores.edit', $proveedor->nit)); ?>" class="btn btn-warning">Editar</a>
            <form action="<?php echo e(route('proveedores.destroy', $proveedor->nit)); ?>" method="POST" style="display:inline;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este proveedor?')">Eliminar</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\productos\resources\views/proveedores/show.blade.php ENDPATH**/ ?>