<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'cover_image',
        'event_date',
        'description',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'event_date' => 'date',
        ];
    }

    public function images(): HasMany
    {
        return $this->hasMany(GalleryImage::class)->orderBy('order_num', 'asc');
    }

    public function getCoverUrlAttribute(): string
    {
        if ($this->cover_image && file_exists(public_path('uploads/gallery/' . $this->cover_image))) {
            return asset('uploads/gallery/' . $this->cover_image);
        }
        return asset('images/gallery-placeholder.jpg');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')->orderBy('event_date', 'desc');
    }
}
