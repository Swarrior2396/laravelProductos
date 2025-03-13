

<?php $__env->startSection('title', 'Lista de Proveedores'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2 class="mb-4">Lista de Proveedores</h2>
    
    <a href="<?php echo e(route('proveedores.create')); ?>" class="btn btn-primary mb-3">Agregar Proveedor</a>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>NIT</th>
                <th>Dígito Verificación</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $proveedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proveedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($proveedor->nit); ?></td>
                    <td><?php echo e($proveedor->digito_verificacion); ?></td>
                    <td><?php echo e($proveedor->nombre); ?></td>
                    <td><?php echo e($proveedor->correo); ?></td>
                    <td><?php echo e($proveedor->telefono); ?></td>
                    <td><?php echo e($proveedor->direccion); ?></td>
                    <td>
                        <a href="<?php echo e(route('proveedores.show', $proveedor->nit)); ?>" class="btn btn-info btn-sm">Ver</a>
                        <a href="<?php echo e(route('proveedores.edit', $proveedor->nit)); ?>" class="btn btn-warning btn-sm">Editar</a>
                        <form action="<?php echo e(route('proveedores.destroy', $proveedor->nit)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este proveedor?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\productos\resources\views/proveedores/index.blade.php ENDPATH**/ ?>