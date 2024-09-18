<?php

namespace App\Livewire\Student;

use App\Models\Classes;
use App\Models\UserModule;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class StudentClassList extends Component
{

    use AuthorizesRequests;

    public $classId;
    public $moduleId;

    public $search = "";

    public function activateModule($moduleId)
    {
        $this->dispatch('close-modal', modalId: 'deleteUserModule');
        try {
            UserModule::create([
                'user_id' => Auth::user()->id,
                'module_id' => $moduleId,
            ]);
            $this->dispatch('sweet-alert', icon: 'success', title: 'Berhasil melakukan perubahan');
        } catch (\Throwable $th) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'Gagal melakukan perubahan');
        }
    }

    public function setModuleId($moduleId)
    {
        $this->moduleId = $moduleId;
    }

    public function deactivateModule()
    {
        try {
            $userModule = UserModule::select()->where('module_Id', $this->moduleId)
                ->where('user_Id', Auth::user()->id)->first();
            $userModule->delete();
            $this->reset(['moduleId']);
            $this->dispatch('close-modal', modalId: 'deleteUserModule');
            $this->dispatch('sweet-alert', icon: 'success', title: 'Berhasil melakukan perubahan');
        } catch (\Throwable $th) {
            $this->reset(['moduleId']);
            $this->dispatch('close-modal', modalId: 'deleteUserModule');
            $this->dispatch('sweet-alert', icon: 'error', title: 'Gagal melakukan perubahan');
        }
    }

    public function openUserModule($moduleId)
    {
        $userModuleId = UserModule::select()->where('module_Id', $moduleId)
            ->where('user_Id', Auth::user()->id)->first()->id;
        $this->redirectRoute(
            'student.module.index',
            [
                'classId' => $this->classId,
                'userModuleId' => $userModuleId
            ]
        );
    }

    public function render()
    {
        $class_name = Classes::find($this->classId)->class_name;
        $modules = Classes::find($this->classId)->modules()->with('level', 'user_modules')
            ->where('is_show', '=', true)
            ->where('modules.name', 'like', '%' . $this->search . '%')
            ->paginate(12);

        return view('livewire.student.student-class-list', [
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
