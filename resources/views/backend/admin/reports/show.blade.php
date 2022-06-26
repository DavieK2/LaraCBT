<div class="full-chat-middle">
    <div class="chat-head">
        <div class="user-info">
            <span>Instructor: John Mayers</span>
        </div>
    </div>
    <div class="chat-content-w"  style="overflow-y: auto; height:300px;">
        @if ($classReportDetails)
        <div class="col-12 pl-5 pt-5">
            <h5 class="mb-3 text-primary">Report Details</h5>
            <p><strong>Lesson Number:</strong>  {{ $lesson_no }}</p>
            <p><strong>MIA Course:</strong>  {{ $mia_course }}</p>
            <p><strong>Lesson Notes:</strong>  </p><span>{{ $lesson_no }}</span>
            <p class="pt-3"><strong>Total Attendance: {{ count($attendance->student_name) }}</strong></p>
            <ul>
                @foreach ($attendance->student_name as $student)
                    <li>{{ $student }}</li>
                @endforeach
            </ul>
        </div>  
        @endif
        
    </div>
    <div class="chat-controls">
        <div class="chat-input">
            <input placeholder="Type your message here..." type="text">
        </div>
        <div class="chat-input-extra mt-5">
            <div class="chat-btn">
                <a class="btn btn-primary" href="#">Comment</a>
            </div>
        </div>
    </div>
</div>