@section('content')
        @auth
            <div class="row gy-4">
                <h2>{{ $header ?? '' }}</h2>
                    @forelse($images as $image )
                        <div class="col-lg-4 col-md-6">
                            <div class="images-list">
                                <a href="{{ url('catalog',Str::slug($image->name)) }}">
                                    <img src="{{ $image->preview }}" loading="lazy" class="img-fluid">
                                </a>
                                <div class="images-list-text">
                                    <h5>{{ $image->name }}</h5>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>В данный момент нет изображений.</p>
                    @endforelse
            </div>
        @endauth

        @guest
            <div class="alert alert-danger" role="alert">Нет доступа</div>
        @endguest
@endsection
