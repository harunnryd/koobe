<div class="form-group{{ $errors->has('title') ? ' has error' : '' }}">
    {!! Form::label('title', 'Title', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-8">
    {!! Form::text('title', old('title'), ['class' => 'form-control', 'required', 'placeholder' => 'Title book', 'autofocus']) !!}

    @if ($errors->has('title'))
        <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif

    </div>
</div>

<div class="form-group{{ $errors->has('author') ? ' has error' : '' }}">
    {!! Form::label('author', 'Author', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-8">
    {!! Form::text('author', old('author'), ['class' => 'form-control', 'required', 'placeholder' => 'Your name']) !!}

    @if ($errors->has('author'))
        <span class="help-block">
            <strong>{{ $errors->first('author') }}</strong>
        </span>
    @endif

    </div>
</div>

<div class="form-group{{ $errors->has('desc') ? ' has error' : '' }}">
    {!! Form::label('desc', 'Desc', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-8">
    {!! Form::textArea('desc', old('desc'), ['class' => 'form-control', 'placeholder' => 'Desc your book :D']) !!}

    @if ($errors->has('desc'))
        <span class="help-block">
            <strong>{{ $errors->first('desc') }}</strong>
        </span>
    @endif

    </div>
</div>

<div class="form-group{{ $errors->has('page') ? ' has error' : '' }}">
    {!! Form::label('page', 'Page', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-8">
    {!! Form::number('page', old('page'), ['class' => 'form-control', 'required']) !!}

    @if ($errors->has('page'))
        <span class="help-block">
            <strong>{{ $errors->first('page') }}</strong>
        </span>
    @endif

    </div>
</div>

<div class="form-group{{ $errors->has('stock') ? ' has error' : '' }}">
    {!! Form::label('stock', 'Stock', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-8">
    {!! Form::number('stock', old('stock'), ['class' => 'form-control', 'required']) !!}

    @if ($errors->has('stock'))
        <span class="help-block">
            <strong>{{ $errors->first('stock') }}</strong>
        </span>
    @endif

    </div>
</div>

<div class="form-group{{ $errors->has('price') ? ' has error' : '' }}">
    {!! Form::label('price', 'Price', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-8">
    {!! Form::text('price', old('price'), ['class' => 'form-control', 'required', 'placeholder' => 'Your price in Rupiah :D']) !!}

    @if ($errors->has('price'))
        <span class="help-block">
            <strong>{{ $errors->first('price') }}</strong>
        </span>
    @endif

    </div>
</div>

<div class="form-group{{ $errors->has('category') ? ' has error' : '' }}">
    {!! Form::label('category', 'Categories', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-3">
    
    <small>{!! Form::select('category[]', $categories, null, ['multiple' => true]) !!}</small>
    </div>

    @if ($errors->has('category'))
        <span class="help-block">
            <strong>{{ $errors->first('category') }}</strong>
        </span>
    @endif
   
</div>

<div class="form-group{{ $errors->has('photo') ? ' has error' : '' }}">
    {!! Form::label('photo', 'Photo', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-8">
    {!! Form::file('photo', old('photo')) !!}

    @if ($errors->has('photo'))
        <span class="help-block">
            <strong>{{ $errors->first('photo') }}</strong>
        </span>
    @endif

    @if ($book->photo != '')
        <div class="row">
        <div class="col-md-6">
            <small>Current Photo</small>
            <div class="thumbnail">
            <img src="/img/{{ $book->photo }}" class="img-rounded img-responsive">
            </div>
        </div>
        </div>
    @endif    

    

    {{-- --}}

    </div>
</div>


