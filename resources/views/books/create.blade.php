@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Category</div>
                <div class="panel-body">
                
                {!! Form::open(['route' => 'books.store', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include('books._form')

                    <div class="form-group">
                    <div class="col-md-6 col-md-offset-2">
                    {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                    </div>
                    </div>

                {!! Form::close() !!}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop