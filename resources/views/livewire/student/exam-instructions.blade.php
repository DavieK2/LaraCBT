<div class="mdk-box bg-dark mdk-box--bg-gradient-primary js-mdk-box pt-5 mb-0" data-effects="blend-background">
    <div class="mdk-box__content pt-5" style="background-image:url('{{ asset('/assets/img/background.png') }}')">
        <div class="hero py-64pt text-center text-sm-left">
            <div class="container">
                <h1 class="text-white">{{ $exam->mia_course }}</h1>
                <p class="lead text-white-50 measure-hero-lead mb-24pt">Instructions: {{ $exam->instructions }}</p>
                <a href="#" onclick="event.preventDefault(); document.getElementById('start-exam').submit();" class="btn btn-white">Start Exam</a>
            </div>
        </div>
        <div class="navbar navbar-expand-sm navbar-submenu navbar-light navbar-list p-0 m-0 align-items-center">
            <div class="container page__container">
                <ul class="nav navbar-nav flex align-items-sm-center">
                    <li class="nav-item navbar-list__item">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <a class="card-title m-0" href="instructor-profile.html">{{ $student->name }}</a>
                                <p class="text-50 lh-1 mb-0">Student</p>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item navbar-list__item">
                        <i class="material-icons text-muted icon--left">schedule</i>
                       Duration: {{ $exam->duration }} minutes
                    </li>
                    <li class="nav-item navbar-list__item">
                        <i class="material-icons text-muted icon--left">assessment</i>
                        Exam: {{ $exam->title }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <form action="{{ route('student.start.cbt', ['exam' => $exam, 'student' => $student]) }}" method="post" id="start-exam">
        @csrf
    </form>
</div>