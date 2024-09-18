<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = [
        'user_id',
        'user_module_id',
        'text',
    ];

    public $timestamps = true;

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function userModule(): BelongsTo
    {
        return $this->belongsTo(UserModule::class, 'user_module_id', 'id');
    }
}
