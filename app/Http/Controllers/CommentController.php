<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    private CommentService $commentService;

    public function __construct( CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function store(CommentRequest $request)
    {
        // Используем validated() вместо validate()
        $validated = $request->validated();

        $this->commentService->add($validated);

        // Возвращаемся обратно на страницу тест-кейса
        return redirect()->back()->with('success', 'Комментарий добавлен');
    }
}
