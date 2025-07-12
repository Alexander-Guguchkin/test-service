@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card mb-4">
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

    <!-- Форма для добавления или редактирования комментария -->
    <div class="card mb-4">
        <div class="card-header">
            <strong>
                @if(isset($editComment))
                    Редактировать комментарий
                @else
                    Добавить комментарий
                @endif
            </strong>
        </div>
        <div class="card-body">
                <form method="POST" action="{{ route('comments.store') }}">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="test_id" value="{{ $testCase->id }}">
                    <div class="mb-3">
                        <label for="comment" class="form-label">Комментарий (Markdown):</label>
                        <textarea class="form-control" id="comment" name="comment" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                    <a href="{{ route('test-cases.show', $testCase->id) }}" class="btn btn-secondary">Отмена</a>
                </form>
        </div>
    </div>

    <!-- Список комментариев -->
    <div class="card">
        <div class="card-header">
            <strong>Комментарии</strong>
        </div>
        <div class="card-body p-0">
            @forelse($comments as $comment)
                <div class="border-bottom px-3 py-2">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <div class="text-muted small">
                            {{ $comment->created_at->format('d.m.Y H:i') }}
                        </div>
                    </div>
                    <div>
                        {!! \Illuminate\Support\Str::markdown($comment->comment) !!}
                    </div>
                </div>
            @empty
                <div class="p-3"><span class="text-muted">Комментариев пока нет.</span></div>
            @endforelse
        </div>
        @if($comments->hasPages())
            <div class="card-footer">
                {{ $comments->links() }}
            </div>
        @endif
    </div>
</div>
<script>
    new EasyMDE({ element: document.getElementById('comment') });
</script>
@endsection
