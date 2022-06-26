<?php

use Illuminate\Support\Facades\Route;



Route::group(['middleware' => ['auth'], 'namespace' => 'Instructor'], function () {

    Route::get('/instructor/dashboard', 'DashboardController@index')->name('instructor.index.dashboard');
    Route::get('/instructor/reports', 'ReportController@index')->name('instructor.index.report');
    Route::get('/instructor/reports/create', 'ReportController@create')->name('instructor.create.report');
    Route::post('/instructor/reports/create', 'ReportController@store')->name('instructor.store.report');
    Route::get('/instructor/reports/create/{report:uuid}', 'ReportController@report')->name('instructor.report.report');
    Route::get('/instructor/reports/{report:uuid}/edit', 'ReportController@edit')->name('instructor.edit.report');
    Route::get('/instructor/report/show/{report:uuid}', 'ReportController@show')->name('instructor.show.report');
    Route::post('/instructor/report/complete/{report}', 'ReportController@complete')->name('instructor.complete.report');
    
    Route::get('/instructor/school', 'SchoolController@index')->name('instructor.index.school');
    Route::get('/instructor/school/create', 'SchoolController@create')->name('instructor.create.school');
    Route::post('/instructor/school/create', 'SchoolController@store')->name('instructor.store.school');
    Route::get('/instructor/school/{school:uuid}/edit', 'SchoolController@edit')->name('instructor.edit.school');
    Route::post('/instructor/school/{school:uuid}/edit', 'SchoolController@update')->name('instructor.update.school');
    
    Route::get('/instructor/class', 'GradeController@index')->name('instructor.index.class');
    Route::get('/instructor/class/create', 'GradeController@create')->name('instructor.create.class');
    Route::post('/instructor/class/create', 'GradeController@store')->name('instructor.store.class');
    Route::get('/instructor/class/show/{class:uuid}', 'GradeController@show')->name('instructor.show.class');
    Route::get('/instructor/student/create/{class:uuid}', 'StudentController@create')->name('instructor.create.student');
    
    Route::get('/instructor/exams', 'ExamController@index')->name('instructor.index.exam');
    Route::get('/instructor/exams/create', 'ExamController@create')->name('instructor.create.exam');
    Route::post('/instructor/exams/create', 'ExamController@store')->name('instructor.store.exam');
    Route::get('/instructor/exams/show/{exam:uuid}', 'ExamController@show')->name('instructor.show.exam');
    Route::get('/instructor/exams/{exam:uuid}/edit', 'ExamController@edit')->name('instructor.edit.exam');
    
    Route::get('/instructor/questions/create/{exam:uuid}', 'QuestionController@index')->name('instructor.create.question');
    Route::get('/instructor/download/excel/', 'QuestionController@download')->name('instructor.download.excel');
    Route::post('/instructor/upload/excel/', 'QuestionController@upload')->name('instructor.upload.excel');
    
    Route::get('instructor/exam/results', 'InstructorExamResultsController@index')->name('instructor.index.results');
    Route::get('instructor/results/show/{student:uuid}/{examination}', 'InstructorExamResultsController@show')->name('instructor.show.results');
    
    Route::post('/instructor/logout', 'LoginController@logout')->name('instructor.logout');
});