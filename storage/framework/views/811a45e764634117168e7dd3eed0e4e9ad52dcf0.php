<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Category</div>
                <div class="panel-body">
                
                <?php echo Form::open(['route' => 'books.store', 'class' => 'form-horizontal', 'files' => true]); ?>


                    <?php echo $__env->make('books._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <div class="form-group">
                    <div class="col-md-6 col-md-offset-2">
                    <?php echo Form::submit('Create', ['class' => 'btn btn-primary']); ?>

                    </div>
                    </div>

                <?php echo Form::close(); ?>

                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>