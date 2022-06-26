<div class="col-md-5">
    <div class="element-wrapper">
        <div class="element-box">
            <form wire:submit.prevent="saveQuestion({{ $questionID }})" action="#" method="POST">
                @csrf
                <h6 class="form-header text-primary">
                   Exam Title: {{ $title }}
                </h6>
                <hr>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Question</label>
                            <input wire:model="question" type="text" class="form-control" name="question" placeholder="Enter Question">
                        </div>
                        @error('question') <div class="text-danger pb-3" style="font-size: 9pt">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Question Type</label>
                           <select wire:model="question_type" class="form-control">
                               <option value="">Select Question Type</option>
                               <option>Multiple Choice</option>
                               <option>Short Answer</option>
                           </select>
                        </div>
                        @error('question_type') <div class="text-danger pb-3" style="font-size: 9pt">{{ $message }}</div>@enderror
                    </div>
                </div>
                @if ($question_type == 'Multiple Choice')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row align-items-center" >
                                <div class="col-md-7">
                                    <label for="">Options <span><em class="text-muted" style="font-size: 9pt">(Tick correct answer)</em></span></label>
                                </div>
                                <div class="col-md-5 px-md-0">
                                    <label for="file" style="cursor: pointer; font-size: 10pt" class="text-info float-right" id="addImage" >Add Image</label>
                                    <a href="#addquestion" style="font-size: 10pt" wire:click="addOptions({{ $i }})" class="" id="add">Add Option</a>
                                    <input type="file" wire:model="image" hidden id="file">
                                </div>
                            </div>
                            @foreach ($inputs as $key => $value)
                                <div class="form-check pb-2">
                                    <label class="form-check-label"><input wire:model="correct_answer" class="form-check-input mt-3" name="correct_answer" type="radio" value="{{ $value }}"><input wire:model="answers.{{ $key }}" type="text" class="form-control" placeholder="Enter Options"></label><a wire:click="removeOptions({{ $key }})" href="#removequestion" class="text-danger pl-2" id="remove" style="font-size: 9pt">Remove</a>
                                </div>
                            @endforeach
                            @error('correct_answer') <div class="text-danger pb-3" style="font-size: 9pt">{{ $message }}</div>@enderror
                            @error('answers.{{ $key }}') <div class="text-danger pb-3" style="font-size: 9pt">{{ $message }}</div>@enderror
                        </div>
                        @error('image') <div class="text-danger pl-2 pb-3" style="font-size: 9pt">{{ $message }}</div>@enderror
                    </div> 
                @endif
                
                @if ($showMarks || $question_type == 'Short Answer')
                    <div class="row align-items-center pt-4">
                        <div class="col-md-2">
                            <label>Marks</label>
                        </div>
                        <div class="col-5">
                            <input wire:model="marks" type="text" class="form-control" placeholder="Enter Mark">
                        </div>
                    </div>
                    @error('marks') <div class="text-danger pb-3" style="font-size: 9pt">{{ $message }}</div>@enderror
                @endif
                <div class="form-buttons-w">
                    <button class="btn btn-primary btn-block" type="submit">{{ $updateButton == true ? 'Update Question' : 'Add Question' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>