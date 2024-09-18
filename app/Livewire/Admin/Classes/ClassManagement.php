<?php

namespace App\Livewire\Admin\Classes;

use App\Models\Classes;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;

class ClassManagement extends Component
{
    use WithPagination;

    public $search;

    public $selectedClass;

    #[Validate('required')]
    public $name = '';

    #[Validate('required')]
    public $smt = 0;

    #[Validate('required|numeric')]
    public $year;

    #[Validate('required')]
    public $status = 1;

    public function save()
    {
        $this->validate();
        try {
            Classes::create([
                'class_name' => $this->name,
                'smt' => $this->smt,
                'year' => $this->year,
                'status' => $this->status,
            ]);
            $this->reset(['name', 'status']);
            $this->dispatch('close-modal', modalId: 'createModal');
            $this->dispatch('sweet-alert', icon: 'success', title: 'Class created');
        } catch (\Throwable $e) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'Error while craete');
        }
    }

    public function edit(int $id)
    {
        $class = Classes::find($id);
        $this->selectedClass = $id;
        $this->name = $class->class_name;
        $this->year = $class->year;
        $this->smt = $class->smt;
        $this->status = $class->status;
    }

    public function update()
    {
        $this->validate();
        try {
            $class = Classes::find($this->selectedClass);
            $class->class_name = $this->name;
            $class->year = $this->year;
            $class->smt = $this->smt;
            $class->status = $this->status;
            $class->save();

            $this->reset(['name', 'status', 'selectedClass']);
            $this->dispatch('close-modal', modalId: 'editModal');
            $this->dispatch('sweet-alert', icon: 'success', title: 'Classes updated');
        } catch (\Throwable $e) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'Error while updating');
        }
    }

    public function delete(int $id)
    {
        $this->selectedClass = $id;
    }

    public function destroy()
    {
        try {
            $class = Classes::findOrFail($this->selectedClass);
            $class->delete();
            $this->reset(['selectedClass']);
            $this->dispatch('sweet-alert', icon: 'success', title: 'Class deleted');
        } catch (\Throwable $e) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'Error while deleting');
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetProperty()
    {
        $this->reset(['name', 'status', 'selectedClass']);
    }

    public function render()
    {
        return view('livewire.admin.classes.class-management', [
            "classes" => Classes::orderBy('class_name')
                ->orderBy('year')
                ->where('class_name', 'like', '%' . $this->search . '%')
                ->paginate(9),
            "className" => ['Non-Aktif', 'Aktif'],
            "smtName" => ['Ganjil', 'Genap']
        ]);
    }

    public function mount()
    {
        $this->year = date('Y');
    }

    public function rendered()
    {
        // menjalankan modal perlu menggunakan modal init ini.
        $this->dispatch('all:init');
    }
}
