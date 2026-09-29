<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Committee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'term_start_year',
        'term_end_year',
        'is_current',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'is_current' => 'boolean',
        ];
    }

    public function members(): HasMany
    {
        return $this->hasMany(CommitteeMember::class)->orderBy('display_order', 'asc');
    }

    public function scopeCurrent($query)
    {
        return $query->where('is_current', true);
    }
}
