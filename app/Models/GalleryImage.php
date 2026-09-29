<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'gallery_id',
        'image_path',
        'caption',
        'order_num',
    ];

    public function gallery(): BelongsTo
    {
        return $this->belongsTo(Gallery::class);
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->image_path && file_exists(public_path('uploads/gallery/' . $this->image_path))) {
            return asset('uploads/gallery/' . $this->image_path);
        }
        return asset('images/gallery-placeholder.jpg');
    }
}
