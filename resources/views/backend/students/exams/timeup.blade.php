@extends('backend.layouts.student.app')
@section('content')
<div class="mdk-box bg-dark mdk-box--bg-gradient-primary js-mdk-box mb-0 pt-5 pb-5" data-effects="blend-background">
    <div class="mdk-box__content pt-5 pb-5" style="background-image:url('{{ asset('/assets/img/background.png') }}')">
        <div class="py-64pt text-center text-sm-left pt-5 pb-5">
            <div class="container d-flex flex-column justify-content-center align-items-center pt-5 pb-5">
                <h1 class="text-white mb-24pt">Sorry Time's Up</h1>
                <p class="lead text-white-50 measure-lead-max mb-1">Your Exam has been submitted.</p>
                <p class="lead text-white-50 measure-lead-max mb-5">Your results will be posted to your Student Dashboard.</p>
                <a href="{{ route('student.index.cbt')}}" class="btn btn-outline-white">Sign Out</a>
            </div>
        </div>
    </div>
</div>
@endsection