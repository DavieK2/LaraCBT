<div class="element-box-tp mt-5">
    <div class="table-responsive">
        <table class="table table-padded">
            <thead>
                <tr>
                    <th></th>
                    <th>Week</th>
                    <th>School</th>
                    <th>Remark</th>
                    <th>Comments</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reports as $report)
                <tr class="text-uppercase align-items-center" style="font-size: 9pt">
                    <td class="text-center">
                        <input class="form-control" type="checkbox">
                    </td>
                    <td style="width:10% "><span class="text-primary">{{ $report->week }}</span></div>
                    </td>
                    <td  style="width:15% "><span>{{ $report->school->school_name }}</span></div>
                    <td style="width: 20%">
                        <div class="smaller lighter">
                            {!! $report->remark !== null ? ucfirst(html_entity_decode(Str::words( $report->remark, 20, '...'))) : 'No Remmark' !!}
                        </div>
                    </td>
                    <td style="width: 20%">
                        <div class="smaller lighter">
                            {{ $report->comments == null ? 'No Comment Yet' :  $report->comments }}
                        </div>
                    </td>
                    <td  style="width: 15%">
                        <span class="text-muted" style="font-size: 9pt">{{ $report->created_at }}</span>
                    </td>
                    <td class="row-actions"  style="width: 15%">
                        <a href="{{ route('instructor.show.report', $report) }}"><i class="os-icon os-icon-mail-18"></i></a>
                        <a href="{{ route('instructor.edit.report', $report) }}"><i class="os-icon os-icon-edit-1"></i></a>
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
        <div class="mt-4">
            {{ $reports->links() }}
        </div>
    </div>
</div>