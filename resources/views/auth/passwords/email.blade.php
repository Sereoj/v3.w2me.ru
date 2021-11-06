@extends('layouts.app')

@section('content')
    <div class="row gy-4">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email: </label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="admin@w2me.ru" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <div id="emailHelp" class="form-text">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
@endsection
