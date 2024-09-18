<?php

namespace App\Livewire\Teacher\Module;

use App\Models\Module;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class TeacherDetailModule extends Component
{
    public $moduleId;
    public $classId;

    // Delete Module
    public function deleteModule()
    {
        try {
            $module = Module::findOrFail($this->moduleId);

            // Delete File From Storage
            if ($module->audio_path != "") {
                $relativePath = $module->audio_path;
                if (Storage::disk('public')->exists($relativePath)) {
                    Storage::disk('public')->delete($relativePath);
                }
            }
            if ($module->video_path != "") {
                $relativePath = $module->video_path;
                if (Storage::disk('public')->exists($relativePath)) {
                    Storage::disk('public')->delete($relativePath);
                }
            }
            if ($module->pdf_path != "") {
                $relativePath = $module->pdf_path;
                if (Storage::disk('public')->exists($relativePath)) {
                    Storage::disk('public')->delete($relativePath);
                }
            }

            // Delete data from DB
            $module->delete();

            $this->dispatch('close-modal', modalId: 'deleteModal');
            $this->dispatch('sweet-alert', icon: 'success', title: 'Modul Berhasil di Hapus');
            $this->redirectRoute('teacher.class.index', ['classId' => $this->classId]);
        } catch (\Throwable $e) {
            $this->dispatch('close-modal', modalId: 'deleteModal');
            $this->dispatch('sweet-alert', icon: 'error', title: 'Error while showing');
        }
    }

    // Show Module from User
    public function showModule()
    {
        try {
            $module = Module::findOrFail($this->moduleId);
            $module->is_show = true;
            $module->save();
            $this->dispatch('sweet-alert', icon: 'success', title: 'Modul diperlihatkan');
        } catch (\Throwable $e) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'Error while showing');
        }
    }

    // Hide Module from User
    public function hideModule()
    {
        try {
            $module = Module::findOrFail($this->moduleId);
            $module->is_show = false;
            $module->save();
            $this->dispatch('sweet-alert', icon: 'success', title: 'Modul disembunyikan');
        } catch (\Throwable $e) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'Error while hiding');
        }
    }

    public function render()
    {
        Module::findOrFail($this->moduleId);
        $module = Module::with("classes")->find($this->moduleId);
        $usersModule = Module::find($this->moduleId)->user_modules()->with('user')->paginate(7);
        $quis = Module::find($this->moduleId)->questions()->with("quis_answers")->get();

        return view('livewire.teacher.module.teacher-detail-module', [
            'module' => $module,
            'usersModule' => $usersModule,
            'quis' => $quis,
        ]);
    }

    public function rendered()
    {
        // menjalankan modal perlu menggunakan modal init ini.
        $this->dispatch('all:init');
    }
}
