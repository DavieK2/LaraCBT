@extends('backend.layouts.student.app')
@section('content')
<div class="mdk-header-layout__content page-content ">
    @livewire('exam-timer', ['examination' => $examination])
    @livewire('examination',  ['examination' => $examination])
</div>
@endsection