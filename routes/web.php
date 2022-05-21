<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Kelas;
use App\Models\Report;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;

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

    $studcount = Student::whereDate('created_at',  Carbon::today()->toDateString())->get()->count();
    $tcount = Teacher::whereDate('created_at', Carbon::today()->toDateString())->get()->count();
    $rcount = Report::whereDate('created_at', Carbon::today()->toDateString())->get()->count();
    $subcount = Subject::whereDate('created_at', Carbon::today()->toDateString())->get()->count();
    $ccount = Kelas::whereDate('created_at', Carbon::today()->toDateString())->get()->count();

    return view('dashboard.home',[
        'title' => 'iStudent | Home',
        'active' => 'dashboard',
        'studcount' => $studcount,
        'tcount' => $tcount,
        'rcount' => $rcount,
        'subcount' => $subcount,
        'ccount' => $ccount,
        'teachers' => Teacher::all(),
        'students' => Student::all(),
        'subjects'=> Subject::all(),
        'reports' => Report::all(),
        'class' => Kelas::all(),
    ]);
});

Route::get('/home', function () {
    return view('landingpage.index', [
        'title' => 'iStudent | Home',
        'active' => 'dashboard',
    ]);
});


Route::resource('/students', StudentController::class)->middleware('auth');
Route::resource('/teachers', TeacherController::class)->middleware('auth');
Route::resource('/classes', KelasController::class)->middleware('auth');
Route::resource('/subjects', SubjectController::class)->middleware('auth');
Route::resource('/reports', ReportController::class)->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', 'App\Http\Controllers\RegisterController@index');
Route::post('/register', 'App\Http\Controllers\RegisterController@store');
