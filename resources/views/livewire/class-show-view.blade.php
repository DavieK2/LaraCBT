<div>
    <div class="row" >
    <div class="col-md-5 scrollbar-info" style="overflow-y: auto; height:500px;">
        <div class="col-md-12">
            <div class="todo-content" style="">

                <div id="created_question" class="tab-pane fade show active" role="tabpanel"
                    aria-labelledby="home-tab">
                    <h4 class="todo-content-header">
                        <span>Online Exams</span>
                    </h4>
                    <hr>
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-white text-uppercase" style="background-color: #1d58f0">
                                <th>Exams</th>
                                <th>Exam Code</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                       
                       
                        <tbody>
                            @forelse ($class->class_exam as $exam)
                            <tr>
                                <td style="width: 50%">{{ $exam->title }}</td>
                                <td style="width: 20%">{{ $exam->exam_code }}</td>
                                <td style="width: 30%">
                                    @if ($exam->pivot->status == 'Active')
                                        <button wire:click="inactive({{ $exam->id }})" class="btn btn-success btn-sm">Active</button>
                                    @else
                                        <button wire:click="active({{ $exam->id }})" class="btn btn-danger btn-sm">Inactive</button>
                                    @endif
                                  
                                </td>
                            </tr>
                            @empty
                            <div>
                                <p>Not Exams Assigned Yet.</p>
                            </div>
                            @endforelse
                        </tbody>
                        
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-7 scrollbar-info" style="overflow-y: auto; height:500px;">
        <div class="col-md-12">
            <div class="todo-content" style="">

                <div id="created_question" class="tab-pane fade show active" role="tabpanel"
                    aria-labelledby="home-tab">
                    <h4 class="todo-content-header text-dark">
                        <span>Students</span>
                    </h4>
                    <hr>
                    <table class="table table-striped rounded">
                        <thead>
                            <tr class="text-white text-uppercase bg-dark">
                                <th>Full Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>School Code</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                       
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td style="">{{ $student->first_name }} {{ $student->last_name }}</td>
                                <td>{{ $student->age }}</td>
                                <td>{{ $student->gender }}</td>
                                <td>{{ $student->school_code }}</td>
                                <td>{{ $student->status }}</td>
                                <td>
                                    <a wire:click="edit({{ $student->id }})" href="#edit">Edit</a>
                                    <a href="#delete" class="text-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <div aria-hidden="true" aria-labelledby="mySmallModalLabel" id="showEditForm" class="modal fade bd-example-modal-sm" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Update Student Info
              </h5>
              <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
            </div>
            <div class="modal-body">
              <form wire:submit.prevent="updateStudent()">
                <div class="form-group">
                  <label for=""> First Name</label>
                  <input wire:model.defer="first_name" class="form-control" placeholder="Enter First Name" type="text">
                </div>
                @error('first_name') <div> {{ $message }}</div> @enderror
                <div class="form-group">
                    <label for=""> Last Name</label>
                    <input wire:model.defer="last_name" class="form-control" placeholder="Enter Last Name" type="text">
                  </div>
                <div class="form-group">
                  <label for=""> Age</label>
                  <input wire:model.defer="age" class="form-control" placeholder="Age" type="text">
                </div>
                <div class="form-group">
                  <label for="">Gender</label>
                  <select wire:model.defer="gender" class="form-control">
                    <option>Select Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="">Gender</label>
                    <select wire:model.defer="status" class="form-control">
                      <option>Select Status</option>
                      <option>Registered</option>
                      <option>Not Registered</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button><button class="btn btn-primary" type="submit"> Save changes</button>
            </div>
        </form>
          </div>
        </div>
    </div>
</div>



