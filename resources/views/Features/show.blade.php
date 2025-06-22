{{-- filepath: resources/views/features/show.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>{{ $feature->name ?? 'Без названия' }}</h1>
    <p><strong>Описание:</strong> {{ $feature->description }}</p>
    <a href="{{ route('features.edit', $feature->id) }}">Редактировать</a>
    <form method="POST" action="{{ route('features.destroy', $feature->id) }}" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Удалить</button>
    </form>
    <br>
    <a href="{{ route('features.index') }}">Назад к списку</a>
@endsection
