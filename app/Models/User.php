<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;


use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'job_role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function jobRoles()
{
    return $this->belongsToMany(JobRole::class);
}
 

public function manager(): BelongsTo
{
    return $this->belongsTo(User::class, 'manager_id');
}

public function managers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_user', 'subordinate_id', 'manager_id');
    }

    public function subordinates(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_user', 'manager_id', 'subordinate_id');
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Determine if the user is a regular user.
     *
     * @return bool
     */
    public function isUser()
    {
        return $this->role === 'user';
    }

    public function jobRole()
        {
            return $this->belongsTo(JobRole::class);
        }


}
