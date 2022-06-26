@extends('backend.layouts.student.app')
@section('content')
    <div class="bg-gradient-primary border-bottom-white py-32pt">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left" style="background-image:url('{{ asset('/assets/img/background.png') }}')">
            <img src="{{ asset('/student/assets/images/illustration/student/128/white.svg')}}" width="104" class="mr-md-32pt mb-32pt mb-md-0" alt="student">
            <div class="flex mb-32pt mb-md-0">
                <p class="lead text-white-50 mb-0 d-flex align-items-center">Welcome</p>
                <h2 class="text-white mb-0">{{ $student->first_name }} {{ $student->last_name }}</h2>
            </div>
            <a href="#logout" onclick="event.preventDefault(); document.getElementById('logout').submit(); " class="btn btn-outline-white">Sign Out</a>
        </div>
    </div>
    <form action="{{ route('student.logout') }}" method="POST" id="logout">@csrf</form>
    <div class="navbar navbar-expand-sm navbar-dark-white bg-gradient-primary p-sm-0 ">
        <div class="container page__container">
            <button class="navbar-toggler ml-n16pt" type="button" data-toggle="collapse" data-target="#navbar-submenu2">
                <span class="material-icons">people_outline</span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-submenu2">
                <div class="navbar-collapse__content pb-16pt pb-sm-0">
                    <ul class="nav navbar-nav">
                        <li class="nav-item active">
                            <a href="#results" class="nav-link">Results</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container page__container">
        <div class="page-section">
            <h4>My Results</h4>
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center" style="white-space: nowrap;">
                        <div class="col-lg-auto">
                            <form class="search-form search-form--light d-lg-inline-flex mb-8pt mb-lg-0" action="#">
                                <input type="text" class="form-control w-lg-auto" placeholder="Search Results">
                                <button class="btn" type="submit" role="button"><i class="material-icons">search</i></button>
                            </form>
                        </div>
                    </div>
                </div>

                @forelse ($results as $result)
                <div class="list-group list-group-flush">
                    <div class="list-group-item p-3">
                        <div class="row align-items-center">
                            <div class="col-md-3 mb-8pt mb-md-0">
                                <div class="media pl-3">
                                    <div class="media-body media-middle">
                                        <p class="text-muted m-0">Exam Code</p>
                                        <p class="m-0 text-body">{{ $result->examination->exam->exam_code }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-8pt mb-md-0">
                                <p class="text-muted m-0">Exam Title</p>
                                <p class="mb-8pt text-body"><strong>{{ $result->examination->exam->title }}</strong></p>
                            </div>
                            <div class="col-auto d-flex flex-column align-items-center justify-content-center">
                                <h5 class="m-0">{{ $result->score }}/ {{ $result->total_marks }} </h5>
                                <p class="lh-1 mb-0"><small class="text-70">score</small></p>
                            </div>
                        </div>
                    </div>
                </div> 
                @empty
                <div class="list-group list-group-flush">
                    <div class="text-center">
                        <img src="{{ asset('assets/img/NoData.png') }}" alt="" height="250">
                        <p>No Result Available Yet</p>
                    </div>
                </div> 
                @endforelse
                
            </div>
        </div>
    </div>

@endsection