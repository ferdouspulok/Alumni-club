<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'banner_image',
        'event_date',
        'event_time',
        'venue',
        'short_description',
        'full_description',
        'is_registration_required',
        'registration_fee',
        'registration_deadline',
        'max_participants',
        'status',
        'is_featured',
    ];

    protected function casts(): array
    {
        return [
            'event_date' => 'date',
            'registration_deadline' => 'datetime',
            'is_registration_required' => 'boolean',
            'is_featured' => 'boolean',
            'registration_fee' => 'decimal:2',
        ];
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function getBannerUrlAttribute(): string
    {
        if ($this->banner_image && file_exists(public_path('uploads/events/' . $this->banner_image))) {
            return asset('uploads/events/' . $this->banner_image);
        }
        return asset('images/event-placeholder.jpg');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('status', 'published')->where('event_date', '>=', now()->toDateString())->orderBy('event_date', 'asc');
    }

    public function scopePast($query)
    {
        return $query->where('status', 'published')->where('event_date', '<', now()->toDateString())->orderBy('event_date', 'desc');
    }
}
