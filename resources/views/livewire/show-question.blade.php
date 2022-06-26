<div class="col-md-12 scrollbar-info" style="overflow-y: auto; height:500px;">
    <div class="col-md-12">
        <div class="todo-content" style="">
            <h4 class="todo-content-header">
                <i class="os-icon os-icon-others-43"></i><span>Total Questions: {{ $questions === null ? '0' :  $questions->count() }}</span>
            </h4>
            
            @foreach ($questions as $key => $question)
            
           
            <div class="all-tasks-w pt-0 pb-0 px-0">
                <div class="tasks-section mx-5">
                    <!--START - TASKS HEADER-->
                    <div class="row ">
                        <div class="col-md-8">
                            <div class="tasks-header-w mb-1">
                                <a class="tasks-header-toggler" href="#"><i class="os-icon os-icon-ui-23"></i></a>
                                <h5 class="tasks-header">
                                   Question: {{ $key +1}}
                                </h5>
                                <span class="tasks-sub-header">{{ $question->question_type }}</span>
                            </div>
                        </div>
                        <div class="col-md-4 text-right">
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
    </div>
</div>