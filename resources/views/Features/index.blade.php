@extends('layouts.app')

@section('content')
    <h1>Список функционала</h1>
    <a href="{{ route('features.create') }}">Добавить функционал</a>
    <ul>
        @foreach($features as $feature)
            <li>
                <a href="{{ route('features.show', $feature->id) }}">{{ $feature->name ?? 'Без названия' }}</a>
            </li>
        @endforeach
    </ul>
@endsection
