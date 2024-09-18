<?php

namespace App\Livewire\Teacher\Module;

use App\Models\Classes;
use Livewire\Component;
use Livewire\WithPagination;

class TeacherListModule extends Component
{
    use WithPagination;

    public $classId;

    public $search = "";

    public function render()
    {
        $class_name = Classes::find($this->classId)->class_name;
        $modules = Classes::find($this->classId)->modules()->with('level', 'user_modules')
            ->where('modules.name', 'like', '%' . $this->search . '%')
            ->paginate(12);

        return view('livewire.teacher.module.teacher-list-module', [
            'modules' => $modules,
            'class_name' => $class_name,
            'classId' => $this->classId,
        ]);
    }

    public function rendered()
    {
        // menjalankan modal perlu menggunakan modal init ini.
        $this->dispatch('all:init');
    }
}
