<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestCaseRequest;
use App\Models\TestCase;
use App\Services\TestCaseService;
use App\Services\FeatureService;

class TestCaseController extends Controller
{
    protected TestCaseService $service;
    protected FeatureService $featureService;

    public function __construct(TestCaseService $service, FeatureService $featureService)
    {
        $this->service = $service;
        $this->featureService = $featureService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testCases = TestCase::all();
        return view('TestCases.index',  ['testCases' => $testCases]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $features = $this->featureService->getAllFeatures();
        return view('TestCases.create', compact('features'));
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
        $testCase = $this->service->getById($id);
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
        $this->service->update($request->validated(), $id);
        return redirect()->route('test-cases.index')->with('success', 'Тест-кейс обновлён');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->delete($id);
        return redirect()->route('test-cases.index')->with('success', 'Тест-кейс удалён');
    }
}
