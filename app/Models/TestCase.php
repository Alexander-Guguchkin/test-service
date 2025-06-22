<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestCase extends Model
{
    protected $fillable = ['title', 'description', 'steps', 'expected_results', 'priority'];

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }
}
