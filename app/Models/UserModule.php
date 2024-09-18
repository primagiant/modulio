<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserModule extends Model
{
    use HasFactory;

    protected $table = 'user_modules';
    protected $fillable = [
        'user_id',
        'module_id',
        'module_start',
        'module_end',
        'resume_text',
        'resume_score',
        'resume_start',
        'resume_end',
        'reflection',
        'teacher_feedback',
        'quis_score',
        'quis_start',
        'quis_end',
    ];

    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class, 'module_id', 'id');
    }

    public function quisDetails(): HasMany
    {
        return $this->hasMany(QuisDetail::class, 'user_module_id', 'id');
    }
}
