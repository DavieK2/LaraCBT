@extends('backend.layouts.instructor.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-12 element-wrapper">
                    <h3 class="element-header">
                        Create Exam
                    </h3>
                </div>
            </div>
            <!--START - To Do Application-->
            <div class="todo-app-w" style="display: block">
                <!--END - To Do SIDEBAR-->
                <div class="row">
                    @livewire('show-question', ['questions' => $questions])
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection