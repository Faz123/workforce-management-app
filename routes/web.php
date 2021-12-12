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

Route::middleware(['auth:sanctum', 'verified'])->get('/home', [ScheduleController::class, 'home'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/holiday', function () {
    return view('holiday');
})->name('holiday');

//Schedule routes
Route::middleware(['auth:sanctum', 'verified'])->get('/schedule', [ScheduleController::class, 'index'])->name('schedule');

Route::middleware(['auth:sanctum', 'verified'])->get('/schedule/export/{date}', [ScheduleController::class, 'exportSchedule'])->name('export-schedule');

Route::middleware(['auth:sanctum', 'verified'])->get('/edit-schedule', [ScheduleController::class, 'edit'])->name('edit-schedule');

Route::middleware(['auth:sanctum', 'verified'])->get('/schedule/edit-rota/{date}', [ScheduleController::class, 'editUserShifts'])->name('edit-user-schedule');

Route::middleware(['auth:sanctum', 'verified'])->post('/schedule/update-rota/{date}', [ScheduleController::class, 'updateRota'])->name('edit-user-schedule');

Route::middleware(['auth:sanctum', 'verified'])->get('/my-current-schedule', [ScheduleController::class, 'current'])->name('my-current-schedule');

Route::middleware(['auth:sanctum', 'verified'])->get('/view-weekly-rota', [ScheduleController::class, 'viewWeekly'])->name('view-weekly-rota');

Route::middleware(['auth:sanctum', 'verified'])->get('/generate-timesheets', [ScheduleController::class, 'generate'])->name('generate-timesheets');

Route::middleware(['auth:sanctum', 'verified'])->get('/schedule/create', [ScheduleController::class, 'create'])->name('view-create');

Route::middleware(['auth:sanctum', 'verified'])->post('/schedule/create-rota', [ScheduleController::class, 'store'])->name('store-rota');

Route::middleware(['auth:sanctum', 'verified'])->get('/schedule/create-available-shifts', [ScheduleController::class, 'createAvailableShifts'])->name('create-available-shifts');

Route::middleware(['auth:sanctum', 'verified'])->post('/schedule/add-available-shifts', [ScheduleController::class, 'addAvailableShifts'])->name('add-available-shifts');

Route::middleware(['auth:sanctum', 'verified'])->get('/schedule/claim-shift/{shift}', [ScheduleController::class, 'claimAvailableShift'])->name('claim-available-shift');

Route::middleware(['auth:sanctum', 'verified'])->post('/schedule/additional-shift/commit/{shift}', [ScheduleController::class, 'confirmShift'])->name('confirm-shift');

Route::middleware(['auth:sanctum', 'verified'])->get('/schedule/additional-shifts/agreed', [ScheduleController::class, 'agreedShifts'])->name('agreed-shifts');

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
Route::middleware(['auth:sanctum', 'verified'])->get('/holiday/who-is-off-this-week', [HolidayController::class, 'whoIsOff'])->name('who-is-off-this-week');

Route::middleware(['auth:sanctum', 'verified'])->get('/holiday/make-request', [HolidayController::class, 'makeHolidayRequest'])->name('request-holiday');

Route::middleware(['auth:sanctum', 'verified'])->post('/holiday/save-holiday-request', [HolidayController::class, 'saveHolidayRequest'])->name('save-holiday-request');

Route::middleware(['auth:sanctum', 'verified'])->get('holiday/requests', [HolidayController::class, 'viewRequests'])->name('holiday-requests');

Route::middleware(['auth:sanctum', 'verified'])->get('/holiday/my-details', [HolidayController::class, 'viewHolidayDetails'])->name('holiday-details');

Route::middleware(['auth:sanctum', 'verified'])->get('/holiday/manage-requests', [HolidayController::class, 'manageRequests'])->name('manage-requests');

Route::middleware(['auth:sanctum', 'verified'])->post('/holiday/update-request', [HolidayController::class, 'updateRequest'])->name('update-request');

//Settings routes
Route::middleware(['auth:sanctum', 'verified'])->get('/settings', [SettingsController::class, 'index'])->name('settings');

Route::middleware(['auth:sanctum', 'verified'])->post('/save-settings', [SettingsController::class, 'save'])->name('save-settings');




require_once __DIR__ . '/jetstream.php';
