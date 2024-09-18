<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
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
        'identity',
        'sex',
        'role' // 0 = admin, 1 = teacher, 2 = student
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    // Start Interaction With Class
    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(Classes::class, 'in_classes', 'user_id', 'class_id');
    }

    public function allowedClass()
    {
        return $this->classes()->pluck('class_id');
    }

    public function scopeInClass($query, $role, $classId)
    {
        return $query->where('role', '=', $role)
            ->whereIn('id', function ($q) use ($classId) {
                $q->select('user_id')
                    ->from('in_classes')
                    ->where('class_id', '=', $classId);
            });
    }

    public function scopeNotInClass($query, $role, $classId)
    {
        return $query->where('role', '=', $role)
            ->whereNotIn('id', function ($q) use ($classId) {
                $q->select('user_id')
                    ->from('in_classes')
                    ->where('class_id', '=', $classId);
            });
    }
    // End Interaction With Class


    // Start Interaction With User Module
    public function user_modules(): HasMany
    {
        return $this->hasMany(UserModule::class, 'user_id', 'id');
    }

    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }
    // End Interaction With User Module
}
