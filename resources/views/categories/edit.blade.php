@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Category : {{ $category->name }}
                </div>

                <div class="panel-body">
                {!! Form::model($category, ['route' => ['categories.update', $category], 'class' => 'form-horizontal', 'method' => 'patch']) !!}
                   
                    @include('categories._form')

                    <div class="form-group">
                    <div class="col-md-6 panel-heading">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                    </div>
                    <div>

                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop