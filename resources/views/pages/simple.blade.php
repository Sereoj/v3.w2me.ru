@section('content')
        <div class="row gy-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
                    <li class="breadcrumb-item"><a href="{{  route('images.new') }}">Каталог</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$image->name}}</li>
                </ol>
            </nav>
                <div class="col-xl-8">
                    <div id="carouselCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach(unserialize($image->images) as $value)
                                @foreach($value as $key => $link)
                                    <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="{{ $key }}"
                                            class="{{ $key == 0 ? 'active' : '' }}" aria-current="true" aria-label=""></button>
                                @endforeach
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach(unserialize($image->images) as $name => $value)
                                @foreach($value as $key => $link)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ $link }}"
                                         class="d-block w-100" alt="..." loading="lazy">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>{{ __("messages.$name") }}</h5>
                                    </div>
                                </div>
                                @endforeach
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselCaptions"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselCaptions"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <hr class="my-2">
                    <div class="badge rounded-pill bg-primary">Аниме</div>
                    <div class="badge rounded-pill bg-primary">Фильм</div>
                    <div class="badge rounded-pill bg-primary">Макото Синкай</div>
                    <div class="badge rounded-pill bg-primary">Романтика</div>
                    <div class="badge rounded-pill bg-primary">Повседневность</div>
                    <div class="badge rounded-pill bg-primary">Сверхестественное</div>
                </div>
                <div class="col-xl-4 py-2 p-4">
                    <h2>{{ $image->name }}</h2>
                    <h4>Описание</h4>
                    <p>
                        {{ $image->description }}
                    </p>
{{--                        <div class="photo-1">--}}
{{--                            <img class="profile" src="{{ $image->user->photo->path }}" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="col">--}}
{{--                            <p class="mx-2 my-3">{{ $image->user->name ?? '' }}</p>--}}
{{--                        </div>--}}
                    <div class="row d-flex">
                        <p class="ms-2"><span class="badge bg-primary">Разместил:</span> {{ __("messages.username", ['name' => $image->user->name ?? ''])}}</p>
                        <p class="ms-2"><span class="badge bg-primary">Категория:</span> {{__("messages.category", ['category' => $image->category->name ?? ''])}}</p>
                        <p class="ms-2"><span class="badge bg-primary">Стоимость:</span> {{ __("messages.license.".$image->license->type)}}</p>
{{--                        <p class="ms-2"><span class="badge bg-primary">Стоимость:</span> {{  }}</p>--}}
{{--                        <div class="small-ratings">--}}
{{--                            <i class="bi bi-star-fill rating-color"></i>--}}
{{--                            <i class="bi bi-star-fill rating-color"></i>--}}
{{--                            <i class="bi bi-star-fill rating-color"></i>--}}
{{--                            <i class="bi bi-star"></i>--}}
{{--                            <i class="bi bi-star"></i>--}}
{{--                        </div>--}}

                        <p class="ms-2"><span class="badge bg-primary">Просмотров:</span>  11</p>
                        <p class="ms-2"><span class="badge bg-primary">Размер:</span> {{ $image->download[0]->size ?? '' }} Mb</p>
                        <p class="ms-2"><span class="badge bg-primary">Загрузок:</span> {{ $image->download[0]->count_download ?? '' }}</p>

                        <button type="button" class="btn btn-primary">Установить (.zip)</button>
                        <button type="button" class="btn btn-primary">Открыть в приложении</button>
                    </div>
                </div>
        </div>
@endsection
