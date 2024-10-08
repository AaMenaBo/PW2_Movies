<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function hasCategory($category)
    {
        return $this->categories->contains($category);
    }
    public function title(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => ucfirst($value),
            set: fn(string $value) => strtolower($value)
        );
    }
    public function description(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => ucfirst($value),
            set: fn(string $value) => strtolower($value)
        );
    }
    protected function casts(): array
    {
        return [
            'title' => 'string',
            'description' => 'string',
            'release_date' => 'date',
            'studio_id' => 'integer'
        ];
    }
}
