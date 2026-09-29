<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'membership_type_id',
        'member_id',
        'full_name',
        'father_name',
        'mother_name',
        'spouse_name',
        'date_of_birth',
        'gender',
        'blood_group',
        'mobile',
        'emergency_contact',
        'email',
        'nid_or_passport',
        'photo',
        'present_address',
        'permanent_address',
        'district',
        'upazila',
        'profession',
        'organization',
        'designation',
        'proposed_by_name',
        'proposed_by_member_id',
        'status',
        'rejection_reason',
        'approved_by',
        'approved_at',
        'is_public_directory',
        'show_phone_public',
        'show_email_public',
    ];

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'approved_at' => 'datetime',
            'is_public_directory' => 'boolean',
            'show_phone_public' => 'boolean',
            'show_email_public' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function membershipType(): BelongsTo
    {
        return $this->belongsTo(MembershipType::class);
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(MembershipPayment::class);
    }

    public function eventRegistrations(): HasMany
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function getPhotoUrlAttribute(): string
    {
        if ($this->photo && file_exists(public_path('uploads/members/' . $this->photo))) {
            return asset('uploads/members/' . $this->photo);
        }
        return asset('images/avatar-placeholder.png');
    }

    public function getVerificationUrlAttribute(): string
    {
        return url('/verify-member/' . ($this->member_id ?? $this->id));
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopePublicDirectory($query)
    {
        return $query->where('status', 'approved')->where('is_public_directory', true);
    }
}
