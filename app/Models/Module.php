<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;

    protected $table = 'modules';
    protected $fillable = [
        'class_id',
        'level_id',
        'pdf_path',
        'audio_path',
        'video_path',
        'name',
        'desc',
        'source',
        'is_show'
    ];

    public $timestamps = false;

    public function classes(): BelongsTo
    {
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }

    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }

    public function user_modules(): HasMany
    {
        return $this->hasMany(UserModule::class, 'module_id', 'id');
    }

    public function questions(): HasMany
    {
        return $this->hasMany(QuisQuestion::class, 'module_id', 'id');
    }

    /**
     * For getting status in student
     * 0 = Inactive, 1 = On-Progress, 2 = Completed
     * @return int
     */
    public function getStatus()
    {
        $userId = Auth::user()->id;
        $userModule = $this->user_modules()->where('user_id', $userId)->first();

        if (!$userModule) {
            return 0;
        }

        if (empty($userModule->resume_score) || empty($userModule->teacher_feedback)) {
            return 1;
        }

        return 2;
    }
}
