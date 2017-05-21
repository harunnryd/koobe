<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Cart</div>
                <div class="panel-body">

                <?php if($cart->sumBooks() < 1): ?>
                    <div class="text-center">
                        <h1> :| </h1>
                        <p>Cart kamu masih kosong.</p>
                        <p><a href="<?php echo e(route('catalogs.index')); ?>">Lihat semua buku..</a></p>
                    </div>
                <?php else: ?>
                    <table class="cart table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th class="50%">Book</th>
                            <th class="10%">Price</th>
                            <th class="8%">Quantity</th>
                            <th class="22%" class="text-center">SubTotal</th>
                            <th class="10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $cart->details(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td data-th="Book">
                                    <div class="row">
                                        <div class="col-sm-2 hidden-xs"><img src="<?php echo e($order['detail']['photo_path']); ?>" alt="..." class="img-responsive"/></div>
                                            <div class="col-sm-10">
                                                <h4 class="no-margin"><?php echo e($order['detail']['title']); ?></h4>
                                            </div>
                                        </div>
                                    <div>
                                </td>

                                <td data-th="price">Rp. <?php echo e(number_format($order['detail']['price'], 2)); ?></td>
                                <td data-th="quantity">
                                    <?php echo Form::open(['url' => ['carts', $order['id']], 'method' => 'patch', 'class' => 'form-inline']); ?>

                                        <?php echo Form::number('quantity', $order['quantity'], ['class' => 'form-control']); ?>

                                    <?php echo Form::close(); ?>

                                </td>
                                <td data-th="subtotal" class="text-center">Rp. <?php echo e(number_format($order['subtotal'], 2)); ?>

                                <td>
                                    <?php echo Form::open(['route' => ['carts.remove', $order['id']], 'method' => 'delete', 'class' => 'form-inline']); ?>

                                        <?php echo Form::submit('Delete', ['class' => 'btn btn-danger']); ?>

                                    <?php echo Form::close(); ?>


                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr class="visible-xs">
                            <td class="text-center"><strong>Total Rp. <?php echo e(number_format($cart->totalPrice(), 2)); ?></strong></td>
                        </tr>

                        <tr>
                            <td><a href="<?php echo e(route('catalogs.index')); ?>" class="btn btn-warning">< Belanja lagi?</a></td>
                            <td colspan="2" class="hidden-xs"></td>
                            <td class="hidden-xs text-center"><strong>Total Rp. <?php echo e(number_format($cart->totalPrice(), 2)); ?></strong></td>
                            <td><a href="<?php echo e(url('/checkout/login')); ?>" class="btn btn-success btn-block">Pembayaran ></a></td>
                        </tr>
                    </tfoot>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>