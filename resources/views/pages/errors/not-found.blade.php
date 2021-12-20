@section('content')
    <div class="row gy-4">
        @guest
            <div class="alert alert-danger" role="alert">Страница не найдена</div>
        @endguest
    </div>
@endsection

