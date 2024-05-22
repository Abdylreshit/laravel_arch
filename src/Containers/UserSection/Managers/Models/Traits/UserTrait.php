<?php

namespace App\Containers\UserSection\Managers\Models\Traits;

use App\Containers\UserSection\User\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait UserTrait
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getEmailAttribute(): string
    {
        return $this->user->email;
    }

    public function getFirstNameAttribute(): string
    {
        return $this->user->firstname;
    }

    public function getLastNameAttribute(): string
    {
        return $this->user->lastname;
    }

    public function getFullNameAttribute(): string
    {
        return $this->user->full_name;
    }

    public function getPhoneAttribute(): ?string
    {
        return $this->user->phone ?? null;
    }

    public function getIsBlockedAttribute(): bool
    {
        return $this->user->is_blocked;
    }

    public function scopeWhereEmail($query, $email)
    {
        return $query->whereHas('user', function ($query) use ($email) {
            $query->where('email', $email);
        });
    }

    public function scopeWhereFirstName($query, $firstName)
    {
        return $query->whereHas('user', function ($query) use ($firstName) {
            $query->where('firstname', $firstName);
        });
    }

    public function scopeWhereLastName($query, $lastName)
    {
        return $query->whereHas('user', function ($query) use ($lastName) {
            $query->where('lastname', $lastName);
        });
    }

    public function scopeWhereLikeEmail($query, $email)
    {
        return $query->whereHas('user', function ($query) use ($email) {
            $query->where('email','LIKE', "%$email%");
        });
    }

    public function scopeWhereLikeFirstName($query, $firstName)
    {
        return $query->whereHas('user', function ($query) use ($firstName) {
            $query->where('firstname', "%$firstName%");
        });
    }

    public function scopeWhereLikeLastName($query, $lastName)
    {
        return $query->whereHas('user', function ($query) use ($lastName) {
            $query->where('lastname', "%$lastName%");
        });
    }
}
