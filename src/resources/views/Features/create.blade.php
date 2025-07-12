@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Добавить функционал</h1>
    <form method="POST" action="{{ route('features.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Название:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание:</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>
<script>
    new EasyMDE({ element: document.getElementById('description') });
</script>
@endsection
