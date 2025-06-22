<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestCaseRequest;
use App\Models\TestCase;
use App\Services\TestCaseService;

class TestCaseController extends Controller
{
    protected TestCaseService $service;

    public function __construct(TestCaseService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testCases = \App\Models\TestCase::all();
        return view('TestCases.index',  ['testCases' => $testCases]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('TestCases.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestCaseRequest $request)
    {
        $testCase = $this->service->add($request->validated());
        return redirect()->route('test-cases.index')->with('success', 'Тест-кейс создан');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $testCase = TestCase::findOrFail($id);
        return view('TestCases.show', compact('testCase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $testCase = TestCase::findOrFail($id);
        return view('TestCases.edit', compact('testCase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestCaseRequest $request, string $id)
    {
        // @todo: сделать обновление через сервис
        $testCase = TestCase::findOrFail($id);
        $testCase->update($request->validated());
        return redirect()->route('test-cases.index')->with('success', 'Тест-кейс обновлён');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // @todo: сделать удаление через сервис
        $testCase = TestCase::findOrFail($id);
        $testCase->delete();
        return redirect()->route('test-cases.index')->with('success', 'Тест-кейс удалён');
    }
}
