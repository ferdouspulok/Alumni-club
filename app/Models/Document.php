<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'file_path',
        'file_size',
        'description',
        'is_public',
    ];

    protected function casts(): array
    {
        return [
            'is_public' => 'boolean',
        ];
    }

    public function getDownloadUrlAttribute(): string
    {
        if ($this->file_path && file_exists(public_path('uploads/documents/' . $this->file_path))) {
            return asset('uploads/documents/' . $this->file_path);
        }
        return '#';
    }
}
