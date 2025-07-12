<?php

namespace App\Services;
use App\Models\Comment;

class CommentService
{
    /**
     * Create a new class instance.
     */
    private Comment $comment;
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function add (array $validated){
        return $this->comment->create($validated);
    }
}
