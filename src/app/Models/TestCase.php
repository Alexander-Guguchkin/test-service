<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Feature;
use App\Models\Comment;

class TestCase extends Model
{
    protected $fillable = ['title', 'description', 'steps', 'expected_results', 'priority', 'card_number', 'link_task'];

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'test_id');
    }
}
