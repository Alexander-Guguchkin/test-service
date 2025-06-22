<?php

namespace App\Services;

use App\Models\TestCase;

class TestCaseService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function add(array $validated,)
    {
        TestCase::create($validated);
    }
    public function update(array $validated, $testCase)
    {
        $testCase = TestCase::findOrFail($testCase);
        $testCase->update($validated);
    }
    public function delete($testCase)
    {
        $testCase = TestCase::findOrFail($testCase);
        $testCase->delete();
    }
}
