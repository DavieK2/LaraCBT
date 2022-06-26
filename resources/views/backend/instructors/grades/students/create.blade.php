@extends('backend.layouts.instructor.app')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-12 element-wrapper">
                <h3 class="element-header">
                    Register Students
                </h3>
            </div>
        </div>
        <div class="row">
            @livewire('instructor.grades.add-student', ['class' => $class])
            @livewire('instructor.grades.student-list', ['class' => $class])
        </div>
    </div>
</div>

@endsection