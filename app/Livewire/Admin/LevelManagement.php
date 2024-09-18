<?php

namespace App\Livewire\Admin;

use App\Models\Level;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;

class LevelManagement extends Component
{
    use WithPagination;

    public $search;

    public $selectedLevel;

    #[Validate('required')]
    public $name = '';

    #[Validate('required')]
    public $desc = '';

    public function save()
    {
        $this->validate();
        try {
            Level::create([
                'name' => $this->name,
                'desc' => $this->desc,
            ]);
            $this->reset(['name', 'desc']);
            $this->dispatch('close-modal', modalId: 'createLevelModal');
            $this->dispatch('sweet-alert', icon: 'success', title: 'Level created');
        } catch (\Throwable $e) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'Error while craete');
        }
    }

    public function edit(int $id)
    {
        $level = Level::find($id);
        $this->selectedLevel = $id;
        $this->name = $level->name;
        $this->desc = $level->desc;
    }

    public function update()
    {
        $this->validate();
        try {
            $level = Level::find($this->selectedLevel);
            $level->name = $this->name;
            $level->desc = $this->desc;
            $level->save();

            $this->reset(['name', 'desc', 'selectedLevel']);
            $this->dispatch('close-modal', modalId: 'editLevelModal');
            $this->dispatch('sweet-alert', icon: 'success', title: 'Level updated');
        } catch (\Throwable $e) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'Error while updating');
        }
    }

    public function delete(int $id)
    {
        $this->selectedLevel = $id;
    }

    public function destroy()
    {
        try {
            $level = Level::findOrFail($this->selectedLevel);
            $level->delete();
            $this->reset(['selectedLevel']);
            $this->dispatch('sweet-alert', icon: 'success', title: 'Level deleted');
        } catch (\Throwable $e) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'Error while deleting');
        }
    }

    public function updatingSearch()
    {
        $this->reset(['name', 'desc', 'selectedLevel']);
    }

    public function resetProperty()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.levels.level-management', [
            "levels" => Level::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('desc', 'like', '%' . $this->search . '%')
                ->orderBy('name')->paginate(9),
        ]);
    }

    public function rendered()
    {
        // menjalankan modal perlu menggunakan modal init ini.
        $this->dispatch('all:init');
    }
}
