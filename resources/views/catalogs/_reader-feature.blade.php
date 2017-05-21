@can('reader-access')
    @include($partial_view)
@else
    @if(auth()->guest())
        @include($partial_view)
    @endif
@endcan
