@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Список тест-кейсов</h1>
        <a href="{{ route('test-cases.create') }}" class="btn btn-success">Создать новый тест-кейс</a>
    </div>
    <div class="card">
        <div class="card-body p-0">
            <ul class="list-group list-group-flush mb-0">
                @forelse($testCases as $testCase)
                    <li class="list-group-item d-flex justify-content-between">
                        <a href="{{ route('test-cases.show', $testCase->id) }}">{{ $testCase->title}}</a>
                        <a href="{{$testCase->link_task}}">{{$testCase->card_number}}</a>
                    </li>
                @empty
                    <li class="list-group-item text-muted">Нет тест-кейсов</li>
                @endforelse
            </ul>
        </div>
    @if($testCases->hasPages())
        <div class="card-footer">
            {{ $testCases->links() }}
        </div>
    @endif
    </div>
</div>
@endsection
