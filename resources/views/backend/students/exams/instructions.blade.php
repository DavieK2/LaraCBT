@extends('backend.layouts.student.app')
@section('content')
    @livewire('student.exam-instructions', ['student' => $student, 'exam' => $exam])
@endsection