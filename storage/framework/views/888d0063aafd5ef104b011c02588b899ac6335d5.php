<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <?php echo $__env->make('catalogs._search-panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <div class="panel-body">
                
                <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php if($errors->has('quantity')): ?>
                    <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo e($errors->first('quantity')); ?>

                    </div>
                <?php endif; ?>

                <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                <div class="col-md-6">  
                <?php echo $__env->make('catalogs._books-thumbnail', ['book' => $book], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                

                
                </div>

                <div class="panel-footer">
                <center><p class="love">Made with ❤ by Harun</p></center>
                </div>
                
                <div class="pull-left">
                    <?php echo e($books->appends(compact('search'))->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>