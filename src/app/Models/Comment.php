<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TestCase;

class Comment extends Model
{
    protected $fillable = ['comment', 'test_id'];

    public function testCase()
    {
        return $this->belongsTo(TestCase::class, 'test_id');
    }
}
