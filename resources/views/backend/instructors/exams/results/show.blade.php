@extends('backend.layouts.instructor.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-12 element-wrapper">
                    <h3 class="element-header">
                      Student's Name: {{ $student->first_name. ' ' .$student->last_name }}
                    </h3>
                </div>
            </div>
            <!--START - To Do Application-->
            <div class="todo-app-w" style="display: block">
                @livewire('exam-result-show', ['examination' => $examination, 'student' => $student, 'totalQuestions' => $totalQuestions])
            </div>
        </div>
    </div>
</div>
@endsection