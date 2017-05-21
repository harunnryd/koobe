<p>
    {!! Form::open(['route' => 'catalogs.addbook', 'class' => 'form-inline']) !!}
        {!! Form::hidden('book_id', $book->id) !!}
        <div class="form-group">
        {!! Form::number('quantity', null, ['class' => 'form-control', 'min' => 1, 'placeholder' => 'Quantity Order']) !!}
        {!! Form::submit('Add To Cart', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
</p>