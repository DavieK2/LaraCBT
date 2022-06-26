<div class="element-box-tp mt-5">
    <div class="table-responsive">
        <table class="table table-padded">
            <thead>
                <tr>
                    <th></th>
                    <th>Class Name</th>
                    <th>School Name</th>
                    <th>Total Students</th>
                    <th>Last Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schools as $school)
                    @forelse ($school->grades as $class)
                        <tr>
                            <td class="text-center">
                                <input class="form-control" type="checkbox">
                            </td>
                            <td>
                                {{ $class->class_name }}
                            </td>
                            <td>
                                {{ $school->school_name }}
                            </td>
                            <td>
                                {{ $class->students->count() }}   
                            </td>
                            <td class="nowrap">
                                {{ $class->updated_at }}
                            </td>
                            <td class="row-actions">
                                <a href="{{ route('instructor.show.class', $class) }}"><i class="os-icon os-icon-edit-1"></i></a>
                                <a class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a>
                            </td>
                        </tr>
                        @empty
                        <div class="text-center">
                            <img src="{{ asset('assets/img/no-data.png') }}" alt="" height="300">
                        </div>
                    @endforelse
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            {{ $schools->links() }}
        </div>
    </div>
</div>