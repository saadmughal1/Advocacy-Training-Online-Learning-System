<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function createAdvisorAccount(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|unique:advisors,username',
            'email' => 'required|string|email',
            'phno' => 'required|string',
            'password' => 'required|alpha_num:ascii',
        ]);

        DB::table('advisors')->insert([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phno'],
            'password' => $validatedData['password'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('message', 'Advisor account created successfully.');
    }
    public function viewAdvisorAccounts()
    {
        $advisors = DB::table('advisors')->get();
        return view('admin.view-advisors', ['advisors' => $advisors]);
    }
    public function deleteAdvisor(string $id)
    {
        $deleted = DB::table('advisors')->where('id', $id)->delete();

        if ($deleted) {
            return redirect()->route('admin.view-advisors')->with('message', 'Advisor deleted successfully.');
        } else {
            return redirect()->route('admin.view-advisors')->with(['error' => 'Advisor not found.']);
        }
    }
    public function editAdvisorAccount(string $id)
    {
        $advisor = DB::table('advisors')->where('id', $id)->first();

        if (!$advisor) {
            return redirect()->route('admin.view-advisors')->with('error', 'Advisor not found.');
        }

        return view('admin.edit-advisor-account', ['advisor' => $advisor]);
    }
    public function saveEditAdvisorAccount(Request $request, string $id)
    {

        $validatedData = $request->validate([
            'username' => 'required|string|unique:advisors,username,' . $id,
            'email' => 'required|string|email',
            'phno' => 'required|string',
            'password' => 'required|alpha_num',
        ]);

        $updateData = [
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phno'],
            'password' => $validatedData['password'],
        ];

        DB::table('advisors')
            ->where('id', $id)
            ->update($updateData);

        return redirect()->route('admin.view-advisors')
            ->with('message', 'Advisor account updated successfully.');
    }
    public function createStudentAccount(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|unique:students,username',
            'email' => 'required|string|email',
            'phno' => 'required|string',
            'password' => 'required|alpha_num:ascii',
        ]);

        DB::table('students')->insert([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phno'],
            'password' => $validatedData['password'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('message', 'Student account created successfully.');
    }
    public function viewStudentAccounts()
    {
        $students = DB::table('students')->get();
        return view('admin.view-students', ['students' => $students]);
    }
    public function deleteStudent(string $id)
    {
        $deleted = DB::table('students')->where('id', $id)->delete();

        if ($deleted) {
            return redirect()->route('admin.view-students')->with('message', 'Student deleted successfully.');
        } else {
            return redirect()->route('admin.view-students')->with(['error' => 'Student not found.']);
        }
    }
    public function editStudentAccount(string $id)
    {
        $student = DB::table('students')->where('id', $id)->first();

        if (!$student) {
            return redirect()->route('admin.view-students')->with('error', 'Student not found.');
        }

        return view('admin.edit-student-account', ['student' => $student]);
    }
    public function saveEditStudentAccount(Request $request, string $id)
    {

        $validatedData = $request->validate([
            'username' => 'required|string|unique:students,username,' . $id,
            'email' => 'required|string|email',
            'phno' => 'required|string',
            'password' => 'required|alpha_num',
        ]);

        $updateData = [
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phno'],
            'password' => $validatedData['password'],
        ];

        DB::table('students')
            ->where('id', $id)
            ->update($updateData);

        return redirect()->route('admin.view-students')
            ->with('message', 'Student account updated successfully.');
    }
    public function initiateFamilyLawCase(Request $request)
    {
        $rules = [
            'case-name' => 'required|string|max:255',
            'step-1-introduction' => 'required|string',
            'step-1-instructions' => 'required|string',
            'step-1-video' => 'nullable|file|mimes:mp4,avi,mpg|max:20480',
            'step-2-introduction' => 'required|string',
            'step-2-instructions' => 'required|string',
            'step-3-introduction' => 'required|string',
            'step-3-instructions' => 'required|string',
            'step-4-introduction' => 'required|string',
            'step-4-instructions' => 'required|string',
            'step-5-introduction' => 'required|string',
            'step-5-instructions' => 'required|string',
            'step-6-introduction' => 'required|string',
            'step-6-instructions' => 'required|string',
            'step-7-introduction' => 'required|string',
            'step-7-instructions' => 'required|string',
            'step-7-video' => 'nullable|file|mimes:mp4,avi,mpg|max:20480',
            'step-8-introduction' => 'required|string',
            'step-8-instructions' => 'required|string',
            'step-9-introduction' => 'required|string',
            'step-9-instructions' => 'required|string',
            'step-9-video' => 'nullable|file|mimes:mp4,avi,mpg|max:20480',
            'step-10-introduction' => 'required|string',
            'step-10-instructions' => 'required|string',
            'step-10-video' => 'nullable|file|mimes:mp4,avi,mpg|max:20480',
            'step-11-introduction' => 'required|string',
            'step-11-instructions' => 'required|string',
            'step-11-video' => 'nullable|file|mimes:mp4,avi,mpg|max:20480',
            'step-12-introduction' => 'required|string',
            'step-12-instructions' => 'required|string',
            'step-12-video' => 'nullable|file|mimes:mp4,avi,mpg|max:20480',
            'step-13-introduction' => 'required|string',
            'step-13-instructions' => 'required|string',
            'step-14-introduction' => 'required|string',
            'step-14-instructions' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('case_type', 'family-law');
        }

        $step1VideoPath = $request->file('step-1-video') ? $request->file('step-1-video')->store('videos') : null;
        $step7VideoPath = $request->file('step-7-video') ? $request->file('step-7-video')->store('videos') : null;
        $step9VideoPath = $request->file('step-9-video') ? $request->file('step-9-video')->store('videos') : null;
        $step10VideoPath = $request->file('step-10-video') ? $request->file('step-10-video')->store('videos') : null;
        $step11VideoPath = $request->file('step-11-video') ? $request->file('step-11-video')->store('videos') : null;
        $step12VideoPath = $request->file('step-12-video') ? $request->file('step-12-video')->store('videos') : null;

        DB::table('family_law_cases')->insert([
            'case_name' => $request->input('case-name'),
            'step_1_introduction' => $request->input('step-1-introduction'),
            'step_1_instructions' => $request->input('step-1-instructions'),
            'step_1_video' => $step1VideoPath,
            'step_2_introduction' => $request->input('step-2-introduction'),
            'step_2_instructions' => $request->input('step-2-instructions'),
            'step_3_introduction' => $request->input('step-3-introduction'),
            'step_3_instructions' => $request->input('step-3-instructions'),
            'step_4_introduction' => $request->input('step-4-introduction'),
            'step_4_instructions' => $request->input('step-4-instructions'),
            'step_5_introduction' => $request->input('step-5-introduction'),
            'step_5_instructions' => $request->input('step-5-instructions'),
            'step_6_introduction' => $request->input('step-6-introduction'),
            'step_6_instructions' => $request->input('step-6-instructions'),
            'step_7_introduction' => $request->input('step-7-introduction'),
            'step_7_instructions' => $request->input('step-7-instructions'),
            'step_7_video' => $step7VideoPath,
            'step_8_introduction' => $request->input('step-8-introduction'),
            'step_8_instructions' => $request->input('step-8-instructions'),
            'step_9_introduction' => $request->input('step-9-introduction'),
            'step_9_instructions' => $request->input('step-9-instructions'),
            'step_9_video' => $step9VideoPath,
            'step_10_introduction' => $request->input('step-10-introduction'),
            'step_10_instructions' => $request->input('step-10-instructions'),
            'step_10_video' => $step10VideoPath,
            'step_11_introduction' => $request->input('step-11-introduction'),
            'step_11_instructions' => $request->input('step-11-instructions'),
            'step_11_video' => $step11VideoPath,
            'step_12_introduction' => $request->input('step-12-introduction'),
            'step_12_instructions' => $request->input('step-12-instructions'),
            'step_12_video' => $step12VideoPath,
            'step_13_introduction' => $request->input('step-13-introduction'),
            'step_13_instructions' => $request->input('step-13-instructions'),
            'step_14_introduction' => $request->input('step-14-introduction'),
            'step_14_instructions' => $request->input('step-14-instructions'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()
            ->with('success', 'Case initiated successfully!');
    }
    public function initiateEarlyBirdMoot(Request $request)
    {
        $rules = [
            'case-name' => 'required|string|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('case_type', 'early-bird-moot');
        }

        DB::table('early_bird_moot_cases')->insert([
            'case_name' => $request->input('case-name'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()
            ->with('success', 'Case initiated successfully!');
    }
    public function getCasesByType(Request $request)
    {
        $request->validate([
            'case_type' => 'required|string|max:255',
        ]);

        $caseType = $request->input('case_type');

        if ($caseType === 'family-law') {
            $cases = DB::table('family_law_cases')->get();
            return response()->json($cases);
        } else if ($caseType === 'early-bird-moot') {
            $cases = DB::table('early_bird_moot_cases')->get();
            return response()->json($cases);
        } else {
            return response()->json([
                'message' => 'Invalid case type',
            ], 400);
        }
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::guard("admin")->attempt($credentials)) {
            return redirect()->route('admin.home');
        }
        return redirect()->back()->with('error', 'Invalid Username or password');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    public function getAdvisorsByCase(Request $request)
    {
        $caseId = $request->input('case_id');
        $assignedAdvisorIds = DB::table('advisor_cases')->where('case_id', $caseId)->pluck('advisor_id');
        $advisors = DB::table('advisors')->whereNotIn('id', $assignedAdvisorIds)->get();
        return response()->json($advisors);
    }
    public function getStudents()
    {
        $students = DB::table('students')->get();
        return response()->json($students);
    }
    public function assignCase(Request $request)
    {
        $request->validate([
            'advisor_id' => 'required|exists:advisors,id',
            'case_id' => 'required|integer',
            'case_type' => 'required|string|in:family_law,early_bird_moot',
            'students' => 'required|array',
            'students.*' => 'exists:students,id'
        ]);

        $advisorId = $request->input('advisor_id');
        $caseId = $request->input('case_id');
        $caseType = $request->input('case_type');
        $students = $request->input('students');

        $caseTable = $this->getCaseTableName($caseType);

        if (!Schema::hasTable($caseTable)) {
            return response()->json(['success' => false, 'message' => 'Invalid case type.']);
        }

        $caseExists = DB::table($caseTable)->where('id', $caseId)->exists();
        if (!$caseExists) {
            return response()->json(['success' => false, 'message' => 'Case not found.']);
        }

        $advisorCaseId = DB::table('advisor_cases')->insertGetId([
            'advisor_id' => $advisorId,
            'case_id' => $caseId,
            'case_type' => $caseType,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        foreach ($students as $studentId) {
            DB::table('advisor_case_student')->insert([
                'advisor_case_id' => $advisorCaseId,
                'student_id' => $studentId,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Case assigned successfully.']);
    }
    private function getCaseTableName($caseType)
    {
        switch ($caseType) {
            case 'family_law':
                return 'family_law_cases';
            case 'early_bird_moot':
                return 'early_bird_moot_cases';
            default:
                throw new \InvalidArgumentException('Invalid case type.');
        }
    }
    public function displayCases()
    {
        $earlyBirdMootCases = DB::table('early_bird_moot_cases')
            ->select('case_name')
            ->get()
            ->map(function ($case) {
                return [
                    'case_name' => $case->case_name,
                    'case_type' => 'Early Bird Moot'
                ];
            });
        $familyLawCases = DB::table('family_law_cases')
            ->select('case_name')
            ->get()
            ->map(function ($case) {
                return [
                    'case_name' => $case->case_name,
                    'case_type' => 'Family Law'
                ];
            });
        $cases = $earlyBirdMootCases->merge($familyLawCases);
        return view('admin.display-cases', compact('cases'));
    }

    public function advisorCaseLoad()
    {
        // Retrieve all advisors with their assigned cases and case names
        $advisorCases = DB::table('advisors')
            ->join('advisor_cases', 'advisors.id', '=', 'advisor_cases.advisor_id')
            ->leftJoin('family_law_cases', function ($join) {
                $join->on('advisor_cases.case_id', '=', 'family_law_cases.id')
                    ->where('advisor_cases.case_type', 'family_law');
            })
            ->leftJoin('early_bird_moot_cases', function ($join) {
                $join->on('advisor_cases.case_id', '=', 'early_bird_moot_cases.id')
                    ->where('advisor_cases.case_type', 'early_bird_moot');
            })
            ->select(
                'advisors.id as advisor_id',
                'advisors.username',
                'advisor_cases.case_id',
                'advisor_cases.case_type',
                DB::raw('COALESCE(family_law_cases.case_name, early_bird_moot_cases.case_name) as case_name')
            )
            ->get();

        return view('admin.advisor-caseload', ['advisorCases' => $advisorCases]);
    }
}
