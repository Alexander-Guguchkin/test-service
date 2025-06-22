@extends('layouts.app')

@section('content')
    <h1>Создать тест-кейс</h1>
    <form method="POST" action="{{ route('test-cases.store') }}">
        @csrf
        <label>Название:</label>
        <input type="text" name="title" required><br>
        <label>Описание:</label>
        <textarea name="description"></textarea><br>
        <label>Шаги:</label>
        <textarea name="steps" required></textarea><br>
        <label>Ожидаемый результат:</label>
        <textarea name="expected_results" required></textarea><br>
        <label>Приоритет:</label>
        <select name="priority">
            <option value="">Не выбран</option>
            <option value="высокий">Высокий</option>
            <option value="средний">Средний</option>
            <option value="низкий">Низкий</option>
        </select><br>
        <button type="submit">Создать</button>
    </form>
@endsection
