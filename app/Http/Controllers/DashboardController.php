<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 0) {
            return view('pages.admin.dashboard');
        }

        if (auth()->user()->role == 1) {
            return view('pages.teacher.dashboard');
        }

        if (auth()->user()->role == 2) {
            return view('pages.student.dashboard');
        }

        abort(403); // Optional: handle unauthorized access
    }
}
