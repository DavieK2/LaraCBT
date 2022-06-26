<div class="col-md-6 scrollbar-info"  style="overflow-y: auto; height:640px;">
    <div class="col-md-12">
        <div class="todo-content" style="">
            <h5 class="todo-content-header">
                <span>Assign Exam To Classes</span>
            </h5>
            
            @foreach ($schools as $key => $school)
                <div class="all-tasks-w pt-0 pb-0 px-0">
                    <div class="tasks-section mx-5">
                        <!--START - TASKS HEADER-->
                        <div class="row ">
                            <div class="col-md-8">
                                <div class="tasks-header-w mb-1">
                                    <a class="tasks-header-toggler" href="#class"><i class="os-icon os-icon-ui-23"></i></a>
                                    <h5 class="tasks-header">
                                       {{ $school->school_name }}
                                    </h5>
                                    <span class="tasks-sub-header"></span>
                                </div>
                            </div>
                        </div>
                        
                        <!--END - TASKS HEADER-->
                        <div class="tasks-list-w pt-2">
                            <div class="tasks-list-header">
                                Classes
                            </div>
                            <!--START - Tasks List-->
                            <ul class="tasks-list">
                                @forelse ($school->class as $class)
                                   <li class="pl-3" style="font-size: 12pt">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input wire:model="classID" class="form-check-input" type="checkbox" value="{{ $class->id }}">{{ $class->class_name }}
                                        </label>
                                    </div>
                                </li>
                                @empty
                                <li class="pl-3" style="font-size: 12pt">No Classes Available</li>
                                @endforelse
                            </ul> 
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>