@extends('layouts.app')

@section('content')
    <div class="row gy-4">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Имя: </label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Username" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <div id="nameHelp" class="form-text">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email: </label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="admin@w2me.ru" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <div id="emailHelp" class="form-text">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль:</label>
                <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" name="password" required autocomplete="new-password">
                @error('password')
                <div id="passwordHelp" class="form-text">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Повторите пароль:</label>
                <input type="password" class="form-control" id="password_confirmation" aria-describedby="passwordHelp" name="password_confirmation" required autocomplete="new-password">
                @error('password')
                <div id="passwordHelp" class="form-text">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>
    </div>
@endsection
