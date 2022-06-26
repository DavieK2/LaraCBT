<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Instructor\Report;

class ReportController extends Controller
{
   public function index()
   {
       return view('backend.instructors.reports.index');
   }

   public function create()
   {
        $schools = auth()->user()->school;
        return view('backend.instructors.reports.create', compact('schools'));
   }

   public function store()
   {
        $data = request()->validate([
            'week' => 'required',
            'school_id' => 'required',
        ]);
       
        $data['uuid'] = Str::uuid()->toString();  
        $report = auth()->user()->report()->create($data);

        return redirect()->route('instructor.report.report', ['report' => $report]);
   }

   public function report(Report $report)
   {
        $this->authorize('view', $report);
        return view('backend.instructors.reports.report', compact('report'));
   }

   public function show(Report $report)
   {
        $this->authorize('view', $report);
        return view('backend.instructors.reports.show', compact('report'));
   }

   public function complete(Report $report)
   {
        $this->authorize('update', $report);
        $report->remark = request('ckeditor1');
        $report->update();

        return redirect()->route('instructor.index.report');
   }

   public function edit(Report $report)
   {
        $this->authorize('view', $report);
        return view('backend.instructors.reports.edit', compact('report'));
   }


}
