@extends('backend.layouts.instructor.app')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="row pt-4">
            <div class="col-sm-12">
                <!--START - Recent Ticket Comments-->
                <div class="element-wrapper">
                    <div class="">
                        <h3 class="element-header">
                           School List
                        </h3>
                        <a class="btn btn-primary" href="{{ route('instructor.create.school')}}"><i class="os-icon os-icon-plus-circle"></i><span>Add School</span></a>
                    </div>
                    <div class="element-box-tp mt-5">
                        <div class="table-responsive">
                            <table class="table table-padded">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>School Name</th>
                                        <th>School Address</th>
                                        <th>School Email</th>
                                        <th>Director's Name</th>
                                        <th>Director's Contact</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($schools as $school)
                                        <tr class="" style="font-size: 10pt">
                                            <td class="text-center">
                                                <input class="form-control" type="checkbox">
                                            </td>
                                            <td>
                                                <div class="user-with-avatar" style="width: 15%">
                                                    <span>{{ $school->school_name }}</span>
                                                </div>
                                            </td>
                                            <td  style="width: 35%">
                                                <div class="smaller lighter">
                                                    {{ $school->school_address }}
                                                </div>
                                            </td>
                                            <td style="width: 5%">
                                                {{ $school->school_email }}
                                            </td>
                                            <td class="" style="width: 15%">
                                                {{ $school->director_name }}
                                            </td>
                                            <td class="nowrap" style="width:5%">
                                                {{ $school->director_contact }}
                                            </td>
                                            <td class="row-actions">
                                                <a href="{{ route('instructor.edit.school', $school) }}"><i class="os-icon os-icon-edit-1"></i></a>
                                                <a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="text-center">
                                            <img src="{{ asset('assets/img/no-data.png') }}" alt="" height="300">
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--END - Recent Ticket Comments-->
            </div>
        </div>
    </div>
</div>
@endsection
