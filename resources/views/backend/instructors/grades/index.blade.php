@extends('backend.layouts.instructor.app')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row pt-4">
            <div class="col-sm-12">
                <!--START - Recent Ticket Comments-->
                <div class="element-wrapper">
                    <div class="">
                        <h3 class="element-header">
                           Class List
                        </h3>
                        <a class="btn btn-primary" href="{{ route('instructor.create.class') }}"><i class="os-icon os-icon-plus-circle"></i><span>Add a Class</span></a>
                    </div>

                    @livewire('instructor.grades.index')
                    
                </div>
                <!--END - Recent Ticket Comments-->
            </div>
        </div>
    </div>
</div>
@endsection