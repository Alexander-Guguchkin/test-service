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
        $testCase = $this->model->create($validated);
        $testCase->features()->attach($validated['features']);
        Log::info('Тест-кейс создан', ['test_case_id' => $testCase->id, 'data' => $validated]);
        return $testCase;
    }
    public function update(array $validated, $id)
    {
        $testCase =$this->model->findOrFail($id);
        return $testCase->update($validated);
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
