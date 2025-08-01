@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Редактировать тест-кейс</h1>
        <form method="POST" action="{{ route('test-cases.update', $testCase->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Название:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $testCase->title }}" placeholder="Введите название карточки (обязательно)" required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Номер карточки и имя:</label>
                <input type="text" class="form-control" id="card_number" name="card_number" placeholder="Введите номер и имя тестируемой карточки (необязательно)" value="{{ $testCase->card_number }}" required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Ссылка на карточку в трекере:</label>
                <input type="text" class="form-control" id="link_task" name="link_task" placeholder="Введите ссылку тестируемой карточки (необязательно)" value="{{ $testCase->link_task }}" required >
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Описание:</label>
                <textarea class="form-control" id="description" name="description">{{ $testCase->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="steps" class="form-label">Шаги:</label>
                <textarea class="form-control" id="steps" name="steps">{{ $testCase->steps }}</textarea>
            </div>
            <div class="mb-3">
                <label for="expected_results" class="form-label">Ожидаемый результат:</label>
                <textarea class="form-control" id="expected_results" name="expected_results">{{ $testCase->expected_results }}</textarea>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Заметки:</label>
                <textarea class="form-control" id="notes" name="notes">{{$testCase->notes}}</textarea>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Вопросы:</label>
                <textarea class="form-control" id="questions" name="questions">{{$testCase->questions}}</textarea>
            </div>
            <div class="mb-3">
                <label for="priority" class="form-label">Приоритет:</label>
                <select class="form-select" id="priority" name="priority">
                    <option value="">Не выбран</option>
                    <option value="высокий" @if($testCase->priority=='высокий') selected @endif>Высокий</option>
                    <option value="средний" @if($testCase->priority=='средний') selected @endif>Средний</option>
                    <option value="низкий" @if($testCase->priority=='низкий') selected @endif>Низкий</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="features" class="form-label">Функционал:</label>
                <select class="form-select" id="features" name="features[]" multiple>
                    @foreach($features as $feature)
                        <option value="{{ $feature->id }}"
                            @if(isset($testCase) && $testCase->features->contains($feature->id)) selected @endif>
                            {{ $feature->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
    <script>
        new EasyMDE({ element: document.getElementById('description') });
        new EasyMDE({ element: document.getElementById('steps') });
        new EasyMDE({ element: document.getElementById('expected_results') });
        new EasyMDE({ element: document.getElementById('notes') });
        new EasyMDE({ element: document.getElementById('questions') });
    </script>
@endsection
