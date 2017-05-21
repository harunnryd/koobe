{!! Form::open(['route' => 'catalogs.index', 'method' => 'get', 'class' => 'form-inline']) !!}
    <div class="form-group">
    {!! Form::text('search', old('search'), ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Search', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}