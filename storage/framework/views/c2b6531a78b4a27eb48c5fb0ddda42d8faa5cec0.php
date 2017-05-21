<h3><?php echo e($book->title); ?></h3>
<div class="thumbnail">
    <img src="/img/<?php echo e($book->photo); ?>" class="img-rounded">
        <p>Halaman : <?php echo e($book->page); ?></p>
        <p>Harga : <strong>Rp.<?php echo e(number_format($book->price, 2)); ?></strong></p>
        <p>Kategory : 
            <?php $__currentLoopData = $book->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="label label-primary">
            <i class="fa fa-btn fa-tags"></i>
                <?php echo e($category->name); ?>

            </span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </p>
</div>

