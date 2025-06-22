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

    public function add(array $validated)
    {
        return TestCase::create($validated);
    }
}
