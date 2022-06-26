<div>
    @foreach ($examination->exam->exam_question as $key => $question)
    @if ($key == $questionKey)
    <div class="bg-gradient-primary pb-lg-64pt py-32pt">
        <div class="container page__container pt-5">
            <div class="d-flex flex-wrap align-items-end justify-content-end mb-16pt">
                <h1 class="text-white flex m-0">Question {{ $key +1}} of {{ $examination->exam->exam_question->count() }}</h1>
            </div>
            <p class="hero__lead measure-hero-lead text-white-50">{{ $question->question }}</p>
        </div>
    </div>
    
    <div class="navbar navbar-expand-md navbar-list navbar-submenu navbar-light " style="white-space: nowrap;">
        <div class="container page__container">
            <ul class="nav navbar-nav flex navbar-list__item">
                <li class="nav-item">
                    <i class="material-icons text-50 mr-8pt">tune</i>
                    Choose the correct answer below:
                </li>
            </ul>
            @if ($examination->exam->exam_question->count() <= 1)
            <div class="nav navbar-nav ml-sm-auto navbar-list__item">
                <div class="nav-item d-flex flex-column flex-sm-row ml-sm-16pt">
                <a href="#" wire:click.prevent="completeButton({{ $key }})" class="btn justify-content-center btn-success w-100 w-sm-auto mb-16pt mb-sm-0 ml-sm-16pt">Complete Exam<i class="material-icons icon--right">keyboard_arrow_right</i></a>
                </div>
            </div>

            @elseif($loop->last)
            <div class="nav navbar-nav ml-sm-auto navbar-list__item">
                <div class="nav-item d-flex flex-column flex-sm-row ml-sm-16pt">
                    <a href="#" wire:click.prevent="previousButton()" class="btn justify-content-center btn-outline-secondary w-100 w-sm-auto mb-16pt mb-sm-0">Previous Question</a>
                <a href="#" wire:click.prevent="completeButton({{ $key }})" class="btn justify-content-center btn-success w-100 w-sm-auto mb-16pt mb-sm-0 ml-sm-16pt">Complete Exam<i class="material-icons icon--right">keyboard_arrow_right</i></a>
                </div>
            </div>
            
            @elseif($questionKey == 0)
            <div class="nav navbar-nav ml-sm-auto navbar-list__item">
                <div class="nav-item d-flex flex-column flex-sm-row ml-sm-16pt">
                    <a href="#" wire:click.prevent="skip({{ $key }})" class="btn justify-content-center btn-accent pl-3 w-100 w-sm-auto mb-16pt mb-sm-0">Skip</a>
                    <a href="#" wire:click.prevent="nextButton({{ $key }})" class="btn justify-content-center btn-success w-100 w-sm-auto mb-16pt mb-sm-0 ml-sm-16pt">Submit<i class="material-icons icon--right">keyboard_arrow_right</i></a>
                </div>
            </div>
            
            @else
            <div class="nav navbar-nav ml-sm-auto navbar-list__item">
                <div class="nav-item d-flex flex-column flex-sm-row ml-sm-16pt">
                    <a href="#" wire:click.prevent="previousButton()" class="btn justify-content-center btn-outline-secondary w-100 w-sm-auto mr-3 mb-16pt mb-sm-0">Previous Question</a>
                    <a href="#" wire:click.prevent="skip({{ $key }})" class="btn justify-content-center btn-accent w-100 pl-3 w-sm-auto mb-16pt mb-sm-0">Skip</a>
                    <a href="#" wire:click.prevent="nextButton({{ $key }})" class="btn justify-content-center btn-success w-100 w-sm-auto mb-16pt mb-sm-0 ml-sm-16pt">Next Question<i class="material-icons icon--right">keyboard_arrow_right</i></a>
                </div>
            </div>
            @endif
        </div>
    </div>
    
    <div class="container page__container">
        <div class="page-section pt-4">
            <h4>Your Answer:</h4>
            @if ($question->question_type == 'Short Answer')
            <div class="form-group">
                <textarea maxlength="300" wire:model="studentAnswer.{{ $key }}" name="answer" class="form-control" cols="30" rows="10" style="border-width: 1px; border-style:solid; border-color: rgb(179, 179, 179)"></textarea>
            </div>
            @else
                @foreach ($question->answers as $keys => $answer)
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input wire:model="studentAnswer.{{ $key }}" name="answer" id="studentAnswer{{ $keys }}" type="radio" value="{{ $answer }}" class="custom-control-input">
                        <label for="studentAnswer{{ $keys }}" class="custom-control-label">{{ $answer }}</label>
                    </div>
                </div>
                @endforeach
            @endif
            
            @error("studentAnswer.$key") <div class="text-danger pb-3" style="font-size: 12pt">{{ $message }}</div>@enderror
        </div>
    </div>
    @endif
@endforeach

</div>


