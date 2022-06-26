<?php

use App\Models\Instructor\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return inertia('Admin/dashboard');
});

Route::get('/exams', 'ExamController@index');
Route::post('/create/exam', 'ExamController@create');
Route::post('/publish/exam', 'ExamController@publish');

Route::get('/classes', 'GradeController@index');
Route::post('/create/class', 'GradeController@create');
Route::post('/class/assign-exam', 'GradeController@assignExam');
Route::post('/class/unassign-exam', 'GradeController@unassignExam');

Route::get('/courses', 'CourseController@index');
Route::post('/create/course', 'CourseController@create');


Route::get('/create/question/{exam:exam_code}', 'QuestionController@index');
Route::get('/create/question-bank/{exam:exam_code}', 'QuestionController@questionBank');
Route::post('/create/question', 'QuestionController@create');
Route::get('/edit/question/{question}', 'QuestionController@edit');
Route::post('/delete/question', 'QuestionController@delete');
Route::post('/add/question', 'QuestionController@addQuestion');

Route::view('/reports', 'backend.admin.reports.index');


Route::get('/officials/login', 'LoginController@index');
Route::post('/officials/login', 'LoginController@authenticate')->name('login');

Route::get('/instructor/register', 'InstructorRegisterController@index');
Route::post('/instructor/register', 'InstructorRegisterController@register')->name('register');



Route::get('/login/cbt', 'ExaminationController@index')->name('student.index.cbt');
Route::post('/cbt', 'ExaminationController@login')->name('student.login.cbt');
Route::post('/cbt/{exam:uuid}/{student}', 'ExaminationController@startExam')->name('student.start.cbt');
Route::get('/cbt/{examination:uuid}', 'ExaminationController@examination')->name('student.examination');

Route::get('/cbt/congratulations/{examination}', 'ExaminationController@complete')->name('student.complete.cbt');

Route::get('/timeup/cbt', 'ExaminationController@timeup')->name('student.timeup.cbt');

Route::get('/student/dashboard', 'Student\StudentDashboardController@index')->name('student.index.dashbboard');

Route::get('/login/student', 'Student\StudentLoginController@index')->name('student.index.login');
Route::post('/login/student', 'Student\StudentLoginController@login')->name('student.login');
Route::post('/logout/student', 'Student\StudentLoginController@logout')->name('student.logout');

Route::get('/logouts', function () {
    Auth::logout();
});


require __DIR__ . '/instructor.php';