@section('content')
        <div class="row gy-4">
            <h2>{{ $header ?? '' }}</h2>
                <div class="col col-xl-2 col-md-4 col-lg-3">
                    <img src="{{$image}}" class="img-profile rounded float-start">
                    <form method="POST">
                        @csrf
                        <button class="btn btn-primary mx-4" name="edit" value="true">Редактировать</button>
                    </form>
                </div>
                <div class="col col-xl-8 col-md-6 col-lg-6">
                    <p class="lead">Имя: {{ $user->name }}</p>
                    <p class="lead">Роль: {{ $role->role }}</p>
                    <p class="lead">Тип аккаунта: {{ $type->type }}</p>
                    <p class="lead">Ваш баланс: {{ $type->cost }}</p>
                    <p class="lead">Дата создания аккаунта: {{ $user->created_at }}</p>
                    @if ($status != true)
                        <form method="POST">
                            @csrf
                            <div class="alert alert-danger" role="alert">Подтвердите email: {{$user->getEmailForVerification()}}</div>
                            <button class="btn btn-primary btn-sm" name="send" value="true">Отправить</button>
                        </form>
                    @endif
                </div>
        </div>
@endsection
