@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Профиль пользователя</h1>
    <div class="card mb-4">
        <div class="card-body">
            <form method="POST" action="{{ route('user.update') }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
            </form>
        </div>
    </div>
</div>
@endsection
    