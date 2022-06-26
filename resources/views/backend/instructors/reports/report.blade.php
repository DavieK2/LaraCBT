@extends('backend.layouts.instructor.app')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-12 element-wrapper">
                <h3 class="element-header">
                   Weekly Report
                </h3>
            </div>
        </div>
        <div class="row">
            @livewire('reports.create-report', ['report' => $report])
            @livewire('reports.report-card', ['report' => $report])
        </div>
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="aec-reply">
                    <div class="reply-header mb-3">
                        <h5>
                            Report and Remarks
                        </h5>
                    </div>
                    <form action="{{ route('instructor.complete.report', $report->id) }}" method="post">
                        @csrf
                        <textarea cols="70" id="ckeditorEmail" name="ckeditor1" rows="5"></textarea>
                        <div class="pt-4">
                            <div class="actions-right">
                                <button class="btn btn-success py-2" type="submit"><i class="os-icon os-icon-mail-18"></i><span>Complete Report</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('style')
<style>
    .scrollbar-primary::-webkit-scrollbar {
        width: 8px;
        height: 5px;

        background-color: #020da729;
    }

    .scrollbar-primary::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
        background-color: #1e62eb;
    }
</style>
@endsection