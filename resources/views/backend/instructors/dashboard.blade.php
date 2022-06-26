@extends('backend.layouts.instructor.app')
@section('content')
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <div class="user-profile">
                <div class="up-head-w" style="background-image:url('{{ asset('/assets/img/back.jpg') }}')">
                    <div class="up-main-info pt-4">
                        
                        <h1 class="up-header pt-5">
                           {{ ucfirst(auth()->user()->first_name) ?? '' }} {{ ucfirst(auth()->user()->last_name) ?? ''}}
                        </h1>

                        <h5 class="up-sub-header col-md-6">
                           {{ ucfirst(auth()->user()->role) ?? '' }} at  
                        </h5>
                    </div>
                    <svg class="decor" width="842px" height="219px" viewBox="0 0 842 219"
                        preserveAspectRatio="xMaxYMax meet" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g transform="translate(-381.000000, -362.000000)" fill="#FFFFFF">
                            <path class="decor-path"
                                d="M1223,362 L1223,581 L381,581 C868.912802,575.666667 1149.57947,502.666667 1223,362 Z">
                            </path>
                        </g>
                    </svg>
                </div>
                <div class="up-controls">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="value-pair">
                                <div class="label">
                                    Status:
                                </div>
                                <div class="value badge badge-pill badge-success">
                                    Online
                                </div>
                            </div>
                            <div class="value-pair">
                                <div class="label">
                                    Member Since:
                                </div>
                                <div class="value">
                                    {{ auth()->user()->created_at->toFormattedDateString() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="up-contents">
                    <h5 class="element-header">
                        Overview
                    </h5>
                    <div class="row m-b">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-sm-6 b-r b-b">
                                    <div class="el-tablo centered padded">
                                        <div class="value">
                                           {{ number_format($students) }}
                                        </div>
                                        <div class="label">
                                           Total Students
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 b-b b-r">
                                    <div class="el-tablo centered padded">
                                        <div class="value">
                                            {{ number_format($registeredStudents) }}
                                        </div>
                                        <div class="label">
                                            Registered Students
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 b-r">
                                    <div class="el-tablo centered padded">
                                        <div class="value">
                                            {{ $reports }}
                                        </div>
                                        <div class="label">
                                            Total Reports
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 b-r">
                                    <div class="el-tablo centered padded">
                                        <div class="value">
                                           {{ number_format($takenExams) }}
                                        </div>
                                        <div class="label">
                                            Exams Taken
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="padded">
                                <div class="element-info-with-icon smaller">
                                    <div class="element-info-icon">
                                        <div class="os-icon os-icon-bar-chart-stats-up"></div>
                                    </div>
                                    <div class="element-info-text">
                                        <h5 class="element-inner-header">
                                            Monthly Revenue
                                        </h5>
                                        <div class="element-inner-desc">
                                            Calculated every month
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                  <h1 class="pl-5"> N0.00</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection