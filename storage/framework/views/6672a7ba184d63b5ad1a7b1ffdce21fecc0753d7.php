
<div class="thumbnail">
    <center>
    <hr/>
    <div class="col-sm-3 hidden-xs"><img src="/img/<?php echo e($book->photo); ?>" class="img-thumbnail img-responsive"/></div>
    
    </center>
    <small>
    <p><u><?php echo e($book->title); ?></u></p>
    <p>Price : Rp. <?php echo e(number_format($book->price, 2)); ?></p>
    <p>Category :
        <?php $__currentLoopData = $book->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <span class="label label-primary"> <?php echo e($category->name); ?></span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </p>
    </small>

    <?php echo $__env->make('catalogs._reader-feature', ['partial_view' => 'catalogs._add-book-form'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    
    
</div>
