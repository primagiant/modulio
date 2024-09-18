<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class UserManagement extends Component
{
    use WithPagination;

    public $roleName = ['Admin', 'Pengajar', 'Siswa'];

    public $search;

    public $selectedUserId;

    #[Validate('required')]
    public $name = '';

    #[Validate('required|email|unique:users')]
    public $email = '';

    #[Validate('required')]
    public $role = 2;

    public function saveUser()
    {
        $this->validate();
        try {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'role' => $this->role,
                'password' => bcrypt('password'),
            ]);
            $this->reset(['name', 'email', 'role']);
            $this->dispatch('close-modal', modalId: 'createUserModal');
            $this->dispatch('sweet-alert', icon: 'success', title: 'User created');
        } catch (\Throwable $e) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'Error craete user');
        }
    }

    public function editUser(int $userId)
    {
        $user = User::find($userId);
        $this->selectedUserId = $userId;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
    }

    public function updateUser()
    {
        $this->validate();
        try {
            $user = User::find($this->selectedUserId);
            $user->name = $this->name;
            $user->email = $this->email;
            $user->role = $this->role;
            $user->save();

            $this->reset(['name', 'email', 'role', 'selectedUserId']);
            $this->dispatch('close-modal', modalId: 'editUserModal');
            $this->dispatch('sweet-alert', icon: 'success', title: 'User updated');
        } catch (\Throwable $e) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'Error updating user');
        }
    }

    public function deleteUser(int $userId)
    {
        $this->selectedUserId = $userId;
    }

    public function destroyUser()
    {
        try {
            $user = User::findOrFail($this->selectedUserId);
            $user->delete();
            $this->reset(['selectedUserId']);
            $this->dispatch('sweet-alert', icon: 'success', title: 'User deleted');
        } catch (\Throwable $e) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'Error deleting user');
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetProperty()
    {
        $this->reset(['name', 'email', 'role', 'selectedUserId']);
    }

    public function render()
    {
        return view('livewire.admin.users.user-management', [
            "users" => User::where('id', '!=', Auth::user()->id)
                ->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%');
                })
                ->paginate(9),
        ]);
    }

    public function rendered()
    {
        // menjalankan modal perlu menggunakan modal init ini.
        $this->dispatch('all:init');
    }
}
