<?php

namespace App\Livewire\Teacher\Module;

use App\Models\Level;
use App\Models\Module;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

class AddModule extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $classId;

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

    public function createNewModule()
    {
        $this->validate();
        try {
            // HANDLE FILE SYSTEM
            $documentPath = $this->_uploadFileFromDropzone($this->document);
            $videoPath =  $this->_uploadFileFromDropzone($this->video);
            $audioPath = $this->_uploadFileFromDropzone($this->audio);

            // SAVE MODULE
            Module::create([
                'class_id' => $this->classId,
                'level_id' => $this->levelId,
                'pdf_path' => $documentPath,
                'audio_path' => $audioPath,
                'video_path' => $videoPath,
                'name' => $this->name,
                'desc' => $this->desc,
                'source' => $this->source,
                'is_show' => false,
            ]);

            $this->dispatch('sweet-alert', icon: 'success', title: 'Class created');
            $this->redirectRoute('teacher.class.index', ['classId' => $this->classId]);
            $this->reset(['name', 'video', 'document', 'audio', 'desc', 'source', 'levelId']);
        } catch (\Throwable $e) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'Error while create');
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

    public function render()
    {
        $levels = Level::all();
        return view('livewire.teacher.module.add-new-module', [
            'levels' => $levels
        ]);
    }

    public function rendered()
    {
        $this->dispatch('all:init');
        $this->dispatch('ckeditor:init');
    }
}
