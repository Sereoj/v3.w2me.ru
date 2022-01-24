@section('content')
    <div class="row gy-4">
        <h2>{{ $header ?? '' }}</h2>
        @forelse($images as $image )
            <div class="col-lg-4 col-md-6">
                <div class="images-list">
                    <a href="{{ url('catalog',Str::slug($image->name)) }}">
                        <img src="{{ $image->preview }}" loading="lazy" class="img-fluid" style="width: 100%;" alt="Hello">
                    </a>
                    <div class="images-list-text">
                        <h5>{{ $image->name }}</h5>
                    </div>
                </div>
            </div>
        @empty
            <p>В данный момент нет изображений.</p>
        @endforelse
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
            </ul>
        </nav>
    </div>
@endsection