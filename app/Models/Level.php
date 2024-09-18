<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Level extends Model
{
    use HasFactory;

    protected $table = 'levels';
    protected $fillable = [
        'desc',
        'name'
    ];

    public $timestamps = false;

    public function modules(): HasMany
    {
        return $this->hasMany(Module::class, 'level_id', 'id');
    }
}
