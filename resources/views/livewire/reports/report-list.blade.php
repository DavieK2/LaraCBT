<div class="full-chat-left">
    <div class="text-center">
        <h5>{{ $report->week }} Report</h5>
        <p>{{ $report->school->school_name }}</p>
    </div>
    <div class="chat-search">
        <div class="element-search">
            <input placeholder="Search Class..." type="text">
        </div>
    </div>
    <div class="user-list scrollbar-info" style="overflow-y: auto; height:300px;">
        @foreach ($report->class_report as $class_report)
        <div wire:click="reportDetails({{ $class_report->id }})" class="user-w">
            <div class="user-info">
                <div class="user-date">
                    12 min
                </div>
                <div class="user-name">
                    {{ $class_report->class->class_name }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>