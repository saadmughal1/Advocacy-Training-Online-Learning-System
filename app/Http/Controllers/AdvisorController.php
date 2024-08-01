<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdvisorController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $advisor = DB::table('advisors')->where('username', $credentials['username'])->first();

        if ($advisor && $advisor->password === $credentials['password']) {
            Auth::guard('advisor')->loginUsingId($advisor->id);
            return redirect()->route('advisor.home');
        }

        return redirect()->back()->with('error', 'Invalid Username or Password');
    }
    public function logout()
    {
        Auth::guard('advisor')->logout();
        return redirect()->route('advisor.login');
    }
    public function advisorCaseLoad()
    {
        $advisorId = Auth::guard('advisor')->id();

        $advisorCases = DB::table('advisor_cases')
            ->where('advisor_id', $advisorId)
            ->get();

        $cases = $advisorCases->map(function ($case) {
            if ($case->case_type == 'family_law') {
                $caseDetails = DB::table('family_law_cases')
                    ->where('id', $case->case_id)
                    ->select('case_name')
                    ->first();
            } else if ($case->case_type == 'early_bird_moot') {
                $caseDetails = DB::table('early_bird_moot_cases')
                    ->where('id', $case->case_id)
                    ->select('case_name')
                    ->first();
            }
            $case->case_name = $caseDetails ? $caseDetails->case_name : 'Unknown';
            return $case;
        });

        return view('advisor.advisor-caseload', ['cases' => $cases]);
    }
    public function displayStudents(Request $request)
    {
        $caseId = $request->query('case_id');
        $caseName = $request->query('case_name');

        $students = DB::table('advisor_case_student')
            ->join('students', 'advisor_case_student.student_id', '=', 'students.id')
            ->where('advisor_case_student.advisor_case_id', $caseId)
            ->select('students.id', 'students.username', 'students.email')
            ->get();

        $studentsNotInStudentCases = $students->filter(function ($student) use ($caseId) {
            return !DB::table('student_cases')
                ->where('student_id', $student->id)
                ->where('advisor_case_id', $caseId)
                ->exists();
        });

        return view('advisor.view-students', [
            'caseName' => $caseName,
            'studentsNotInStudentCases' => $studentsNotInStudentCases
        ]);
    }


    public function assignStudents(Request $request)
    {
        $request->validate([
            'case_id' => 'required|integer',
            'case_name' => 'required|string',
            'students' => 'required|array',
        ]);

        $caseId = $request->input('case_id');
        $caseName = $request->input('case_name');
        $studentIds = $request->input('students');

        $caseExists = DB::table('advisor_cases')->where('id', $caseId)->exists();
        if (!$caseExists) {
            return redirect()->back()->with('error', 'Invalid Case ID');
        }

        $validStudentIds = DB::table('students')->whereIn('id', $studentIds)->pluck('id')->toArray();

        if (count($validStudentIds) !== count($studentIds)) {
            return redirect()->back()->with('error', 'One or more student IDs are invalid');
        }

        foreach ($validStudentIds as $studentId) {
            DB::table('student_cases')->updateOrInsert(
                ['student_id' => $studentId, 'advisor_case_id' => $caseId],
                ['created_at' => now(), 'updated_at' => now()]
            );
        }

        return redirect()->route('advisor.view-students', ['case_id' => $caseId,'case_name' => $caseName])
            ->with('success', 'Students assigned successfully');
    }
}
