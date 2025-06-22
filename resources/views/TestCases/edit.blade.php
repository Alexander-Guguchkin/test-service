@extends('layouts.app')

@section('content')
    <h1>Редактировать тест-кейс</h1>
    <form method="POST" action="{{ route('test-cases.update', $testCase->id) }}">
        @csrf
        @method('PUT')
        <label>Название:</label>
        <input type="text" name="title" value="{{ $testCase->title }}" required><br>
        <label>Описание:</label>
        <textarea name="description">{{ $testCase->description }}</textarea><br>
        <label>Шаги:</label>
        <textarea name="steps" required>{{ $testCase->steps }}</textarea><br>
        <label>Ожидаемый результат:</label>
        <textarea name="expected_results" required>{{ $testCase->expected_results }}</textarea><br>
        <label>Приоритет:</label>
        <select name="priority">
            <option value="">Не выбран</option>
            <option value="высокий" @if($testCase->priority=='высокий') selected @endif>Высокий</option>
            <option value="средний" @if($testCase->priority=='средний') selected @endif>Средний</option>
            <option value="низкий" @if($testCase->priority=='низкий') selected @endif>Низкий</option>
        </select><br>
        <button type="submit">Сохранить</button>
    </form>
@endsection
