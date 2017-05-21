<div class="form-group<?php echo e($errors->has('name') ? ' has error' : ''); ?>">
    <?php echo Form::label('name', 'Name', ['class' => 'col-md-4 control-label']); ?>


    <div class="col-md-6">
    <?php echo Form::text('name', old('name'), ['class' => 'form-control', 'required' => '']); ?>


    <?php if($errors->has('name')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('name')); ?></strong>
        </span>
    <?php endif; ?>
    </div>
</div>