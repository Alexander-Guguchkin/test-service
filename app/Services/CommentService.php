<?php

namespace App\Services;
use App\Models\Comment;

class CommentService
{
    private Comment $model;

    /**
     * Create a new class instance.
     */
    public function __construct(Comment $model)
    {
        $this->model = $model;
    }

    public function add(array $validated)
    {
        return $this->model->create($validated);
    }

    public function update(array $validated, $id)
    {
        $comment = $this->model->findOrFail($id);
        $comment->update($validated);
        return $comment;
    }

    public function delete($id)
    {
        $comment = $this->model->findOrFail($id);
        return $comment->delete();
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        // Исправлено: правильное имя связи - должно быть 'testCase', а не 'test'
        return $this->model->with('testCase')->findOrFail($id);
    }
}
