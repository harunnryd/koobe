<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Create Category</div>
                <div class="panel-body">
                
                <?php echo Form::open(['route' => 'categories.store', 'class' => 'form-horizontal']); ?>

                   
                    <?php echo $__env->make('categories._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
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