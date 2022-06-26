@extends('backend.layouts.instructor.app')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row pt-4">
            <div class="col-sm-12">
                <!--START - Recent Ticket Comments-->
                <div class="element-wrapper">
                    <h3 class="element-header">
                        Exam List
                    </h3>
                    <a class="btn btn-primary" href="{{ route('instructor.create.exam') }}">
                        <i class="os-icon os-icon-plus-circle"></i><span>Create Exam</span>
                    </a>
                    <a class="btn btn-success" data-toggle="modal" data-target="#excel" href="#">
                        <i class="os-icon os-icon-plus-circle"></i><span>Upload Questions From Excel</span>
                    </a>
                    <div class="element-box-tp">
                        @livewire('exam-index')
                    </div>
                </div>
                <!--END - Recent Ticket Comments-->
            </div>
        </div>
    </div>
</div>
<div aria-hidden="true" aria-labelledby="mySmallModalLabel" id="excel" class="modal fade bd-example-modal-sm" role="dialog"
    tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data" action="{{ route('instructor.upload.excel') }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Upload Questions
                    </h5>
                </div>
                <div class="modal-body">
                
                    @csrf
                    <div class="form-group">
                        <label for="">Select Excel File</label>
                        <input class="form-control" placeholder="Excel File" type="file" name="excel">
                    </div>
                    <a href="{{ route('instructor.download.excel') }}" >Please download file format for upload</a>
                
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button>
                    <button class="btn btn-primary" type="submit">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection