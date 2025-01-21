
<?php
use Illuminate\Support\Facades\Route;



Route::get('/admin/attendance/clock_in', [App\Http\Controllers\AttendanceController::class, 'clock_in'])
    ->name('clock_in');
    
Route::get('/admin/attendance/clock_out', [App\Http\Controllers\AttendanceController::class, 'clock_out'])
->name('clock_out');
Route::get('/admin/attendance', [App\Http\Controllers\AttendanceController::class, 'show'])
->name('show');
Route::get('/admin/searchAttendance', [App\Http\Controllers\AttendanceController::class, 'searchAttendance'])
->name('searchAttendance');




