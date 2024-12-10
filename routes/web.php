
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\CourseStudentController;
use App\Http\Controllers\SearchController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('students', StudentController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('courses', CourseController::class);
Route::resource('commissions', CommissionController::class);
Route::resource('professors', ProfessorController::class);
Route::resource('course_students', CourseStudentController::class);
Route::get('/search', [SearchController::class, 'search'])->name('search');


use App\Http\Controllers\ReportController;

Route::get('/report/students-enrolled', [ReportController::class, 'studentsEnrolled'])->name('reports.students_enrolled');
Route::get('/report/courses-by-subject', [ReportController::class, 'coursesBySubject'])->name('reports.courses_by_subject');
Route::get('/report/commissions-and-schedules', [ReportController::class, 'commissionsAndSchedules'])->name('reports.commissions_and_schedules');
Route::get('/report/professors-attendance', [ReportController::class, 'professorsAttendance'])->name('reports.professors_attendance');

Route::get('/report/{reportType}/export-excel', [ReportController::class, 'exportToExcel'])->name('report.export.excel');
Route::get('/report/{reportType}/export-pdf', [ReportController::class, 'exportToPDF'])->name('report.export.pdf');



