<div class="form-group<?php echo e($errors->has('title') ? ' has error' : ''); ?>">
    <?php echo Form::label('title', 'Title', ['class' => 'col-md-2 control-label']); ?>


    <div class="col-md-8">
    <?php echo Form::text('title', old('title'), ['class' => 'form-control', 'required', 'placeholder' => 'Title book', 'autofocus']); ?>


    <?php if($errors->has('title')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('title')); ?></strong>
        </span>
    <?php endif; ?>

    </div>
</div>

<div class="form-group<?php echo e($errors->has('author') ? ' has error' : ''); ?>">
    <?php echo Form::label('author', 'Author', ['class' => 'col-md-2 control-label']); ?>


    <div class="col-md-8">
    <?php echo Form::text('author', old('author'), ['class' => 'form-control', 'required', 'placeholder' => 'Your name']); ?>


    <?php if($errors->has('author')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('author')); ?></strong>
        </span>
    <?php endif; ?>

    </div>
</div>

<div class="form-group<?php echo e($errors->has('desc') ? ' has error' : ''); ?>">
    <?php echo Form::label('desc', 'Desc', ['class' => 'col-md-2 control-label']); ?>


    <div class="col-md-8">
    <?php echo Form::textArea('desc', old('desc'), ['class' => 'form-control', 'placeholder' => 'Desc your book :D']); ?>


    <?php if($errors->has('desc')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('desc')); ?></strong>
        </span>
    <?php endif; ?>

    </div>
</div>

<div class="form-group<?php echo e($errors->has('page') ? ' has error' : ''); ?>">
    <?php echo Form::label('page', 'Page', ['class' => 'col-md-2 control-label']); ?>


    <div class="col-md-8">
    <?php echo Form::number('page', old('page'), ['class' => 'form-control', 'required']); ?>


    <?php if($errors->has('page')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('page')); ?></strong>
        </span>
    <?php endif; ?>

    </div>
</div>

<div class="form-group<?php echo e($errors->has('stock') ? ' has error' : ''); ?>">
    <?php echo Form::label('stock', 'Stock', ['class' => 'col-md-2 control-label']); ?>


    <div class="col-md-8">
    <?php echo Form::number('stock', old('stock'), ['class' => 'form-control', 'required']); ?>


    <?php if($errors->has('stock')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('stock')); ?></strong>
        </span>
    <?php endif; ?>

    </div>
</div>

<div class="form-group<?php echo e($errors->has('price') ? ' has error' : ''); ?>">
    <?php echo Form::label('price', 'Price', ['class' => 'col-md-2 control-label']); ?>


    <div class="col-md-8">
    <?php echo Form::text('price', old('price'), ['class' => 'form-control', 'required', 'placeholder' => 'Your price in Rupiah :D']); ?>


    <?php if($errors->has('price')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('price')); ?></strong>
        </span>
    <?php endif; ?>

    </div>
</div>

<div class="form-group<?php echo e($errors->has('category') ? ' has error' : ''); ?>">
    <?php echo Form::label('category', 'Categories', ['class' => 'col-md-2 control-label']); ?>


    <div class="col-md-3">
    
    <small><?php echo Form::select('category[]', $categories, null, ['multiple' => true]); ?></small>
    </div>

    <?php if($errors->has('category')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('category')); ?></strong>
        </span>
    <?php endif; ?>
   
</div>

<div class="form-group<?php echo e($errors->has('photo') ? ' has error' : ''); ?>">
    <?php echo Form::label('photo', 'Photo', ['class' => 'col-md-2 control-label']); ?>


    <div class="col-md-8">
    <?php echo Form::file('photo', old('photo')); ?>


    <?php if($errors->has('photo')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('photo')); ?></strong>
        </span>
    <?php endif; ?>

    <?php if($book->photo != ''): ?>
        <div class="row">
        <div class="col-md-6">
            <small>Current Photo</small>
            <div class="thumbnail">
            <img src="/img/<?php echo e($book->photo); ?>" class="img-rounded img-responsive">
            </div>
        </div>
        </div>
    <?php endif; ?>    

    

    

    </div>
</div>


