@extends('layouts.app')

@section('content')
    <h1>{{ $testCase->title }}</h1>
    <p><strong>Описание:</strong> {{ $testCase->description }}</p>
    <p><strong>Шаги:</strong> {{ $testCase->steps }}</p>
    <p><strong>Ожидаемый результат:</strong> {{ $testCase->expected_results }}</p>
    <p><strong>Приоритет:</strong> {{ $testCase->priority }}</p>
    <a href="{{ route('test-cases.edit', $testCase->id) }}">Редактировать</a>
    <form method="POST" action="{{ route('test-cases.destroy', $testCase->id) }}" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Удалить</button>
    </form>
    <br>
    <a href="{{ route('test-cases.index') }}">Назад к списку</a>
@endsection
