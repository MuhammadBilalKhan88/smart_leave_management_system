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


    // public function employee_leaves_request_store(Request $request)
    // {
    //     $request->validate([
    //         'leave_type' => 'required',
    //         'Reason' => 'required|string',
    //         'from_date' => 'required|date',
    //         'to_date' => 'required|date|after_or_equal:from_date',
    //     ]);

    //     $user = Auth::user();
    //     $employee = Employee::where('user_id', $user->id)->first();
    //     if (!$employee) {
    //         return back()->withErrors(['Status' => 'Employee record missing.']);
    //     }

    //     $from = Carbon::parse($request->from_date);
    //     $to   = Carbon::parse($request->to_date);
    //     $totalDays = $from->diffInDays($to) + 1;


    //     $prompt = "Employee ne {$totalDays} din ki chutti maangi hai for reason: {$request->Reason}. " .
    //         "Total allowed leaves: {$employee->emp_total_leaves}, " .
    //         "Taken: {$employee->emp_total_taken}. " .
    //         "Should this be approved or rejected? Please reply only as JSON like " .
    //         "{\"decision\":\"Approved\"|\"Rejected\",\"why\":\"short reason\"}.";

    //     $aiDecision = 'Pending';
    //     $aiWhy = null;

    //     try {
    //         $response = Http::withHeaders([
    //             'Authorization' => 'Bearer ' . env('COHERE_API_KEY'),
    //             'Content-Type' => 'application/json',
    //         ])->post('https://api.cohere.ai/v1/chat', [
    //             'model' => 'command-r-plus',
    //             'message' => $prompt,
    //             'chat_history' => [],
    //             'temperature' => 0.3,
    //             'max_tokens' => 100,
    //         ]);

    //         if (!$response->successful()) {
    //             return back()->withErrors(['Status' => 'Cohere API Error: ' . $response->status()]);
    //         }

    //         $reply = $response->json('text') ?? '';

    //         $json = json_decode($reply, true);
    //         if (json_last_error() === JSON_ERROR_NONE && isset($json['decision'])) {
    //             $aiDecision = in_array($json['decision'], ['Approved', 'Rejected']) ? $json['decision'] : 'Pending';
    //             $aiWhy = $json['why'] ?? null;
    //         } else {
    //             if (stripos($reply, 'approve') !== false) {
    //                 $aiDecision = 'Approved';
    //             } elseif (stripos($reply, 'reject') !== false) {
    //                 $aiDecision = 'Rejected';
    //             }
    //             $aiWhy = $reply;
    //         }
    //     } catch (\Exception $e) {
    //         return back()->withErrors(['Status' => 'AI API Error: ' . $e->getMessage()]);
    //     }

    //     $leave = new Leave();
    //     $leave->user_id    = $user->id;
    //     $leave->leave_type = $request->leave_type;
    //     $leave->Reason     = $request->Reason;
    //     $leave->from_date  = $from;
    //     $leave->to_date    = $to;
    //     $leave->status     = $aiDecision;
    //     $leave->save();

    //     if ($aiDecision === 'Approved') {
    //         $employee->emp_total_taken += $totalDays;
    //         $employee->save();
    //     }

    //     return redirect()->route('employee.leaves.request.form')
    //         ->with('Status', "Leave Request Submitted. AI Decision: {$aiDecision}");
    // }



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
       

        $from = Carbon::parse($request->from_date);
        $to   = Carbon::parse($request->to_date);
        $totalDays = $from->diffInDays($to) + 1;

        



        $prompt = "The employee has requested {$totalDays} days of leave for the reason: {$request->Reason} " .
            "Total allowed leaves: {$employee->emp_total_leaves}, " .
            "Already taken: {$employee->emp_total_taken}. " .
            "Should this be approved or rejected? Please reply only as JSON like " .
            "{\"decision\":\"Approved\"|\"Rejected\",\"why\":\"short reason\"}.";

        $aiDecision = 'Pending';
        $decisionReson = null;

        $totalLeaveTaken = $employee->emp_total_taken + $totalDays;
        $employeeName = $user->name;        
        
        if ($totalLeaveTaken > $employee->emp_total_leaves) {
            $aiDecision = 'Rejected';
            $decisionReson = $employeeName . ' you have already used all your allowed leaves.';
        } else {
            try {
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . env('COHERE_API_KEY'),
                    'Content-Type' => 'application/json',
                ])->post('https://api.cohere.ai/v1/chat', [
                    'model' => 'command-r-plus',
                    'message' => $prompt,
                    'chat_history' => [],
                    'temperature' => 0.3,
                    'max_tokens' => 100,
                ]);

                if (!$response->successful()) {
                    return back()->withErrors(['Status' => 'Cohere API Error: ' . $response->status()]);
                }

                $reply = $response->json('text') ?? '';

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
            } catch (\Exception $e) {
                return back()->withErrors(['Status' => 'AI API Error: ' . $e->getMessage()]);
            }
        }

        $leave = new Leave();
        $leave->user_id    = $user->id;
        $leave->leave_type = $request->leave_type;
        $leave->Reason     = $request->Reason;
        $leave->from_date  = $from;
        $leave->to_date    = $to;
        $leave->status     = $aiDecision;
        $leave->save();

        if ($aiDecision === 'Approved') {
            $employee->emp_total_leaves -= $totalDays;
            $employee->emp_total_taken += $totalDays;
            $employee->save();
        }

        

        return redirect()->route('employee.leaves.request.form')
            ->with('Status', "Leave Request Submitted. AI Decision: {$aiDecision} : {$decisionReson} ");
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
