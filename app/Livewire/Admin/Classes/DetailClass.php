<?php

namespace App\Livewire\Admin\Classes;

use App\Models\User;
use App\Models\Classes;
use Livewire\Component;
use Livewire\WithPagination;

class DetailClass extends Component
{
    use WithPagination;

    public $classId;

    public $searchStudent = "";
    public $searchOutsideTeacher = "";
    public $searchOutsideStudent = "";

    public function addUserToClass($userId)
    {
        try {
            Classes::findOrFail($this->classId)->addUserToClass($userId);
            $this->dispatch('sweet-alert', icon: 'success', title: 'User created');
            $this->resetPage(pageName: 'outside_student');
            $this->resetPage(pageName: 'outside_teacher');
        } catch (\Throwable $e) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'Error create user');
        }
    }

    public function removeUserFromClass($userId)
    {
        try {
            Classes::findOrFail($this->classId)->removeUserFromClass($userId);
            $this->dispatch('sweet-alert', icon: 'success', title: 'User removed');
            $this->resetPage(pageName: 'student');
            $this->resetPage(pageName: 'teacher');
        } catch (\Throwable $e) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'Error remove user');
        }
    }

    public function render()
    {
        $statusName = ["Non Aktif", "Aktif"];
        $smtName = ["Ganjil", "Genap"];

        $classDetail = Classes::find($this->classId);
        $inClassStudents = User::inClass(2, $this->classId)
            ->where(function ($q) {
                $q->where('name', 'like', '%' . $this->searchStudent . '%')
                    ->orWhere('email', 'like', '%' . $this->searchStudent . '%')
                    ->orWhere('identity', 'like', '%' . $this->searchStudent . '%');
            })->paginate(7, pageName: 'student');

        $inClassTeachers = User::inClass(1, $this->classId)->paginate(3, pageName: 'teacher');

        $notInClassStudents = User::notInClass(2, $this->classId)
            ->where(function ($q) {
                $q->where('name', 'like', '%' . $this->searchOutsideStudent . '%')
                    ->orWhere('email', 'like', '%' . $this->searchOutsideStudent . '%')
                    ->orWhere('identity', 'like', '%' . $this->searchOutsideStudent . '%');
            })->paginate(5, pageName: 'outside_student');

        $notInClassTeachers = User::notInClass(1, $this->classId)
            ->where(function ($q) {
                $q->where('name', 'like', '%' . $this->searchOutsideTeacher . '%')
                    ->orWhere('email', 'like', '%' . $this->searchOutsideTeacher . '%')
                    ->orWhere('identity', 'like', '%' . $this->searchOutsideTeacher . '%');
            })->paginate(5, pageName: 'outside_teacher');

        return view('livewire.admin.classes.detail-class', [
            "status" => $statusName,
            "smt" => $smtName,
            "detail" => $classDetail,
            "students" => $inClassStudents,
            "teachers" => $inClassTeachers,
            "outsideStudents" => $notInClassStudents,
            "outsideTeachers" => $notInClassTeachers,
        ]);
    }

    public function updatingSearch()
    {
        // reset to page 1 on searching
        $this->resetPage();
    }

    public function rendered()
    {
        // menjalankan modal perlu menggunakan modal init ini.
        $this->dispatch('all:init');
    }
}
