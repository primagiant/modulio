<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Classes;

class ClassPolicy
{
    /**
     * Allow only user in class
     */
    public function accessClass(User $user, $classId)
    {
        return $user->allowedClass()->contains($classId);
    }
}
