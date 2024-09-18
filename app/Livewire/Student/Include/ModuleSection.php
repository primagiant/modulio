<?php

namespace App\Livewire\Student\Include;

use Livewire\Component;
use Illuminate\Support\Carbon;

class ModuleSection extends Component
{
    public $userModule;

    public function render()
    {
        return view('livewire.student.include.module-section.index', [
            'userModule' => $this->userModule,
            'module' => $this->userModule->module,
        ]);
    }

    public function rendered()
    {
        $this->dispatch('all:init');
    }
}
