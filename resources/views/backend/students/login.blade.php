@extends('backend.layouts.student.app')
@section('content')

<div class="row text-center px-0 mx-0">
    <div class="col-12 px-0 justify-center">
        <div class="bg-gradient-primary" >
            <div class=" py-5 text-center" style="background-image:url('{{ asset('/assets/img/background.png') }}')">
                <img src="{{ asset('student/assets/images/illustration/student/128/white.svg') }}" class="" alt="student">
                <div class="flex mb-32pt mb-md-0 pt-2">
                    <h1 class="text-white mb-0">Login</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-white pt-32pt pt-sm-64pt pb-32pt pb-5">
    <div class="container page__container pb-5">
        <form action="{{ route('student.login') }}" class="col-md-5 p-0 mx-auto" method="POST">
            @csrf
            <div class="form-group text-center text-uppercase">
                <label for="school_code">Enter Last Name</label>
                <input id="school_code" name="last_name" type="text" class="form-control text-center" autocomplete="off" placeholder="Enter Your Last Name ...">
            </div>
            <div class="form-group text-center text-uppercase">
                <label for="exam_code">Enter School Code</label>
                <input id="exam_code" name="school_code" type="text" class="form-control text-center" autocomplete="off" placeholder="Enter Your School Code ...">
            </div>
            <div class="text-cente pt-3">
                <button class="btn btn-lg btn-block btn-accent" type="submit">Proceed</button>
            </div>
        </form>
    </div>
</div>

@endsection