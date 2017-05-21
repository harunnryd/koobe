@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Create Category</div>
                <div class="panel-body">
                
                {!! Form::open(['route' => 'categories.store', 'class' => 'form-horizontal']) !!}
                   
                    @include('categories._form')

                    <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
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