@extends('layouts.app')

@section('content')
    <div class="row gy-4">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email: </label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="admin@w2me.ru" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <div id="emailHelp" class="form-text">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль:</label>
                <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" name="password" required autocomplete="current-password">
                @error('password')
                <div id="passwordHelp" class="form-text">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberUser" name="rememberUser" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="rememberUser">Запомни меня</label>
            </div>
            <div class="md-3">
                <button type="submit" class="btn btn-primary">Войти</button>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">Восстановить пароль</a>
                @endif
            </div>
        </form>
    </div>
@endsection
