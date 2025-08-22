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

    public function index()
    {
        $testCases = TestCase::orderBy('created_at', 'desc')
            ->paginate(10)
            ->through(function ($testCase) {
                return [
                    'id' => $testCase->id,
                    'name' => $testCase->name,
                    'description' => $testCase->description,
                    'created_at' => $testCase->created_at->format('d.m.Y H:i'),
                ];
            });

        return Inertia::render('TestCases/Index', [
            'testCases' => $testCases,
            // 'features' => $this->featureService->getAllFeatures(),
        ]);
    }

    public function create()
    {
        return Inertia::render('TestCases/Create', [
            'features' => $this->featureService->getAllFeatures(),
        ]);
    }

    public function store(TestCaseRequest $request)
    {
        $testCase = $this->service->add($request->validated());
        return redirect()->route('test-cases.index')->with('success', 'Тест-кейс создан');
    }

    public function show($id)
    {
        $testCase = TestCase::with(['features', 'comments' => function($query) {
            $query->orderBy('created_at', 'desc');
        }])->findOrFail($id);

        return Inertia::render('TestCases/Show', [
            'testCase' => $testCase,
            'comments' => $testCase->comments()->paginate(10),
        ]);
    }

    public function edit($id)
    {
        $testCase = TestCase::findOrFail($id);

        return Inertia::render('TestCases/Edit', [
            'testCase' => $testCase,
            'features' => $this->featureService->getAllFeatures(),
        ]);
    }

    public function update(TestCaseRequest $request, string $id)
    {
        $this->service->update($request->validated(), $id);
        return redirect()->route('test-cases.index')->with('success', 'Тест-кейс обновлён');
    }

    public function destroy(string $id)
    {
        $this->service->delete($id);
        return redirect()->route('test-cases.index')->with('success', 'Тест-кейс удалён');
    }
}
