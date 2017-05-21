@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Category

                    @can('writer-access', \Auth::user()->role)
                        <small><a href="{{ route('categories.create') }}" class="btn btn-warning btn-sm"> New Category</a></small>    
                    @endcan
                    
                </div>

                <div class="panel-body">

                @include('flash::message')
                

                {{-- Form Search --}}
                
                {!! Form::open(['route' => 'categories.index', 'method' => 'get', 'class' => 'form-inline']) !!}
                <div class="form-group">
                    {!! Form::text('search', isset($search) ? $search : null, ['class' => 'form-control']) !!}
                </div>
                    {!! Form::submit('Search', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}

                {{-- --}}

                {{-- List Category--}}

                    <table class="table">
                        <thead>
                            <th>Category Name</th>
                            
                            @can('writer-access', \Auth::user()->role)
                            <th>Action</th>    
                            @endcan
                        
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>

                                    @can('writer-access', \Auth::user()->role)
                                    <td>
                                        {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete', 'class' => 'form-inline']) !!}
                                            <a href="{{ route('categories.edit', $category->id) }}">Edit</a> <small>or</small>   
                                            {!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger']) !!}
                                        {!! Form::close() !!} 
                                    </td>
                                    @endcan

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                {{-- --}}

                    {{ $categories->appends(compact('search'))->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
