<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = ['name', 'description'];

    public function testCases()
    {
        return $this->belongsToMany(TestCase::class);
    }
}
