@extends('layouts.app')

@section('content')
    <h1>Добавить функционал</h1>
    <form method="POST" action="{{ route('features.store') }}">
        @csrf
        <label>Название:</label>
        <input type="text" name="name" required><br>
        <label>Описание:</label>
        <textarea name="description"></textarea><br>
        <button type="submit">Сохранить</button>
    </form>
@endsection
