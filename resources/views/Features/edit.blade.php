@extends('layouts.app')

@section('content')
    <h1>Редактировать функционал</h1>
    <form method="POST" action="{{ route('features.update', $feature->id) }}">
        @csrf
        @method('PUT')
        <label>Название:</label>
        <input type="text" name="name" value="{{ $feature->name }}" required><br>
        <label>Описание:</label>
        <textarea name="description">{{ $feature->description }}</textarea><br>
        <button type="submit">Сохранить</button>
    </form>
@endsection
