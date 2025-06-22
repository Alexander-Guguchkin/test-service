@extends('layouts.app')

@section('content')
    <h1>Список тест-кейсов</h1>
    <a href="{{ route('test-cases.create') }}">Создать новый тест-кейс</a>
    <ul>
        @foreach($testCases as $testCase)
            <li>
                <a href="{{ route('test-cases.show', $testCase->id) }}">{{ $testCase->title }}</a>
            </li>
        @endforeach
    </ul>
@endsection
