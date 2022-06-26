@extends('backend.layouts.instructor.app')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-12 element-wrapper">
                <h3 class="element-header">
                   Create New Class
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 pr-4">
                <div class="element-wrapper">
                    <div class="element-box">
                        <form action="{{ route('instructor.store.class') }}" method="POST">
                            @csrf
                            <h5 class="form-header text-primary">
                                Create Class
                            </h5>
                            <hr>
                            <div class="form-group">
                                <label for="">Please Select School</label>
                                <select class="form-control" name="school_id" id="school_id">
                                    @foreach ($schools as $school)
                                    <option value="{{ $school->id }}">{{ $school->school_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Class Name</label>
                                <input class="form-control" placeholder="Enter Class Name" type="text" name="class_name" id="class_name">
                            </div>

                            <div class="form-buttons-w">
                                <button class="btn btn-success" type="submit">Proceed</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection