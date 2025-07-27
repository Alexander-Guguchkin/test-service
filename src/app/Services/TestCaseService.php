<?php

namespace App\Services;

use App\Models\TestCase;
use Illuminate\Support\Facades\Log;

class TestCaseService
{
    /**
     * Create a new class instance.
     */
    private TestCase $model;
    public function __construct(TestCase $model)
    {
        $this->model = $model;
    }

    public function add(array $validated)
    {
        $features = $validated['features'] ?? [];
        unset($validated['features']);
        $testCase = $this->model->create($validated);
        if (!empty($features)) {
            $testCase->features()->attach($features);
        }
        return $testCase;
    }
    public function update(array $validated, $id)
    {
        $testCase = $this->model->findOrFail($id);
        $features = $validated['features'] ?? null;
        unset($validated['features']);
        $testCase->update($validated);
        if ($features !== null) {
            $testCase->features()->sync($features);
        }
        return $testCase;
    }
    public function delete($id)
    {
        $testCase = $this->model->findOrFail($id);
        return $testCase->delete();
    }
    public function getAll()
    {
        return $this->model->all();
    }
    public function getById($id)
    {
        return $this->model->with('features')->findOrFail($id);
    }
}
