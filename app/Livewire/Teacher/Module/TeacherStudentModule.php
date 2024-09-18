<?php

namespace App\Livewire\Teacher\Module;

use Livewire\Component;

class TeacherStudentModule extends Component
{
    public $moduleId;
    public $studentId;

    public function render()
    {
        return view('livewire.teacher.module.teacher-student-module');
    }

    public function rendered()
    {
        // menjalankan modal perlu menggunakan modal init ini.
        $this->dispatch('all:init');
    }
}
