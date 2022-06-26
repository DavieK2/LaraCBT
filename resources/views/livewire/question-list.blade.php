<div class="col-md-7 scrollbar-info" style="overflow-y: auto; height:500px;">
    <div class="col-md-12">
        <div class="todo-content" style="">
            <div class="os-tabs-w mx-4">
                <div class="os-tabs-controls">
                  <ul class="nav nav-tabs upper" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link {{ $questionArchive == true ? '' :'active' }} " wire:click="created_question" id="home-tab" data-toggle="tab" href="#created_question" role="tab" aria-controls="created_question" aria-selected="true">Created Questions</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ $questionArchive == true ? 'active' :'' }}" wire:click="question_archive" id="question-tab" data-toggle="tab" href="#question_archive" role="tab" aria-controls="question_archive" aria-selected="false">Question Archive</a>
                    </li>
                  </ul>
                </div>
            </div>

            @if ($questionArchive == true)
            <div id="created_question"  class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab">
                <h4 class="todo-content-header">
                    <i class="os-icon os-icon-others-43"></i><span>Total Questions: {{ $questions->count() }} of {{ auth()->user()->questions()->where('question_category', $exam->mia_course)->count() }}</span>
                </h4>
                
                @foreach ($questions as $key => $question)
                    <div class="all-tasks-w pt-0 pb-0 px-0">
                        <div class="tasks-section mx-5">
                            <!--START - TASKS HEADER-->
                            <div class="row ">
                                <div class="col-md-8">
                                    <div class="tasks-header-w mb-1">
                                        <div class="form-check pl-0">
                                            <label class="form-check-label">
                                                <input wire:model="questionID" class="form-check-input" type="checkbox" value="{{ $question->id }}">
                                                <h5 class="tasks-header">
                                                    Question
                                                 </h5>
                                            </label>
                                            <span class="tasks-sub-header">{{ $question->question_type }} ({{ $question->marks }} marks)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right">
                                <a class="add-task-btn pl-3" wire:click="$emitTo('create-question', 'editQuestionArchive', {{ $question->id }})" href="#edit"><i class="os-icon os-icon-edit-1"></i><span>Edit</span></a>
                                  
                                </div>
                            </div>
                            
                            <!--END - TASKS HEADER-->
                            <div class="tasks-list-w pt-2">
                                <div class="tasks-list-header">
                                    {{ $question->question }}
                                </div>
                                <!--START - Tasks List-->
                                @php
                                    $alphabet = range('a', 'z')
                                @endphp
                                <ul class="tasks-list">
                                    @if ($question->answers)
                                        @foreach ($question->answers as $key => $answer)
                                            <li class="pl-3" style="font-size: 12pt">{{ $alphabet[$key] }}. {{ $answer }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-success text-right" style="font-size: 9pt">{{ $answer == $question->correct_answer ? '(Correct Answer)' : '' }}</span></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="row pt-5">
                    <div class="col-md-6">
                        {{ $questions->links() }}
                    </div>
                    <div class="col-md-6">
                        <button wire:click="syncQuestionsToExam" wire:loading.class="btn-gray" class="btn btn-success float-right">Assign Questions</button>
                    </div>
                </div>
            </div> 
            @else
            <div id="created_question"  class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab">
                <h4 class="todo-content-header">
                    <i class="os-icon os-icon-others-43"></i><span>Total Questions: {{ $exam->exam_question == null ? '0': $exam->exam_question->count() }}</span>
                </h4>
                
                @foreach ($exam->exam_question as $key => $question)
                    <div class="all-tasks-w pt-0 pb-0 px-0">
                        <div class="tasks-section mx-5">
                            <!--START - TASKS HEADER-->
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="tasks-header-w mb-1">
                                        <a class="tasks-header-toggler" href="#"><i class="os-icon os-icon-ui-23"></i></a>
                                        <h5 class="tasks-header">
                                           Question: {{ $key +1}}
                                        </h5>
                                        <span class="tasks-sub-header">{{ $question->question_type }} ({{ $question->marks }} marks)</span>
                                        <span style="font-size: 8pt">
                                            <a class="add-task-btn pl-3 float-right " wire:click="$emitTo('create-question', 'editQuestion', {{ $question->id }})" href="#edit"><i class="os-icon os-icon-edit-1"></i><span></span></a>
                                            <a class="add-task-btn text-danger float-right" wire:click="deleteQuestion( {{ $question->id }})" href="#delete"><i class="os-icon os-icon-ui-15" "></i><span></span></a>
                                        </span>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <!--END - TASKS HEADER-->
                            <div class="tasks-list-w pt-2">
                                <div class="tasks-list-header">
                                    {{ $question->question }}
                                </div>
                                <!--START - Tasks List-->
                                @php
                                    $alphabet = range('a', 'z')
                                @endphp
                                <ul class="tasks-list">
                                    @if ($question->answers)
                                        @foreach ($question->answers as $key => $answer)
                                            <li class="pl-3" style="font-size: 12pt">{{ $alphabet[$key] }}. {{ $answer }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-success text-right" style="font-size: 9pt">{{ $answer == $question->correct_answer ? '(Correct Answer)' : '' }}</span></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>