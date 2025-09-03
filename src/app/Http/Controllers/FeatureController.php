<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeatureRequest;
use App\Services\FeatureService;
use Inertia\Inertia;
class FeatureController extends Controller
{
    protected FeatureService $service;

    public function __construct(FeatureService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = $this->service->getAllFeatures();
        return Inertia::render('Features/Index', ['features' => $features]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Features/FeaturesForm');
        // return view('Features.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeatureRequest $request)
    {
        $this->service->add($request->validated());
        return redirect()->route('features.index')->with('success', 'Функционал добавлен');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $feature = $this->service->getFeature($id);
        return view('Features.show', compact('feature'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $feature = $this->service->getFeature($id);
        return view('Features.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FeatureRequest $request, string $id)
    {
        $this->service->update($request->validated(), $id);
        return redirect()->route('features.index')->with('success', 'Функционал обновлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->delete($id);
        return redirect()->route('features.index')->with('success', 'Функционал удален');
    }
}
