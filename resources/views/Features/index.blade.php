@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Список функционала</h1>
        <a href="{{ route('features.create') }}" class="btn btn-success">Добавить функционал</a>
    </div>
    <div class="card">
        <div class="card-body p-0">
            <ul class="list-group list-group-flush mb-0">
                @forelse($features as $feature)
                    <li class="list-group-item">
                        <a href="{{ route('features.show', $feature->id) }}">{{ $feature->name ?? 'Без названия' }}</a>
                    </li>
                @empty
                    <li class="list-group-item text-muted">Нет функционала</li>
                @endforelse
            </ul>
        </div>
            @if($features->hasPages())
    <div class="card-footer">
            {{ $features->links() }}
        </div>
    @endif
    </div>
</div>
@endsection
