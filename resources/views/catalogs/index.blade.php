@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    @include('catalogs._search-panel')
                </div>
                <div class="panel-body">
                
                @include('flash::message')

                @if($errors->has('quantity'))
                    <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ $errors->first('quantity') }}
                    </div>
                @endif

                @foreach($books as $book) 
                <div class="col-md-6">  
                @include('catalogs._books-thumbnail', ['book' => $book])
                </div>
                @endforeach

                

                {{-- --}}
                </div>

                <div class="panel-footer">
                <center><p class="love">Made with ❤ by Harun</p></center>
                </div>
                
                <div class="pull-left">
                    {{ $books->appends(compact('search'))->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
