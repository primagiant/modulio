<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class AdminDashboard extends Component
{
    // use WithPagination;

    public function render()
    {
        return view('livewire.admin.admin-dashboard');
    }
}
