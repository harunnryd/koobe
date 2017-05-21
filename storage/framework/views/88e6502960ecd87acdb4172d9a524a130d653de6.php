<p>
    <?php echo Form::open(['route' => 'catalogs.addbook', 'class' => 'form-inline']); ?>

        <?php echo Form::hidden('book_id', $book->id); ?>

        <div class="form-group">
        <?php echo Form::number('quantity', null, ['class' => 'form-control', 'min' => 1, 'placeholder' => 'Quantity Order']); ?>

        <?php echo Form::submit('Add To Cart', ['class' => 'btn btn-primary']); ?>

        </div>
    <?php echo Form::close(); ?>

</p>