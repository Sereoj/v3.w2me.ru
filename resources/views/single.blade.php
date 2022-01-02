@section('content')
    <div id="main">
        @foreach($images as $image)
        <article class="thumb">
            <a href="{{ $image->preview }}" class="image"><img src="{{ $image->preview }}" alt="{{ $image->name }}" /></a>
            <h2>{{ $image->name }}</h2>
            <p>{{ $image->description }}</p>
        </article>
        @endforeach
    </div>
    @if($images->hasMorePages())
        <a href="{{ $images->nextPageUrl() }}">Next</a>
    @else
        <a href="{{ $images->previousPageUrl() }}">Previous</a>
    @endif
@endsection
