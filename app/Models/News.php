<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'news_category_id',
        'title',
        'slug',
        'thumbnail',
        'summary',
        'content',
        'author_name',
        'is_featured',
        'published_at',
        'status',
        'views_count',
    ];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id');
    }

    public function getThumbnailUrlAttribute(): string
    {
        if ($this->thumbnail && file_exists(public_path('uploads/news/' . $this->thumbnail))) {
            return asset('uploads/news/' . $this->thumbnail);
        }
        return asset('images/news-placeholder.jpg');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')->orderBy('published_at', 'desc');
    }
}
