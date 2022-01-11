@section('content')
    <div id="main" data-infinite-scroll='{ "path": ".pagination__next", "append": ".thumb", "status": "scroller-status", "hideNav": ".pagination", "history": false }'>
        @foreach($images as $image)
        <article class="thumb">
            <a href="{{ $image->preview }}" class="image"><img src="{{ $image->preview }}" alt="{{ $image->name }}" /></a>
            <h2>{{ $image->name }}</h2>
        </article>
        @endforeach
    </div>
    <p class="pagination">
        @if($images->hasMorePages())
            <a class="pagination__next" href="{{ $images->nextPageUrl() }}">Next page</a>
        @endif
    </p>
    <div class="scroller-status">
        <div class="loader-ellips infinite-scroll-request">
            <span class="loader-ellips__dot"></span>
            <span class="loader-ellips__dot"></span>
            <span class="loader-ellips__dot"></span>
            <span class="loader-ellips__dot"></span>
        </div>
        <p class="infinite-scroll-last">End of content</p>
    </div>
@endsection
