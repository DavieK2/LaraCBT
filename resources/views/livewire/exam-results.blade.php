<div>
    <div class="table-responsive mt-5">
        <table class="table table-padded">
            <thead>
                <tr>
                    <th></th>
                    <th>Student Name</th>
                    <th>Class</th>
                    <th>Exam</th>
                    <th>Classes Assigned</th>
                    <th>Score</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    @foreach ($student->examination as $examination)
                    <tr>
                        <td class="text-center"><input class="form-control" type="checkbox"></td>
                        <td> <span>{{ $student->first_name. ' ' .$examination->student->last_name}}</span></td>
                        <td>{{ $student->class->class_name }} </td>
                        <td>{{ $examination->exam->title }}</td>
                        <td>{{ implode(',  ', $examination->exam->exam_class->pluck('class_name')->toArray()) }}</td>
                        <td> {{ $examination->questions->sum('pivot.score') }} / {{ $examination->exam->exam_question->sum('marks')}} </td>
                        <td> <button wire:click.prvent="publish({{ $examination->id }})" class="btn btn-sm {{ $examination->result == false ? 'btn-danger' : 'btn-success' }}">{{ $examination->result == false ? 'Unpublished' : 'Published' }}</button> </td>
                        <td class="row-actions">
                            <a href="{{ route('instructor.show.results', ['student' => $student, 'examination' => $examination]) }}">
                                <i class="os-icon os-icon-mail-19"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                @empty
                    <div class="text-center">
                        <img src="{{ asset('assets/img/no-data.png') }}" alt="" height="300">
                    </div>
                @endforelse
            </tbody>
        </table>
        {{ $students->links() }}
    </div>
    
</div>
