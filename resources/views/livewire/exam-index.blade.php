<div class="table-responsive mt-5">
    <table class="table table-padded">
        <thead>
            <tr>
                <th></th>
                <th>Title</th>
                <th>Course</th>
                <th class="text-center">Total Questions</th>
                <th>Duration</th>
                <th>Classes Assigned</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($exams as $exam)
            <tr>
                <td class="text-center">
                    <input class="form-control" type="checkbox">
                </td>
                <td> <span>{{ $exam->title }}</span></td>
                <td>{{ $exam->mia_course }} </td>
                <td class="text-center">{{ $exam->exam_question == null ? '0' : $exam->exam_question->count() }}</td>
                <td>{{ $exam->duration }}</a></td>
                <td>{{ implode(',  ', $exam->exam_class->pluck('class_name')->toArray())}}</a></td>
                <td class="row-actions">
                    <a href="{{ route("instructor.show.exam", $exam) }}"><i class="os-icon os-icon-mail-19"></i></a>
                    @if (! $exam->examination()->count() > 0)
                    <a href="{{ route('instructor.edit.exam', $exam) }}"><i class="os-icon os-icon-edit-1"></i></a>
                    @endif
                    <a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a>
                </td>
            </tr>
            @empty
            <div class="text-center">
                <img src="{{ asset('assets/img/no-data.png') }}" alt="" height="300">
            </div>
            @endforelse
        </tbody>
    </table>
    {{ $exams->links() }}
</div>
