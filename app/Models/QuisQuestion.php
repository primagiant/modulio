<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuisQuestion extends Model
{
    use HasFactory;

    protected $table = 'quis_questions';
    protected $fillable = [
        'module_id',
        'text'
    ];

    public $timestamps = false;

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class, 'module_id', 'id');
    }

    public function quis_answers(): HasMany
    {
        return $this->hasMany(QuisAnswer::class, 'question_id', 'id');
    }
}
