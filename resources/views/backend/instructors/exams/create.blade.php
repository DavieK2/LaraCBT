@extends('backend.layouts.instructor.app')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-12 element-wrapper">
                <h3 class="element-header">
                    Create Exam
                </h3>
            </div>
        </div>
        <div class=" todo-app-w">
            <div class="row pt-2">
                @livewire('instructor.exam.create')
                @livewire('exam-classes')
            </div>
        </div>
    </div>
    @endsection