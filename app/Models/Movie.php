<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'release_date', 'studio_id'];
    public function Categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function Studio()
    {
        return $this->belongsTo(Studio::class);
    }
}
