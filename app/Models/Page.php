<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'content',
        'featured_image',
        'meta_title',
        'meta_description',
    ];

    public function getFeaturedImageUrlAttribute(): ?string
    {
        if ($this->featured_image && file_exists(public_path('uploads/' . $this->featured_image))) {
            return asset('uploads/' . $this->featured_image);
        }
        return null;
    }
}
