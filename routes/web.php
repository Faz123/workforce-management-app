<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\SettingsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('home');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/holiday', function () {
    return view('holiday');
})->name('holiday');

//Schedule routes
Route::middleware(['auth:sanctum', 'verified'])->get('/schedule', [ScheduleController::class, 'index'])->name('schedule');

Route::middleware(['auth:sanctum', 'verified'])->get('/view-weekly-rota', [ScheduleController::class, 'viewWeekly'])->name('view-weekly-rota');

Route::middleware(['auth:sanctum', 'verified'])->get('/generate-timesheets', [ScheduleController::class, 'generate'])->name('generate-timesheets');

//Staff routes
Route::middleware(['auth:sanctum', 'verified'])->get('/add-staff', [StaffController::class, 'index'])->name('add-staff');

Route::middleware(['auth:sanctum', 'verified'])->get('/manage-staff', [StaffController::class, 'manage'])->name('manage-staff');

Route::middleware(['auth:sanctum', 'verified'])->get('/manage-staff/{user}/edit', [StaffController::class, 'edit'])->name('edit-staff');

Route::middleware(['auth:sanctum', 'verified'])->post('/create-staff', [StaffController::class, 'store'])->name('save-new-staff');

Route::middleware(['auth:sanctum', 'verified'])->post('/manage-staff/{user}/update-staff', [StaffController::class, 'update'])->name('update-staff');

Route::middleware(['auth:sanctum', 'verified'])->get('/manage-staff/{user}/shifts', [StaffController::class, 'shifts'])->name('update-staff-shifts');

Route::middleware(['auth:sanctum', 'verified'])->post('/manage-staff/{user}/update-shifts', [StaffController::class, 'updateShifts'])->name('save-new-shifts');

Route::middleware(['auth:sanctum', 'verified'])->get('/manage-staff/{user}/delete', [StaffController::class, 'delete'])->name('delete-staff-member');




//Holiday routes
Route::middleware(['auth:sanctum', 'verified'])->get('/who-is-off-this-week', [HolidayController::class, 'whoIsOff'])->name('who-is-off-this-week');

//Settings routes
Route::middleware(['auth:sanctum', 'verified'])->get('/settings', [SettingsController::class, 'index'])->name('settings');




require_once __DIR__ . '/jetstream.php';