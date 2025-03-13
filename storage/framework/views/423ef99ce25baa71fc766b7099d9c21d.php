
<?php $__env->startSection('title', 'Eliminados'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="text-center">Productos Eliminados</h1>
    
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    
    <table class="table table-bordered">
        <thead>
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
                    <td><?php echo e($producto->stock); ?></td>
                    <td><?php echo e($producto->fecha_ingreso); ?></td>
                    <td>
                        <!-- Restaurar Producto -->
                        <form action="<?php echo e(route('productos.restore', $producto->id)); ?>" method="POST" style="display:inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <button type="submit" class="btn btn-warning">Restaurar</button>
                        </form>
                        
                        <!-- Eliminar Definitivamente -->
                        <form action="<?php echo e(route('productos.force-delete', $producto->id)); ?>" method="POST" style="display:inline-block;" onsubmit="return confirmDelete()">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    
    <a href="<?php echo e(route('productos.index')); ?>" class="btn btn-primary">Volver</a>
</div>

<script>
    function confirmDelete() {
        return confirm("¿Está seguro de que desea eliminar este producto? Esta acción no se puede deshacer.");
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\productos\resources\views/productos/trashed.blade.php ENDPATH**/ ?>