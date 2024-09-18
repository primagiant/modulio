<?php

use App\Models\Classes;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Admin\UserManagement;
use App\Livewire\Admin\LevelManagement;
use App\Livewire\Student\StudentClassList;
use App\Livewire\Student\StudentDashboard;
use App\Livewire\Teacher\Module\AddModule;
use App\Livewire\Teacher\TeacherDashboard;
use App\Livewire\Admin\Classes\DetailClass;
use App\Livewire\Teacher\Module\EditModule;
use App\Http\Controllers\TailwickController;
use App\Livewire\Admin\Classes\ClassManagement;
use App\Livewire\Student\StudentModuleRunning;
use App\Livewire\Teacher\Module\TeacherListModule;
use App\Livewire\Teacher\Module\QuestionManagement;
use App\Livewire\Teacher\Module\TeacherDetailModule;
use App\Livewire\Teacher\Module\TeacherStudentModule;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('index/{locale}', [TailwickController::class, 'lang']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/', function () {
        if (auth()->user()->role == 0) {
            return to_route('a.dashboard');
        }

        if (auth()->user()->role == 1) {
            return to_route('t.dashboard');
        }

        if (auth()->user()->role == 2) {
            return to_route('s.dashboard');
        }

        abort(403);
    })->name("dashboard");

    // Admin
    Route::middleware(['role:admin'])
        ->group(function () {
            // Dashboard
            Route::get('/admin-dashboard', AdminDashboard::class)
                ->name('a.dashboard');

            // User CRUD
            Route::get('user-management', UserManagement::class)
                ->name('users.index');

            // Level CRUD
            Route::get('level-management', LevelManagement::class)
                ->name('levels.index');

            // Manage Kelas (Termasuk memasukkan teacher dan student ke kelas)
            Route::get('class-management', ClassManagement::class)
                ->name('classes.index');
            Route::get('class-management/manage/{classId}', DetailClass::class)
                ->name('classes.manage');
        });

    // Teacher
    Route::middleware(['role:teacher'])
        ->group(function () {
            // Dashboard
            Route::get('/teacher-dashboard', TeacherDashboard::class)
                ->name('t.dashboard');

            // Manage Class
            Route::get('t-class/{classId}', TeacherListModule::class)
                ->name('teacher.class.index');

            // Add Module
            Route::get('t-new-module/{classId}', AddModule::class)
                ->name('teacher.add.module');

            // Edit Module
            Route::get('t-edit-module/{classId}/{moduleId}', EditModule::class)
                ->name('teacher.edit.module');

            // Detail and Manage Module (Update and See List Student)
            Route::get('t-module/{classId}/{moduleId}', TeacherDetailModule::class)
                ->name('teacher.module.index');

            // Module Question Management
            Route::get('t-module-question-management/{classId}/{moduleId}', QuestionManagement::class)
                ->name('teacher.module.question');

            // Detail Student Module (Comment and Add Score)
            Route::get('t-module/{moduleId}/{studentId}', TeacherStudentModule::class)
                ->name('teacher.student.module');
        });

    // Student
    Route::middleware(['role:student'])
        ->group(function () {
            // Dashboard
            Route::get('student-dashboard', StudentDashboard::class)
                ->name('s.dashboard');

            // // Manage Class Module (Pick Module)
            Route::get('student-class/{classId}', StudentClassList::class)
                ->can('accessClass', [Classes::class, 'classId'])
                ->name('student.class.index');

            // Module Running
            Route::get('student-module/{classId}/{userModuleId}/', StudentModuleRunning::class)
                ->name('student.module.index');
        });
});
