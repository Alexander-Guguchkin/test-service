<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommentService;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    private CommentService $service;

    public function __construct(CommentService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = $this->service->getAll();
        return view('TestCases.show', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        $validated = $request->validated();
        $this->service->add($validated);
        return redirect()->route('TestCases.show', $validated['test_case_id'])->with('success', 'Комментарий добавлен');
    }

    /**
     * Display the specified resource.
     */
    // @todo пока реализация метода show закомментирована, так как не используется
    // public function show(string $id)
    // {
    //     $comment = $this->service->getById($id);
    //     return view('comments.show', compact('comment'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = $this->service->getById($id);
        $testCase = $comment->testCase;
        $comments = $testCase->comments()->orderByDesc('created_at')->paginate(5);
        return view('TestCases.show', compact('testCase', 'comments'))->with('editComment', $comment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, string $id)
    {
        $validated = $request->validated();
        $this->service->update($validated, $id);
        $comment = $this->service->getById($id);
        return redirect()->route('TestCases.show', $validated['test_case_id'])->with('success', 'Комментарий добавлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = $this->service->getById($id);
        $testCaseId = $comment->test_case_id;
        $this->service->delete($id);
        // return redirect()->route('TestCases.show', $validated['test_case_id'])->with('success', 'Комментарий добавлен');
    }
}
