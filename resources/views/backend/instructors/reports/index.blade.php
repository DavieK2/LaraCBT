@extends('backend.layouts.instructor.app')
@section('content')
<div class="content-i">
    <div class="content-box " >
        <div class="row pt-4">
            <div class="col-sm-12">
                <!--START - Recent Ticket Comments-->
                <div class="element-wrapper">
                    <div class="">
                        <h3 class="element-header">
                            Latest Reports
                        </h3>
                        <a class="btn btn-primary" href="{{ route('instructor.create.report') }}"><i class="os-icon os-icon-plus-circle"></i><span>New Report</span></a>
                    </div>
                    @livewire('reports.report-index')
                </div>
                <!--END - Recent Ticket Comments-->
            </div>
        </div>
    </div>
</div>
@endsection