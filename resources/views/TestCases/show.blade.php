@extends('layouts.app')

@section('content')
{{-- @dd($testCase) --}}
    <h1>{{ $testCase->title }}</h1>
    <p><strong>Описание:</strong> {{ $testCase->description }}</p>
    <p><strong>Шаги:</strong> {{ $testCase->steps }}</p>
    <p><strong>Ожидаемый результат:</strong> {{ $testCase->expected_results }}</p>
    <p><strong>Приоритет:</strong> {{ $testCase->priority }}</p>

    <p><strong>Функционал:</strong>
        @if($testCase->features->count())
            <ul>
                @foreach($testCase->features as $feature)
                    <li>{{ $feature->name }}</li>
                @endforeach
            </ul>
        @else
            <span>Не назначено</span>
        @endif
    </p>

    <a href="{{ route('test-cases.edit', $testCase->id) }}">Редактировать</a>
    <form method="POST" action="{{ route('test-cases.destroy', $testCase->id) }}" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Удалить</button>
    </form>
    <br>
    <a href="{{ route('test-cases.index') }}">Назад к списку</a>
@endsection
