@extends('backend.layouts.instructor.app')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row pt-4">
            <div class="col-sm-12">
                <!--START - Recent Ticket Comments-->
                <div class="element-wrapper">
                    <h3 class="element-header">
                        Exam Results
                    </h3>
                    <div class="element-box-tp">
                        @livewire('exam-results')
                    </div>
                </div>
                <!--END - Recent Ticket Comments-->
            </div>
        </div>
    </div>
</div>
@endsection