@extends('backend.layouts.instructor.app')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row pt-4">
            <div class="col-sm-12">
                <div class="element-wrapper">
                    <div class="">
                        <h3 class="element-header">
                           Add School
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="element-wrapper">
                    <div class="element-box">
                        <form action="{{ route('instructor.store.school') }}" method="POST">
                            @csrf
                            <h5 class="form-header text-primary">
                                Fill in School Information
                            </h5>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="school_name"> School Name</label>
                                        <input class="form-control" placeholder="School Name" id="school_name" name="school_name" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="school_email">School Email Address</label>
                                        <input class="form-control" id="school_email" name="school_email" placeholder="School Email Address" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="director_name">School Director's Name</label>
                                        <input class="form-control" placeholder="School Director's Name" type="text" name="director_name" id="director_name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="director_contact">School Director's Contact</label>
                                        <input class="form-control" name="director_contact" id="director_contact" placeholder="School Director's Contact" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="school_address">School Address</label>
                                <input class="form-control" name="school_address" id="school_address" placeholder="School Address" type="text">
                            </div>

                            <div class="form-buttons-w">
                                <button class="btn btn-primary" type="submit"> Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection