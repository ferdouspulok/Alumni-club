<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'role',
        'status',
        'avatar',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function member(): HasOne
    {
        return $this->hasOne(Member::class);
    }

    public function isSuperAdmin(): bool
    {
        return $this->role === 'super_admin';
    }

    public function isMemberManager(): bool
    {
        return in_array($this->role, ['super_admin', 'member_manager']);
    }

    public function isContentManager(): bool
    {
        return in_array($this->role, ['super_admin', 'content_manager']);
    }

    public function isAdmin(): bool
    {
        return in_array($this->role, ['super_admin', 'member_manager', 'content_manager']);
    }

    public function isMember(): bool
    {
        return $this->role === 'member';
    }

    public function getRoleTitleAttribute(): string
    {
        return match($this->role) {
            'super_admin' => 'Super Administrator',
            'member_manager' => 'Member Manager',
            'content_manager' => 'Content Manager',
            'member' => 'Club Member',
            default => ucfirst(str_replace('_', ' ', $this->role)),
        };
    }
}
