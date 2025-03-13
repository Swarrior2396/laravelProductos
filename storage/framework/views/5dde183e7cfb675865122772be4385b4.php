

<?php $__env->startSection('title', 'Lista de Clientes'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mb-4">Lista de Clientes</h1>

    <a href="<?php echo e(route('clientes.create')); ?>" class="btn btn-primary mb-3">Agregar Cliente</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Fecha Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($cliente->dni); ?></td>
                    <td><?php echo e($cliente->nombre); ?></td>
                    <td><?php echo e($cliente->correo); ?></td>
                    <td><?php echo e($cliente->telefono); ?></td>
                    <td><?php echo e($cliente->fecha_registro); ?></td>
                    <td>
                        <a href="<?php echo e(route('clientes.show', $cliente->dni)); ?>" class="btn btn-info btn-sm">Ver</a>
                        <a href="<?php echo e(route('clientes.edit', $cliente->dni)); ?>" class="btn btn-warning btn-sm">Editar</a>
                        <form action="<?php echo e(route('clientes.destroy', $cliente->dni)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este cliente?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\productos\resources\views/clientes/index.blade.php ENDPATH**/ ?>