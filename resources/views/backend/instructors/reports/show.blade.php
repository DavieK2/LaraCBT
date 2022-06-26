@extends('backend.layouts.instructor.app')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="full-chat-w">
            <div class="full-chat-i">
                @livewire('reports.report-list', ['report' => $report])

                @livewire('reports.report-details', ['report' => $report])
            </div>
        </div>
    </div>
</div>
        <!----
@endsection