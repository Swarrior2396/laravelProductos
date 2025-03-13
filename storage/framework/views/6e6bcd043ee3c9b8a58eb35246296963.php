

<?php $__env->startSection('title', 'Lista de Productos'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mb-4">Lista de Productos</h1>

    <a href="<?php echo e(route('productos.create')); ?>" class="btn btn-primary mb-3">Agregar Producto</a>
    <a href="<?php echo e(route('productos.trashed')); ?>" class="btn btn-secondary mb-3">Ver productos eliminados</a>
    

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Stock</th>
                <th>Fecha Ingreso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($producto->id); ?></td>
                    <td><?php echo e($producto->nombre); ?></td>
                    <td><?php echo e($producto->descripcion); ?></td>
                    <td><?php echo e($producto->stock ?? 'N/A'); ?></td>
                    <td><?php echo e($producto->fecha_ingreso); ?></td>
                    <td>
                        <a href="<?php echo e(route('productos.show', $producto->id)); ?>" class="btn btn-info btn-sm">Ver</a>
                        <a href="<?php echo e(route('productos.edit', $producto->id)); ?>" class="btn btn-warning btn-sm">Editar</a>
                        <form action="<?php echo e(route('productos.destroy', $producto->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este producto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\productos\resources\views/productos/index.blade.php ENDPATH**/ ?>