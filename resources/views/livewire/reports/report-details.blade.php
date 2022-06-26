<div class="full-chat-middle">
    <div class="chat-head bg-primary text-white">
        <div class="user-info">
            <span>Instructor: John Mayers</span>
        </div>
    </div>
    @if ($classReportDetails == null)
        <div class="text-center">
            <img src="{{ asset('assets/img/no-data.png') }}" alt="" height="300">
        </div>
    @else
    <div class="chat-content-w scrollbar-info"  style="overflow-y: auto; height:300px;">
        @if ($classReportDetails)
        <div class="col-12 pl-5 pt-5">
            <h5 class="mb-3 text-primary">Report Details</h5>
            <hr>
            <p class="mb-1" style="font-size: 9pt"><strong class="text-uppercase">Lesson Number:</strong>  {{ $lesson_no }}</p>
            <p class="mb-1" style="font-size: 9pt"><strong class="text-uppercase">MIA Course:</strong>  {{ $mia_course }}</p>
            <p class="mb-1" style="font-size: 9pt"><strong class="text-uppercase">Lesson Notes:</strong>  </p><span style="font-size: 10pt" class="text-muted" >{{ ucfirst($lesson_notes) }}</span>
            <p class="pt-3" style="font-size: 9pt"><strong class="text-uppercase">Total Attendance: {{ count($attendance->student_name) }}</strong></p>
            <ul>
                @foreach ($attendance->student_name as $student)
                    <li>{{ $student }}</li>
                @endforeach
            </ul>
        </div>  
        @endif
        
    </div>

    @endif
    <div class="chat-controls">
        <div div class="col-12 pl-3 pt-3">
            <h5 class="text-primary">Remarks</h5>
            <hr>
            <p>{!! html_entity_decode ($report->remark)  !!}</p>
        </div>
    </div>
</div>