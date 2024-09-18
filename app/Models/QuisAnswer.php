<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuisAnswer extends Model
{
    use HasFactory;

    protected $table = 'quis_answers';
    protected $fillable = [
        'question_id',
        'text',
        'order',
        'status'
    ];

    public $timestamps = false;

    public function question(): BelongsTo
    {
        return $this->belongsTo(QuisQuestion::class, 'question_id', 'id');
    }
}
