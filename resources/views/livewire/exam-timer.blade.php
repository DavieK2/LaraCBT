<div wire:poll.1000ms="decrement">
    <div class="bg-dark border-bottom-white py-32pt">
        <div class="row align-items-center mx-0 px-0">
            <div class="col-md-6 pl-5">
                <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
                    <img src="{{ asset('student/assets/images/illustration/student/128/white.svg') }}" width="104" class="mr-md-32pt mb-32pt mb-md-0" alt="student">
                    <div class="flex mb-32pt mb-md-0">
                        <h2 class="text-white mb-0">{{ $examination->student->name }}</h2>
                        <p class="lead text-white-50 d-flex align-items-center">Student <span class="ml-16pt d-flex align-items-center"><i class="material-icons icon-16pt mr-4pt">opacity</i> {{ $examination->student->status }}</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <nav class="nav navbar-nav">
                    <div class="nav-item navbar-list__item text-center">
                        <p class="h3 mt-2 text-center {{ $totalSeconds <= 600 ? 'text-danger' : 'text-white' }}  font-weight-light m-0">
                            Time Remaining: @if ($hours > 1) {{ $hours.' hours' }} @elseif($hours == 1) {{ $hours.' hour' }} @else @endif  {{ $minutes <= 1 ? $minutes.' minute' : $minutes.' minutes' }}<span class="{{ $totalSeconds <= 600 ? 'text-danger' : 'text-warning' }}"> {{ $seconds < 10 ? "0$seconds" : "$seconds" }} seconds</span>
                        </p>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>