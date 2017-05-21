@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Book : {{ $book->title }}
                </div>

                <div class="panel-body">
                {!! Form::model($book, ['route' => ['books.update', $book], 'class' => 'form-horizontal', 'method' => 'patch', 'files' => true]) !!}
                   
                    @include('books._form')

                    <div class="form-group">
                    <div class="col-md-6 col-md-offset-2">
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