<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'notice_number',
        'description',
        'file_attachment',
        'publish_date',
        'is_pinned',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'publish_date' => 'date',
            'is_pinned' => 'boolean',
        ];
    }

    public function getFileUrlAttribute(): ?string
    {
        if ($this->file_attachment && file_exists(public_path('uploads/notices/' . $this->file_attachment))) {
            return asset('uploads/notices/' . $this->file_attachment);
        }
        return null;
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->orderBy('is_pinned', 'desc')
            ->orderBy('publish_date', 'desc');
    }
}
