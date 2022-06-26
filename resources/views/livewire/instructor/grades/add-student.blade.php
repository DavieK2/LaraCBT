<div class="col-lg-5 pr-4">
    <div class="element-wrapper">
        <div class="element-box">
            <form wire:submit.prevent="addStudent({{ $class->id }})" action="#" method="POST">
                @csrf
                <h5 class="form-header text-primary">
                    Class: {{ $class->class_name }}
                </h5>
                <hr>
                <div class="form-group">
                    <label for="">First Name</label>
                    <input wire:model.defer="first_name" class="form-control" placeholder="Enter First Name" type="text">
                </div>
                @error('first_name') <div class="text-danger pb-3">{{ $message }}</div>@enderror

                <div class="form-group">
                    <label for="">Last Name</label>
                    <input wire:model="last_name" class="form-control" placeholder="Enter Last Name" type="text">
                </div>
                @error('last_name') <div class="text-danger pb-3">{{ $message }}</div>@enderror
                
                <div class="form-group">
                    <label for="">Gender</label>
                    <select class="form-control" wire:model="gender">
                        <option value="">Please Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                @error('gender') <div class="text-danger pb-3">{{ $message }}</div>@enderror

                <div class="form-group">
                    <label for="">Age</label>
                    <input class="form-control" value="{{ $age }}" placeholder="Age" type="number" wire:model="age">
                </div>
                @error('age') <div class="text-danger pb-3">{{ $message }}</div>@enderror

                <div class="form-buttons-w">
                    @if ($updateButton)
                    <button class="btn btn-primary" type="submit">Update Student</button>
                    <a class="ml-4 text-danger" href="#" wire:click.prevent="resetInput()">Reset</a>
                    @else
                    <button class="btn btn-success" type="submit">Add Student</button>
                    @endif
                </div>
            </form>
            <div class="form-buttons-w">
                <a href="{{ route('instructor.index.class') }}" class="text-primary">Save Class Information</a>
            </div>
        </div>
    </div>
</div>
