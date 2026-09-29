<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommitteeMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'committee_id',
        'member_id',
        'name',
        'designation',
        'photo',
        'phone',
        'email',
        'bio',
        'display_order',
    ];

    public function committee(): BelongsTo
    {
        return $this->belongsTo(Committee::class);
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    public function getPhotoUrlAttribute(): string
    {
        if ($this->photo && file_exists(public_path('uploads/members/' . $this->photo))) {
            return asset('uploads/members/' . $this->photo);
        }
        if ($this->member && $this->member->photo && file_exists(public_path('uploads/members/' . $this->member->photo))) {
            return asset('uploads/members/' . $this->member->photo);
        }
        return asset('images/avatar-placeholder.png');
    }
}
