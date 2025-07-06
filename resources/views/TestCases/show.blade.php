@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0">{{ $testCase->title }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Описание:</strong><br>
                {!! nl2br(e($testCase->description)) !!}
            </p>
            <p><strong>Шаги:</strong><br>
                {!! nl2br(e($testCase->steps)) !!}
            </p>
            <p><strong>Ожидаемый результат:</strong><br>
                {!! nl2br(e($testCase->expected_results)) !!}
            </p>
            <p><strong>Приоритет:</strong> {{ $testCase->priority }}</p>
            <p><strong>Функционал:</strong>
                @if($testCase->features->count() > 0)
                    <ol class="mb-2">
                        @foreach($testCase->features as $feature)
                            <li>{{ $feature->name }}</li>
                        @endforeach
                    </ol>
                @else
                    <span class="text-muted">Не назначено</span>
                @endif
            </p>
        </div>
        <div class="card-footer d-flex justify-content-between align-items-center">
            <div>
                <a href="{{ route('test-cases.edit', $testCase->id) }}" class="btn btn-primary btn-sm">Редактировать</a>
                <form method="POST" action="{{ route('test-cases.destroy', $testCase->id) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Удалить этот тест-кейс?')">Удалить</button>
                </form>
            </div>
            <a href="{{ route('test-cases.index') }}" class="btn btn-secondary btn-sm">Назад к списку</a>
        </div>
    </div>
</div>
@endsection
