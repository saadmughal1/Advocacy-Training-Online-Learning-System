<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $student = DB::table('students')->where('username', $credentials['username'])->first();

        if ($student && $student->password === $credentials['password']) {
            Auth::guard('student')->loginUsingId($student->id);
            return redirect()->route('student.home');
        }

        return redirect()->back()->with('error', 'Invalid Username or Password');
    }
    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect()->route('student.login');
    }

    public function displayMyCases()
    {
        $studentId = Auth::guard('student')->id();

        $studentCases = DB::table('student_cases as sc')
            ->join('advisor_cases as ac', 'sc.advisor_case_id', '=', 'ac.id')
            ->join('advisors as a', 'ac.advisor_id', '=', 'a.id')
            ->leftJoin('family_law_cases as flc', function ($join) {
                $join->on('ac.case_id', '=', 'flc.id')
                    ->where('ac.case_type', '=', 'family_law');
            })
            ->leftJoin('early_bird_moot_cases as ebmc', function ($join) {
                $join->on('ac.case_id', '=', 'ebmc.id')
                    ->where('ac.case_type', '=', 'early_bird_moot');
            })
            ->where('sc.student_id', $studentId)
            ->select(
                'sc.id as student_case_id',
                'ac.case_type',
                'a.username as advisor_username',
                DB::raw('CASE WHEN ac.case_type = "family_law" THEN flc.case_name WHEN ac.case_type = "early_bird_moot" THEN ebmc.case_name END as case_name')
            )
            ->get();

        return view('student.my-caseload', ['cases' => $studentCases]);
    }

    public function startCase($caseId)
    {

        $studentId = Auth::guard('student')->id();

        $studentCase = DB::table('student_cases')
            ->join('advisor_cases', 'student_cases.advisor_case_id', '=', 'advisor_cases.id')
            ->where('student_cases.id', $caseId)
            ->select('advisor_cases.case_type', 'advisor_cases.case_id')
            ->first();

        if (!$studentCase) {
            return redirect()->route('student.my-caseload')->with('error', 'Case not found.');
        }

        $stepTablePrefix = $studentCase->case_type === 'family_law' ? 'family_law' : 'early_bird_moot';

        $steps = [
            'family_law' => 14,
            'early_bird_moot' => 2
        ];

        $numberOfSteps = $steps[$stepTablePrefix];

        $stepFound = false;

        for ($i = 1; $i <= $numberOfSteps; $i++) {
            $tableName = "{$stepTablePrefix}_step_{$i}";

            $dataExists = DB::table($tableName)
                ->where('student_id', $studentId)
                ->where('case_id', $studentCase->case_id)
                ->where('status', 1)
                ->exists();

            if (!$dataExists) {
                $stepFound = true;
                $viewName = str_replace('_', '-', $stepTablePrefix) . "-step-{$i}";

                return redirect()->route('student.' . $viewName, [
                    'step' => $i,
                    'caseId' => $studentCase->case_id
                ]);
            }
        }
        return redirect()->route('student.my-caseload')->with('info', 'All steps are completed.');
    }

    public function familyLawStepsPreDetail(Request $request)
    {

        $caseId = $request->query('caseId');
        $step = $request->query('step');

        $case = DB::table('family_law_cases')->where('id', $caseId)->first();

        if (!$case) {
            return redirect()->route('student.my-caseload')->with('error', 'Case not found.');
        }

        return view('student.family-law-step-' . $step, ['case' => $case, 'caseId' => $caseId]);
    }
}
