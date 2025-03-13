

<?php $__env->startSection('title', 'Detalle del Producto'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mb-4">Detalle del Producto</h1>

    <div class="card">
        <div class="card-header">
            Producto #<?php echo e($producto->id); ?>

        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo e($producto->nombre); ?></h5>
            <p class="card-text"><strong>Descripción:</strong> <?php echo e($producto->descripcion); ?></p>
            <p class="card-text"><strong>Stock:</strong> <?php echo e($producto->stock ?? 'N/A'); ?></p>
            <p class="card-text"><strong>Fecha de Ingreso:</strong> <?php echo e($producto->fecha_ingreso); ?></p>

            <a href="<?php echo e(route('productos.index')); ?>" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\productos\resources\views/productos/show.blade.php ENDPATH**/ ?>