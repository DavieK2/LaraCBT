@extends('backend.layouts.instructor.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-12 element-wrapper pb-3">
                    <h3 class="element-header">
                       {{ $class->class_name }}
                    </h3>
                </div>
            </div>
            <!--START - To Do Application-->
            <div class="todo-app-w" style="display: block">
                @livewire('class-show-view', ['class' => $class])
            </div>
        </div>
    </div>
</div>
@endsection