<div class="col-lg-7 pr-4">
    <div class="element-wrapper">
        <div class="element-box">
            <form wire:submit.prevent="addClassReport()">
                @csrf
                <h5 class="form-header text-primary">
                    Class: {{ $className }}
                </h5>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Date/ Class Time</label>
                            <input wire:model="date" class="form-control datepicker" placeholder="Enter Date" type="text">
                        </div>
                        @error('date') <div class="text-danger pb-3">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for=""> Select Class</label>
                    <select wire:model="classID" class="form-control">
                        <option value="{{ null }}">Select Class </option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                        @endforeach
                    </select>
                    @error('classID') <div class="text-danger pb-3 pt-1">{{ $message }}</div>@enderror
                </div>
                
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Lesson Number</label>
                            <input wire:model="lesson_no" class="form-control" placeholder="Enter Lesson Number" type="text">
                        </div>
                        @error('lesson_no') <div class="text-danger pb-3">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">MIA Course</label>
                           <select wire:model="mia_course" class="form-control">
                               <option value="">Select MIA Course</option>
                               <option>MOS Word 2016</option>
                               <option>MOS Excel 2016</option>
                               <option>MOS Powerpoint 2016</option>
                               <option>MOS Access 2016</option>
                           </select>
                        </div>
                        @error('mia_course') <div class="text-danger pb-3">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Lesson Notes</label>
                    <textarea wire:model="lesson_notes" class="form-control" rows="3"></textarea>
                    @error('lesson_notes') <div class="text-danger pb-3 pt-2">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label>Attendance <em>(Check students present)</em></label>
                </div>

                @if ($classID != null)
                    <div class="form-group" style="overflow-y: auto; height:135px;"> 
                        @foreach ($students as $student)
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input wire:model="studentData" class="form-check-input" type="checkbox" value="{{ $student->first_name. ' '. $student->last_name  }}">{{ $student->first_name. ' '. $student->last_name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                @endif

                @if ($reportUpdate)
                <div class="form-buttons-w">
                    <button class="btn btn-primary" type="submit">Update Class</button>
                    <a href="#reset" wire:click="resetInput()" class="text-info ml-3">Reset</a>
                </div>
                @else
                <div class="form-buttons-w">
                    <button class="btn btn-primary" type="submit">Add Class</button>
                </div>
                @endif
                
            </form>
        </div>
    </div>
</div>