@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Books

                    @can('writer-access', \Request::user()->role)
                        <small><a href="{{ route('books.create') }}" class="btn btn-warning btn-sm"> New Book</a></small>    
                    @endcan
                    
                </div>

                <div class="panel-body">

                @include('flash::message')

                {{-- Form Search --}}
                
                {!! Form::open(['route' => 'books.index', 'method' => 'get', 'class' => 'form-inline']) !!}
                <div class="form-group">
                    {!! Form::text('search', isset($search) ? $search : null, ['class' => 'form-control']) !!}
                </div>
                    {!! Form::submit('Search', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}

                {{-- --}}

                {{-- List Category--}}

                    <table class="table">
                        <thead>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Page</th>
                            <th>Stock</th>
                            <th>Category</th>
                    
                            @can('writer-access', \Auth::user()->role)
                            <th>Action</th>    
                            @endcan
                        
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->page }}</td>
                                    <td>{{ $book->stock }}</td>
                                    
                                    <td>
                                    @foreach($book->categories as $category)
                                    <span class="label label-primary">
                                    <i class="fa fa-btn fa-tags">*</i>
                                    <small>{{ $category->name }}</small></span>
                                    @endforeach
                                    </td>

                                    @can('writer-access', \Auth::user()->role)
                                    <td>
                                        {!! Form::open(['route' => ['books.destroy', $book->id], 'method' => 'delete', 'class' => 'form-inline']) !!}
                                            <a href="{{ route('books.edit', $book->id) }}">Edit</a> <small>or</small>   
                                            {!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger']) !!}
                                        {!! Form::close() !!} 
                                    </td>
                                    @endcan

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                {{-- --}}

                    {{ $books->appends(compact('search'))->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
