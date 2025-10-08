<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use App\Models\Leave;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class EmpolyeeController extends Controller
{
    public function index()
    {
        $user = Auth::User();

        $employee = Employee::where('user_id', $user->id)->first();
        $user = Auth::user();
        $leaves = Leave::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('empolyee.index', compact('employee', 'leaves'));
    }

    // Leave Request Form
    public function employee_leaves_request_form()
    {
        return view('empolyee.leaves.request_form');
    }



public function employee_leaves_request_store(Request $request)
{
    $request->validate([
        'leave_type' => 'required',
        'Reason' => 'required|string',
        'from_date' => 'required|date',
        'to_date' => 'required|date|after_or_equal:from_date',
    ]);

    $user = Auth::user();
    $employee = Employee::where('user_id', $user->id)->first();

  
    $alreadyLeave = Leave::where('user_id', $user->id)
        ->whereMonth('created_at', Carbon::now()->month)
        ->whereYear('created_at', Carbon::now()->year)
        ->exists();

    if ($alreadyLeave) {
        return back()->withErrors([
            'Status' => 'You can only submit one leave request per month. If there is an issue, please contact the admin. If it is an emergency, please contact the admin directly to request leave.',
        ]);
    }

    $from = Carbon::parse($request->from_date);
    $to   = Carbon::parse($request->to_date);
    $totalDays = $from->diffInDays($to) + 1;

   
    if ($employee->emp_total_taken + $totalDays > $employee->emp_total_leaves) {
        return back()->withErrors([
            'Status' => 'You have exceeded your yearly leave limit. Total allowed: ' . $employee->emp_total_leaves
        ]);
    }

 
    $aiDecision = 'Pending';
    $decisionReson = null;

    try {
        $prompt = "The employee {$user->name} has requested {$totalDays} days of leave for the reason: {$request->Reason}. " .
            "Annual allowed leaves: {$employee->emp_total_leaves}, " .
            "Already taken: {$employee->emp_total_taken}. " .
            "Should this be approved or rejected? Please reply only as JSON like " .
            "{\"decision\":\"Approved\"|\"Rejected\",\"why\":\"short reason\"}.";

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('OPENROUTER_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://openrouter.ai/api/v1/chat/completions', [
            'model' => 'deepseek/deepseek-chat-v3.1:free',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $prompt,
                ]
            ]
        ]);

        if ($response->successful()) {
            $reply = $response->json('choices.0.message.content') ?? '';
            $json = json_decode($reply, true);

            if (json_last_error() === JSON_ERROR_NONE && isset($json['decision'])) {
                $aiDecision = in_array($json['decision'], ['Approved', 'Rejected']) ? $json['decision'] : 'Pending';
                $decisionReson = $json['why'] ?? null;
            } else {
                if (stripos($reply, 'approve') !== false) {
                    $aiDecision = 'Approved';
                } elseif (stripos($reply, 'reject') !== false) {
                    $aiDecision = 'Rejected';
                }
                $decisionReson = $reply;
            }
        }
    } catch (\Exception $e) {
        return back()->withErrors(['Status' => 'AI API Error: ' . $e->getMessage()]);
    }


    $leave = new Leave();
    $leave->user_id    = $user->id;
    $leave->leave_type = $request->leave_type;
    $leave->Reason     = $request->Reason;
    $leave->from_date  = $from;
    $leave->to_date    = $to;
    $leave->total_days = $totalDays;
    $leave->status     = $aiDecision;
    $leave->ai_reason  = $decisionReson;
    $leave->save();


        if ($aiDecision === 'Approved') {
            $employee->emp_total_leaves -= $totalDays;
            $employee->emp_total_taken += $totalDays;
            $employee->save();
        }


    return redirect()->route('employee.leaves.request.form')
        ->with('Status', "Leave Request Submitted. AI Decision: {$aiDecision}. Reason: {$decisionReson}");
}





    public function employee_leaves_request_history()
    {
        $user = Auth::user();
        $leaves = Leave::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('empolyee.leaves.request_history', compact('leaves'));
    }
}
