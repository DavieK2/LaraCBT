<div class="col-md-6">
    <div class="element-wrapper">
        <div class="element-box">
            <form  method="POST" wire:submit.prevent="$emitTo('exam-classes', 'createExam')">
                @csrf
                <h6 class="form-header text-primary">
                    Create Exam
                </h6>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input wire:model="title" type="text" class="form-control" name="title" placeholder="Enter Title">
                        </div>
                        @error('title') <div class="text-danger pb-3" style="font-size: 10pt">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Select Course</label>
                            <select wire:model="mia_course" class="form-control" name="mia_course">
                               <option value="">Select MIA Course</option>
                                <option>MOS Word 2016</option>
                                <option>MOS Access 2016</option>
                                <option>MOS Powerpoint 2016</option>
                                <option>MOS Excel 2016</option>
                            </select>
                        </div>
                        @error('mia_course') <div class="text-danger pb-3" style="font-size: 10pt">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for=""> Select School</label>
                            <select wire:model="schoolID" class="form-control scrollbar-info" multiple="true" name="school_id[]">
                            @foreach ($schools as $key => $school)
                                <option value="{{ $school->id }}">{{ $school->school_name }}</option>
                            @endforeach
                            </select>
                        </div>
                        @error('schoolID.0') <div class="text-danger pb-3" style="font-size: 10pt">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Duration</label>
                            <input wire:model="duration" type="number" class="form-control" name="duration" placeholder="Enter Duration (Note: Duration should be in minutes)">
                        </div>
                        @error('duration') <div class="text-danger pb-3" style="font-size: 10pt">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Instructions</label>
                            <textarea wire:model="instructions" type="number" class="form-control" name="instructions"> </textarea>
                        </div>
                        @error('instructions') <div class="text-danger pb-3" style="font-size: 10pt">{{ $message }}</div>@enderror
                    </div>
                </div>
                
                <div class="form-buttons-w pt-5 pb-5">
                    <a href="#assign" wire:click.prevent="addSchools">Assign Classes For Exam</a>
                    <button  {{ $createButton == false ? 'disabled' : '' }} class="btn btn-primary float-right" type="submit">Create Exam</button>
                </div>
            </form>
        </div>
    </div>
</div>