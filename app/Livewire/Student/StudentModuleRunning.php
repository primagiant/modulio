<?php

namespace App\Livewire\Student;

use Livewire\Component;
use App\Models\UserModule;
use Illuminate\Support\Carbon;

class StudentModuleRunning extends Component
{
    public $classId;
    public $userModuleId;

    public $module;
    public $userModule;

    public $resumeText = "";

    /**
     * in this section using a common livewire function to
     * do the function that we need
     */

    public function mount()
    {
        $this->userModule = UserModule::find($this->userModuleId);
        $this->module = $this->userModule->module;
        // check if module is ended
        if ($this->userModule->module_end != null) {
            $isModuleEnded = true;
        }
        // check if resume is ended
        if ($this->userModule->resume_end != null) {
            $isModuleEnded = true;
        }
        // check if quis is ended
        if ($this->userModule->quis_end != null) {
            $isModuleEnded = true;
        }
    }

    public function render()
    {
        return view('livewire.student.student-module-running', [
            'className' => $this->module->classes->class_name,
            'module' => $this->module,
            'userModule' => $this->userModule,
        ]);
    }

    public function rendered()
    {
        $this->dispatch('all:init');
        $this->dispatch('pdfreader:init');
    }

    /**
     * this section is for manage the module section in view
     * to show video, pdf, and audio if exits
     */

    public function startModule()
    {
        $userModule = $this->userModule;
        $startTime = Carbon::now(); // using UTC
        $userModule->module_start = $startTime;
        $userModule->save();
    }

    public function endModule()
    {
        $userModule = $this->userModule;
        $endTime = Carbon::now(); // using UTC
        $userModule->module_end = $endTime;
        $userModule->save();
    }

    public function getModuleElapsedTimeProperty()
    {
        $start = Carbon::parse($this->userModule->module_start);
        $end = Carbon::parse($this->userModule->module_end);

        $duration = $end->diff($start);
        $formattedDuration = $duration->format('%h jam %i menit %s detik');

        return $formattedDuration;
    }

    /**
     * this section is for manage the resume section in view
     */

    public function startResume()
    {
        $userModule = $this->userModule;
        $startTime = Carbon::now(); // using UTC
        $userModule->resume_start = $startTime;
        $userModule->save();
    }

    public function endSaveResume()
    {
        $userModule = $this->userModule;
        $endTime = Carbon::now(); // using UTC
        $userModule->resume_text = $this->resumeText;
        $userModule->module_end = $endTime;
        $userModule->save();
    }

    public function getResumeElapsedTimeProperty()
    {
        $start = Carbon::parse($this->userModule->resume_start);
        $end = Carbon::parse($this->userModule->resume_end);

        $duration = $end->diff($start);
        $formattedDuration = $duration->format('%h jam %i menit %s detik');

        return $formattedDuration;
    }
}
