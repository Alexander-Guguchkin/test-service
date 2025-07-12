@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Редактировать функционал</h1>
    <form method="POST" action="{{ route('features.update', $feature->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Название:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $feature->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание:</label>
            <textarea class="form-control" id="description" name="description">{{ $feature->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
<script>
    new EasyMDE({ element: document.getElementById('description') });
</script>
@endsection
