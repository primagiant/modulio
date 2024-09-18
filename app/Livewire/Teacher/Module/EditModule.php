<?php

namespace App\Livewire\Teacher\Module;

use App\Models\Level;
use App\Models\Module;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

class EditModule extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $classId;
    public $moduleId;

    #[Validate('required')]
    public $name = "";

    // #[Validate('nullable|mimes:mp4|max:10420')]
    public $video = null;

    // #[Validate('nullable|mimes:pdf|max:10420')]
    public $document = null;

    // #[Validate('nullable|mimes:mp3|max:10420')]
    public $audio = null;

    #[Validate('required')]
    public $desc = "";

    #[Validate('required')]
    public $source = "";

    #[Validate('required')]
    public $levelId = "";

    public function mount()
    {
        // Call Module model by Id
        $module = Module::findOrFail($this->moduleId);

        // Assign to the property
        $this->name = $module->name;
        $this->video = $module->video;
        $this->document = $module->document;
        $this->audio = $module->audio;
        $this->desc = $module->desc;
        $this->source = $module->source;
        $this->levelId = $module->level_id;
    }

    public function render()
    {
        $module = Module::findOrFail($this->moduleId);
        $levels = Level::all();
        return view('livewire.teacher.module.edit-module', [
            'module' => $module,
            'levels' => $levels,
        ]);
    }

    public function rendered()
    {
        $this->dispatch('all:init');
        $this->dispatch('ckeditor:init');
    }

    public function editModule()
    {
        $this->validate();
        try {
            // Check is the module available
            $module = Module::findOrFail($this->moduleId);

            // HANDLE FILE SYSTEM
            if ($this->document != "") {
                $relativePath = $module->pdf_path;
                if (Storage::disk('public')->exists($relativePath)) {
                    Storage::disk('public')->delete($relativePath);
                }
                $documentPath = $this->_uploadFileFromDropzone($this->document);
                $module->pdf_path = $documentPath;
            }
            if ($this->video != "") {
                $relativePath = $module->video_path;
                if (Storage::disk('public')->exists($relativePath)) {
                    Storage::disk('public')->delete($relativePath);
                }
                $videoPath =  $this->_uploadFileFromDropzone($this->video);
                $module->video_path = $videoPath;
            }
            if ($this->audio != "") {
                $relativePath = $module->audio_path;
                if (Storage::disk('public')->exists($relativePath)) {
                    Storage::disk('public')->delete($relativePath);
                }
                $audioPath = $this->_uploadFileFromDropzone($this->audio);
                $module->audio_path = $audioPath;
            }

            // EDIT VALUE
            $module->class_id = $this->classId;
            $module->level_id = $this->levelId;
            $module->name = $this->name;
            $module->desc = $this->desc;
            $module->source = $this->source;

            // SAVE MODULE
            $module->save();

            $this->dispatch('sweet-alert', icon: 'success', title: 'Module Updated');
            $this->redirectRoute('teacher.module.index', ['classId' => $this->classId, 'moduleId' => $this->moduleId]);
            $this->reset(['name', 'video', 'document', 'audio', 'desc', 'source', 'levelId']);
        } catch (\Throwable $e) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'Error while updating');
        }
    }

    private function _uploadFileFromDropzone($file)
    {
        $destinationPath = "";
        if ($file != null) {
            $fileArray = $file[0];
            $originalFilename = pathinfo($fileArray['tmpFilename'], PATHINFO_FILENAME);
            $extension = $fileArray['extension'];
            $filePath = $originalFilename . '-' . uniqid() . '.' . $extension;

            // Move the file to the desired directory with a unique name
            $destinationPath = 'files/' . $extension . '/' . $filePath;
            Storage::disk('public')->put($destinationPath, file_get_contents($fileArray['path']));
        }

        return $destinationPath;
    }
}
