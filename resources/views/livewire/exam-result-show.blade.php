<div>
    <div class="row">
        <div class="col-md-12 scrollbar-info" style="overflow-y: auto; height:500px;">
            <div class="col-md-12">
                <div class="todo-content" style="">
                    <h4 class="todo-content-header">
                        <i class="os-icon os-icon-others-43"></i><span>Total Questions: {{ $totalQuestions }}</span>
                    </h4>
                    
                    @foreach ($examination->questions as $key => $question)
                    <div class="all-tasks-w pt-0 pb-0 px-0">
                        <div class="tasks-section mx-md-5 mx-sm-2">
                            <!--START - TASKS HEADER-->
                            <div class="row ">
                                <div class="col-md-12 mx-sm-0 px-sm-0">
                                    <div class="tasks-header-w mb-1 mx-sm-0 px-sm-0">
                                        <a class="tasks-header-toggler" href="#"><i class="os-icon os-icon-ui-23"></i></a>
                                        <h5 class="tasks-header">
                                           Question: {{ $key +1}}
                                        </h5>
                                        <span class="tasks-sub-header">{{ $question->question_type }} ( {{ $question->marks }} marks)</span>
                                        <span class="tasks-sub-header text-danger float-right ml-0 pl-0">Awarded Mark: 
                                            @if ($question->question_type == 'Multiple Choice')
                                            {{ $question->pivot->score }} 
                                            @else
                                            {{ $question->pivot->score  }} &nbsp;&nbsp;&nbsp; 
                                            <input maxlength="2" size="2" wire:model="marks.{{ $key }}" type="text" name="marks" id="" value="{{ $question->pivot->score }}"> 
                                            <a class="task-btn-done todo-task-buttons text-success" wire:click.prevent="awardMark({{ $question->id }}, '{{ $key }}')" href="#"><span></span><i class="os-icon os-icon-ui-21"></i></a>
                                            @endif
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
                                            <li class="pl-3" style="font-size: 12pt">{{ $alphabet[$key] }}. {{ $answer }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-right" style="font-size: 9pt">{{ $answer == $question->pivot->answer ? '(Student Answer)' : '' }}  </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="text-success" style="font-size: 9pt">{{ $answer == $question->correct_answer ? '(Correct Answer)' : '' }}</span></li>
                                        @endforeach
                                    @else
                                    <li  class="pl-3" style="font-size: 12pt">{{ $question->pivot->answer }}</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
