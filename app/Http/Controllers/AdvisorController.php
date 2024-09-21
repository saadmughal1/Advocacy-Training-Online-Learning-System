<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use ZipArchive;

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

        $cases = $advisorCases->filter(function ($case) {
            $unassignedStudentsCount = DB::table('advisor_case_student')
                ->where('advisor_case_id', $case->id)
                ->whereNotIn('student_id', function ($query) use ($case) {
                    $query->select('student_id')
                        ->from('student_cases')
                        ->where('advisor_case_id', $case->id);
                })
                ->count();

            if ($unassignedStudentsCount > 0) {
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
            }

            return null;
        })->filter();

        return view('advisor.advisor-caseload', ['cases' => $cases]);
    }
    public function studentCaseLoad()
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

        return view('advisor.student-caseload', ['cases' => $cases]);
    }
    public function displayStudents(Request $request)
    {
        $advisorId = Auth::guard('advisor')->id();
        $caseId = $request->query('case_id');
        $caseName = $request->query('case_name');
        $caseType = $request->query('case_type');
        $advisor_case_table_id = $request->query('advisor_case_table_id');

        $students = DB::table('advisor_case_student as acs')
            ->join('advisor_cases as ac', function ($join) {
                $join->on('acs.advisor_case_id', '=', 'ac.id')
                    ->on('acs.advisor_id', '=', 'ac.advisor_id');
            })
            ->join('students as s', 's.id', '=', 'acs.student_id')
            ->where('ac.case_type', $caseType)
            ->where('ac.case_id', $caseId)
            ->where('ac.advisor_id', $advisorId)
            ->whereNotIn('acs.id', function ($query) use ($caseId, $caseType) {
                $query->select('sc.acsid')
                    ->from('student_cases as sc')
                    ->where('sc.advisor_case_id', $caseId)
                    ->where('sc.case_type', $caseType);
            })
            ->select('s.*', 'acs.id as acsid')
            ->get();

        return view('advisor.view-students', [
            'caseName' => $caseName,
            'studentsNotInStudentCases' => $students
        ]);
    }
    public function assignStudents(Request $request)
    {
        // Validate the request
        $request->validate([
            'case_id' => 'required|integer',
            'case_name' => 'required|string',
            'students' => 'required|array',
            'case_type' => 'required|string'
        ]);

        // Retrieve inputs
        $caseId = $request->input('case_id');
        $caseName = $request->input('case_name');
        $caseType = $request->input('case_type');
        $students = $request->input('students');

        // Check if the case exists
        $caseExists = DB::table('advisor_cases')->where('case_id', $caseId)->exists();
        if (!$caseExists) {
            return redirect()->back()->with('error', 'Invalid Case ID');
        }

        // Extract student_ids and acsids
        $studentsData = [];
        foreach ($students as $studentData) {
            list($studentId, $acsid) = explode(':', $studentData);
            $studentsData[] = [
                'student_id' => $studentId,
                'acsid' => $acsid
            ];
        }

        // Validate student IDs
        $validStudentIds = DB::table('students')->whereIn('id', array_column($studentsData, 'student_id'))->pluck('id')->toArray();
        $providedStudentIds = array_column($studentsData, 'student_id');

        if (count(array_intersect($validStudentIds, $providedStudentIds)) !== count($providedStudentIds)) {
            return redirect()->back()->with('error', 'One or more student IDs are invalid');
        }

        // Insert or update student_cases with acsid
        foreach ($studentsData as $studentData) {
            DB::table('student_cases')->insert([
                'student_id' => $studentData['student_id'],
                'advisor_case_id' => $caseId,
                'case_type' => $caseType,
                'acsid' => $studentData['acsid'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        return redirect()->route('advisor.view-students', ['case_id' => $caseId, 'case_name' => $caseName, 'case_type' => $caseType])
            ->with('success', 'Students assigned successfully');
    }
    public function getAssignedStudentsByCaseId(Request $request)
    {
        $caseType = $request->query('caseType');
        $caseId = $request->query('caseId');
        $advisorId = Auth::guard('advisor')->id();

        $students = DB::table('advisor_cases as ac')
            ->join('advisor_case_student as acs', 'acs.advisor_case_id', '=', 'ac.id')
            ->join('students as s', 's.id', '=', 'acs.student_id')
            ->where('ac.advisor_id', $advisorId)
            ->where('ac.case_type', $caseType)
            ->where('ac.case_id', $caseId)
            ->whereIn('acs.id', function ($query) use ($caseId, $caseType) {
                $query->select('sc.acsid')
                    ->from('student_cases as sc')
                    ->where('sc.advisor_case_id', $caseId)
                    ->where('sc.case_type', $caseType);
            })
            ->select('s.*', 'acs.id as acsid')
            ->get();


        return view('advisor.students-in-case', ['students' => $students]);
    }
    public function getStudentCaseFeedback(Request $request)
    {

        $caseType = $request->input('caseType');
        $caseId = $request->input('caseId');
        $sid = $request->input('sid');
        $advisorId = Auth::guard('advisor')->id();


        $steps = [
            'family_law' => 14,
            'early_bird_moot' => 2
        ];

        $numberOfSteps = $steps[$caseType] ?? 0;

        $response = [];


        if ($caseType === 'family_law') {

            $caseDetails = DB::table('family_law_cases')
                ->where('id', $caseId)
                ->first();

            if (!$caseDetails) {
                return response()->json(['error' => 'Case not found'], 404);
            }

            for ($i = 1; $i <= $numberOfSteps; $i++) {
                $tableName = "{$caseType}_step_{$i}";

                $stepData = DB::table($tableName)
                    ->where('student_id', $sid)
                    ->where('case_id', $caseId)
                    ->where('aid', $advisorId)
                    ->first();

                $stepDetail = [
                    'available' => $stepData ? true : false,
                    'status' => $stepData ? $stepData->status : 0,
                    'form-data' => $stepData
                ];

                $stepDetail['predetails'] = [
                    'introduction' => $caseDetails->{'step_' . $i . '_introduction'} ?? 'No introduction available',
                    'instructions' => $caseDetails->{'step_' . $i . '_instructions'} ?? 'No instructions available',
                    'video' => $caseDetails->{'step_' . $i . '_video'} ?? 'No video available'
                ];

                $response["step{$i}"] = $stepDetail;
            }

            // return $response;
            return view('advisor.family-law-feedback', ['response' => $response]);
        } elseif ($caseType === 'early_bird_moot') {

            $caseDetails = DB::table('early_bird_moot_cases')
                ->where('id', $caseId)
                ->first();

            if (!$caseDetails) {
                return response()->json(['error' => 'Case not found'], 404);
            }

            for ($i = 1; $i <= $numberOfSteps; $i++) {
                $tableName = "{$caseType}_step_{$i}";

                $stepData = DB::table($tableName)
                    ->where('student_id', $sid)
                    ->where('case_id', $caseId)
                    ->first();

                $stepDetail = [
                    'available' => $stepData ? true : false,
                    'status' => $stepData ? $stepData->status : 0,
                    'data' => $stepData
                ];

                $stepDetail['predetails'] = [
                    'introduction' => $caseDetails->{'step_' . $i . '_introduction'} ?? 'No introduction available',
                    'instructions' => $caseDetails->{'step_' . $i . '_instructions'} ?? 'No instructions available',
                    'video' => $caseDetails->{'step_' . $i . '_video'} ?? 'No video available'
                ];

                $response["step{$i}"] = $stepDetail;
            }

            return view('advisor.early-bird-moot-feedback', ['response' => $response]);
        } else {
            return response()->json(['error' => 'Invalid case type'], 400);
        }
    }
    public function addFeedbackMarksFamilyLawCase(Request $request)
    {
        $fid = $request->query('fid');
        $marks = $request->query('marks');
        $feedback = $request->query('feedback');
        $step = $request->query('step');
        $tableName = 'family_law_step_' . $step;

        DB::table($tableName)
            ->where('id', $fid)
            ->update([
                'marks' => $marks,
                'feedback' => $feedback,
            ]);

        return redirect()->back()->with('status', 'Feedback and marks updated successfully.');
    }
    public function nextStepFamilyLaw(Request $request)
    {
        $fid = $request->query('fid');
        $step = $request->query('step');
        $tableName = 'family_law_step_' . $step;

        DB::table($tableName)
            ->where('id', $fid)
            ->update([
                'status' => 1
            ]);

        return redirect()->back()->with('status', '');
    }
    public function downloadFamilyLawStepMultipleFilesInZip(Request $request)
    {
        $fileAttachments = $request->input('file_attachment');

        if (empty($fileAttachments)) {
            return back()->with('error', 'No files to download.');
        }

        $fileNames = explode(',', $fileAttachments);

        $zip = new ZipArchive;
        $zipFileName = 'family-law-data.zip';
        $zipPath = storage_path('app/public/' . $zipFileName);

        if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {
            foreach ($fileNames as $fileName) {
                $filePath = public_path('storage/' . $fileName);

                if (file_exists($filePath)) {
                    $nameInZip = basename($filePath);
                    $zip->addFile($filePath, $nameInZip);
                }
            }
            $zip->close();
        } else {
            return back()->with('error', 'Failed to create ZIP file.');
        }

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }


    public function query(Request $request)
    {
        $sid = $request->input('sid');
        $aid = Auth::guard('advisor')->id();

        $messages = DB::table('messages')
            ->where('advisor_id', $aid)
            ->where('student_id', $sid)
            ->get();

        if ($messages->isEmpty()) {
            DB::table('messages')->insert([
                'advisor_id' => $aid,
                'student_id' => $sid,
                'student_message' => '',
                'advisor_message' => '',
                'created_at' => now(),      // timestamps
                'updated_at' => now(),
            ]);
        }

        return view('advisor.query', compact('messages'));
    }
    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        $sid = $request->input('sid');
        $aid = Auth::guard('advisor')->id();

        DB::table('messages')
            ->where('advisor_id', $aid)
            ->where('student_id', $sid)
            ->update([
                'advisor_message' => $message,
                'updated_at' => now(),
            ]);
        Session::flash('message', 'Message sent successfully!');
        return redirect()->back();
    }
}
