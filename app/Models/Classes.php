<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classes extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = [
        'class_name',
        'year',
        'smt',  // Ganjil : 0 Genap; 1 Active;
        'status',  // Status : 0 Unactive; 1 Active;
    ];

    public $timestamps = true;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'in_classes', 'class_id', 'user_id');
    }

    public function modules(): HasMany
    {
        return $this->hasMany(Module::class, 'class_id', 'id');
    }

    public function addUserToClass($userId)
    {
        $this->users()->attach($userId);
    }

    public function removeUserFromClass($userId)
    {
        $this->users()->detach($userId);
    }

    public function scopeUserClasses($query, $userId)
    {
        return $query->whereIn('id', function ($q) use ($userId) {
            $q->select('class_id')
                ->from('in_classes')
                ->where('user_id', '=', $userId);
        });
    }
}
