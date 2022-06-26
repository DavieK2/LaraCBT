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
        <div class="row pt-2">
            <div class="col-md-6">
                <div class="element-wrapper">
                    <div class="element-box">
                        <form action="{{ route('instructor.store.report') }}" method="POST">
                            @csrf
                            <h6 class="form-header text-primary">
                                Start Weekly Report
                            </h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for=""> Select Week</label>
                                        <select class="form-control" name="week">
                                           
                                            @for ($i = 1; $i <= 20; $i++)
                                            <option>Week {{ $i }}</option>
                                            @endfor
                                            
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for=""> Select School</label>
                                        <select class="form-control" name="school_id">
                                            @foreach ($schools as $school)
                                                <option value="{{ $school->id }}">{{ $school->school_name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-buttons-w">
                                <button class="btn btn-primary btn-block" type="submit">Start Weekly Report</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection