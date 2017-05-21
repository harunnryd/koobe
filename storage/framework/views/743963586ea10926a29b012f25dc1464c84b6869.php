<?php echo Form::open(['route' => 'catalogs.index', 'method' => 'get', 'class' => 'form-inline']); ?>

    <div class="form-group">
    <?php echo Form::text('search', old('search'), ['class' => 'form-control']); ?>

    </div>
    <?php echo Form::submit('Search', ['class' => 'btn btn-primary']); ?>

<?php echo Form::close(); ?>