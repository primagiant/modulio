<?php

namespace App\Livewire;

use App\Models\Classes;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ClassListSidebar extends Component
{
    public function render()
    {
        $userId = Auth::user()->id;
        $classes = CLasses::select('*')
            ->whereIn('id', function ($q) use ($userId) {
                $q->select('class_id')
                    ->from('in_classes')
                    ->where('user_id', '=', $userId);
            })
            ->orderBy('updated_at', 'DESC')
            ->paginate(10);
        return view('livewire.commons.class-list-sidebar', [
            "classes" => $classes,
        ]);
    }
}
