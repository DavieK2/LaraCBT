<div class="col-lg-5" style="margin-top: -15px">
    @if ($class_reports->count() > 0)
    <div class="col-lg-12 pt-3 pl-4 scrollbar-info" style="overflow-y: auto; overflow-x:hidden; height:550px; border-left-style: solid;border-width: 1px;border-color: #dadada">
        <div class="support-index">
            <div class="">
                @foreach ($class_reports as $class_report)
                <div wire:click="editClassReport({{ $class_report->id }})" class="support-ticket ">
                    <div class="st-body">
                        <div class="ticket-content">
                            <h6 class="ticket-title">
                                Class Name: <span>{{ $class_report->class->class_name }}</span>
                            </h6>
                            <div class="mt-2" style="font-size: 10pt; ">
                                <p class="mb-0">Lesson No: <span> {{ $class_report->lesson_no }}</span></p>
                                <p class="mb-0">MIA Course: <span> {{ $class_report->mia_course }}</span></p>
                                <p class="mb-0">Lesson Notes: <span> {{ $class_report->lesson_notes }}</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="st-foot">
                        <span class="label">Total Attendance: <span>{{ count($class_report->attendance->student_name) }}</span></span>
                        <span class="label ml-4">Date/ Class Time: </span><span class="value">{{ $class_report->date }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</div>
