<div class="col-lg-7 pl-4 scrollbar-info" style="overflow-y: auto; height:450px;">
    <div class="row">
        <div class="col-md-12">
           
            <table class="table table-striped" style="font-size:9pt; border-color:#047bf8">
                <tr>
                    <thead class="bg-primary text-white">
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Class</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Action</th>
                    </thead>
                    
                </tr>
                <tbody class="bg-white">
                    @forelse ($students as $student)
                    <tr class="py-0">
                        <td style="width: 30%">{{ $student->first_name }}</td>
                        <td style="width: 30%">{{ $student->last_name }}</td>
                        <td style="width: 30%">{{ $student->class->class_name }}</td>
                        <td style="width: 30%">{{ $student->gender }}</td>
                        <td style="width: 30%">{{ $student->age }}</td>
                        <td>
                            <a href="#" wire:click.prevent="edit({{ $student->id }})">Edit</a>
                            <a href="#" wire:click.prevent="delete({{ $student->id }})" class="text-danger">Delete</a>
                        </td>
                    </tr>
                    @empty
                    <div class="text-center bg-white pb-4">
                        <img src="{{ asset('assets/img/no-data.png') }}" alt="" height="300">
                        <p class="">Not Student Added Yet</p>
                    </div>
                    @endforelse
                </tbody>
            </table>
                
        </div>
    </div>
</div>
