<?php

namespace App\Services;

use App\Models\Feature;

class FeatureService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function getAllFeatures()
    {
        return Feature::all();
    }
    public function getFeature($feature)
    {
        return Feature::findOrFail($feature);
    }
    public function add(array $validated)
    {
        Feature::create($validated);
    }
    public function update(array $validated, $feature)
    {
        $feature = Feature::findOrFail($feature);
        $feature->update($validated);
    }
    public function delete($feature)
    {
        $feature = Feature::findOrFail($feature);
        $feature->delete();
    }
}
