<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuisDetail extends Model
{
    use HasFactory;

    protected $table = 'quis_details';
    protected $fillable = [
        'user_module_id',
        'question_order',
        'question_id',
        'answer_id',
    ];

    public $timestamp = false;

    public function userModule(): BelongsTo
    {
        return $this->belongsTo(UserModule::class, 'user_module_id', 'id');
    }
}
