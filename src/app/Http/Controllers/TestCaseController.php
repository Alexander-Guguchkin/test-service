<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestCaseRequest;
use App\Models\TestCase;
use App\Services\TestCaseService;
use App\Services\FeatureService;
use Inertia\Inertia;
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
        $testCases = TestCase::orderBy('created_at', 'desc')->paginate(10);
        return Inertia::render('TestCases/Index',[
            'testCases' => $testCases
        ]);
        // return view('TestCases.index',  compact('testCases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $features = $this->featureService->getAllFeatures();
        return Inertia::render('TestCases/TestCaseForm',[
            'features' => $features
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestCaseRequest $request)
    {
        $testCase = $this->service->add($request->validated());
        return redirect()->route('/')->with('success', 'Тест-кейс создан');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $testCase = TestCase::with('features')->findOrFail($id);
        $comments = $testCase->comments()->orderByDesc('created_at')->paginate(10);
        return view('TestCases.show', compact('testCase', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $testCase = TestCase::findOrFail($id);
        $features = $this->featureService->getAllFeatures();
        return view('TestCases.edit', compact('testCase', 'features'));
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
