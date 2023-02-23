<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'text',
        'created_from_plan',
        'special',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the news item's image path if present
     *
     * @return Attribute
     */
    public function image(): Attribute
    {
        return Attribute::make(
            get: fn (string|null $value) => $value === null ? null : Storage::url($value)
        );
    }
}
