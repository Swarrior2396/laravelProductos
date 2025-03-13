

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card">
    <div class="card-header">
    <div class="d-flex justify-content-between align-items-center">
        <h3>Entradas de Productos</h3>
        <div>
            <a href="<?php echo e(route('entradas.trashed')); ?>" class="btn btn-warning me-2">
                <i class="fa fa-trash"></i> Ver Eliminados
            </a>
            <a href="<?php echo e(route('entradas.create')); ?>" class="btn btn-primary">
                <i class="fa fa-plus"></i> Nueva Entrada
            </a>
        </div>
    </div>
</div>
        <div class="card-body">
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Factura</th>
                            <th>Proveedor</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Total</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $entradas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entrada): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($entrada->id); ?></td>
                                <td><?php echo e($entrada->factura_compra); ?></td>
                                <td><?php echo e($entrada->proveedor->nombre); ?></td>
                                <td><?php echo e($entrada->producto->nombre); ?></td>
                                <td><?php echo e($entrada->cantidad); ?></td>
                                <td>$<?php echo e(number_format($entrada->precio_unitario, 2)); ?></td>
                                <td>$<?php echo e(number_format($entrada->total, 2)); ?></td>
                                <td><?php echo e($entrada->created_at->format('d/m/Y')); ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?php echo e(route('entradas.show', $entrada->id)); ?>" class="btn btn-sm btn-info">
                                            Ver <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="<?php echo e(route('entradas.edit', $entrada->id)); ?>" class="btn btn-sm btn-warning">
                                            Editar <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="<?php echo e(route('entradas.destroy', $entrada->id)); ?>" method="POST" onsubmit="return confirm('¿Está seguro de eliminar este registro?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger">
                                               Eliminar <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="9" class="text-center">No hay entradas registradas</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\productos\resources\views/entradas/index.blade.php ENDPATH**/ ?>