
<div class="thumbnail">
    <center>
    
    <small><p>{{ $book->title }}</p></small>
    <div class="col-sm-3 hidden-xs"><img src="/img/{{ $book->photo }}" class="img-thumbnail img-responsive"/></div>
    
    </center>
    <small>
    <p>Price : Rp. {{ number_format($book->price, 2) }}</p>
    <p>Category :
        @foreach($book->categories as $category) 
            <span class="label label-primary"> {{ $category->name }}</span>
        @endforeach
    </p>
    </small>

    @include('catalogs._reader-feature', ['partial_view' => 'catalogs._add-book-form'])

    
    
</div>
