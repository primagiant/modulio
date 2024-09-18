<?php

namespace App\Livewire\Teacher;

use App\Models\Classes;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class TeacherDashboard extends Component
{
    use WithPagination;

    public $search = "";

    public function render()
    {
        $userId = Auth::user()->id;
        $classes = Classes::whereIn('id', function ($q) use ($userId) {
            $q->select('class_id')
                ->from('in_classes')
                ->where('user_id', '=', $userId)
                ->where('class_name', 'like', '%' . $this->search . '%');
        })->with('modules')->paginate(12);
        return view('livewire.teacher.teacher-dashboard', [
            'classes' => $classes,
        ]);
    }
}
