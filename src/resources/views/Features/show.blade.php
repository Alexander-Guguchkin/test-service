{{-- filepath: resources/views/features/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0">{{ $feature->name ?? 'Без названия' }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Описание:</strong><br>
                {!! \Illuminate\Support\Str::markdown($feature->description ) !!}
            </p>
            <p><strong>Вопросы:</strong><br>
                @if($feature->questions)
                    {!! \Illuminate\Support\Str::markdown($feature->questions) !!}
                @else
                    Вопросов нет
                @endif
            </p>
        </div>
        <div class="card-footer d-flex justify-content-between align-items-center">
            <div>
                <a href="{{ route('features.edit', $feature->id) }}" class="btn btn-primary btn-sm">Редактировать</a>
                <form method="POST" action="{{ route('features.destroy', $feature->id) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Удалить этот функционал?')">Удалить</button>
                </form>
            </div>
            <a href="{{ route('features.index') }}" class="btn btn-secondary btn-sm">Назад к списку</a>
        </div>
    </div>
</div>
@endsection
