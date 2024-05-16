<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leave;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Mail;
use Mail;
use App\Mail\ApplicationLeave;

class LeaveController extends Controller
{
    public function leave(){
        return view('backend.leaves.leave');
    }

    public function apply(Request $request)
{
    // Validate and store the leave application in the database
    $leave = new Leave();
    $leave->user_id = auth()->user()->id;
    $leave->start_date = $request->start_date;
    $leave->end_date = $request->end_date;
    $leave->reason = $request->reason;
    $leave->save();

    $mailData = [
        'name' => auth()->user()->name,
        'email' => auth()->user()->email,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'reason' => $request->reason
    ];
    // Send email notification to manager
    $manager = auth()->user()->get_manager_single;

    if ($manager && $manager->manager_email) {
        Mail::to($manager->manager_email)->send(new ApplicationLeave($mailData));
        dd("Email sent successfully....");
    } else {
        dd("No manager email found. Unable to send email.");
    }



    // Redirect or return response
}
}
