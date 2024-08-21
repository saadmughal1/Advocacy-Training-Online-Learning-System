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

        $studentCases = DB::table('students as s')
            ->join('student_cases as sc', 's.id', '=', 'sc.student_id')
            ->join('advisor_case_student as acs', 'acs.id', '=', 'sc.acsid')
            ->join('advisor_cases as ac', 'ac.id', '=', 'acs.advisor_case_id')
            ->join('advisors as a', 'a.id', '=', 'ac.advisor_id')
            ->leftJoin('early_bird_moot_cases as ebmc', function ($join) {
                $join->on('sc.advisor_case_id', '=', 'ebmc.id')
                     ->where('sc.case_type', '=', 'early_bird_moot');
            })
            ->leftJoin('family_law_cases as flc', function ($join) {
                $join->on('sc.advisor_case_id', '=', 'flc.id')
                     ->where('sc.case_type', '=', 'family_law');
            })
            ->where('s.id', $studentId)
            ->select(
                'a.id as advisor_id',
                'a.username as advisor_username',
                'sc.case_type',
                'ac.case_id as student_case_id',
                DB::raw('CASE 
                    WHEN sc.case_type = "early_bird_moot" THEN ebmc.case_name 
                    WHEN sc.case_type = "family_law" THEN flc.case_name 
                    ELSE NULL 
                END as case_name')
            )
            ->get();
        
        
        return view('student.my-caseload', ['cases' => $studentCases]);
    }

    public function insertFamilyLawStep1(Request $request)
    {

        $student_id = Auth::guard('student')->id();
        $case_id = $request->input('caseid');

        $request->validate([
            'dob' => 'nullable|date_format:Y-m-d',
            'spouse_dob' => 'nullable|date_format:Y-m-d',
            'marriage_date' => 'nullable|date_format:Y-m-d',
            'separation_date' => 'nullable|date_format:Y-m-d',
        ]);

        $data = $request->only([
            'full_name',
            'dob',
            'birth_place',
            'current_address',
            'residence_telephone',
            'mobile_telephone',
            'email',
            'employer',
            'job_title',
            'employer_address',
            'employer_telephone',
            'monthly_salary',
            'annual_salary',
            'length_of_employment',
            'education',
            'spouse_full_name',
            'spouse_dob',
            'spouse_birth_place',
            'spouse_social_security',
            'spouse_drivers_license',
            'spouse_current_address',
            'spouse_residence_telephone',
            'spouse_mobile_telephone',
            'spouse_email',
            'spouse_employer',
            'spouse_job_title',
            'spouse_employer_address',
            'spouse_employer_telephone',
            'spouse_monthly_salary',
            'spouse_annual_salary',
            'spouse_length_of_employment',
            'spouse_education',
            'marriage_date',
            'marriage_place',
            'separation_date',
            'name_insurance_company',
            'insurance_group_number',
            'insurance_party_responsible',
            'insurance_monthly_cost',
            'insurance_covered_by_parent_employment',
            'children_custody_dispute',
            'children_custody_holder',
            'special_needs',
            'religious_issues',
            'previous_marriages',
            'grounds_for_divorce',
            'retirement_pension_savings_plans',
            'spouse_retirement_pension_savings_plans',
        ]);

        if ($request->hasFile('file_attachment')) {
            $file = $request->file('file_attachment');
            $filePath = $file->store('documents', 'public');
            $data['file_attachment'] = $filePath;
        }

        $children = [];
        if ($request->has('child')) {
            foreach ($request->child as $childData) {
                if (!empty($childData['name'])) {
                    $children[] = [
                        'sr' => $childData['sr'],
                        'name' => $childData['name'],
                        'sex' => $childData['sex'],
                        'dob' => $childData['dob'],
                        'pob' => $childData['pob'],
                        'residence' => $childData['residence'],
                    ];
                }
            }
        }

        $previousChildren = [];
        if ($request->has('previousChild')) {
            foreach ($request->previousChild as $previousChildData) {
                if (!empty($previousChildData['name'])) {
                    $previousChildren[] = [
                        'sr' => $previousChildData['sr'],
                        'name' => $previousChildData['name'],
                        'sex' => $previousChildData['sex'],
                        'dob' => $previousChildData['dob'],
                        'pob' => $previousChildData['pob'],
                        'residence' => $previousChildData['residence'],
                    ];
                }
            }
        }

        $caseGrounds = $request->has('caseGround') ? $request->caseGround : [];

        $data['case_ground'] = json_encode($caseGrounds);
        $data['children_details'] = json_encode($children);
        $data['children_from_previous_relationships'] = json_encode($previousChildren);
        $data['student_id'] = $student_id;
        $data['case_id'] = $case_id;
        $data['created_at'] = now();
        $data['updated_at'] = now();

        DB::table('family_law_step_1')->insert($data);

        session()->flash('message', 'Form Submitted.');

        return redirect()->route('student.my-caseload');
    }


    public function startCase(Request $request)
    {
        $caseId = $request->query('caseId');
        $caseType = $request->query('caseType');

        $studentId = Auth::guard('student')->id();

        $stepTablePrefix = $caseType === 'family_law' ? 'family_law' : 'early_bird_moot';

        $steps = [
            'family_law' => 14,
            'early_bird_moot' => 2,
        ];

        $numberOfSteps = $steps[$stepTablePrefix];

        $stepFound = false;
        for ($i = 1; $i <= $numberOfSteps; $i++) {
            $tableName = "{$stepTablePrefix}_step_{$i}";

            $dataExists = DB::table($tableName)
                ->where('student_id', $studentId)
                ->where('case_id', $caseId)
                ->first();

            $viewName = str_replace('_', '-', $stepTablePrefix) . "-step-{$i}";

            if (!$dataExists) {
                return redirect()->route('student.' . $viewName, [
                    'step' => $i,
                    'caseId' => $caseId,
                    'caseType' => $caseType,
                    'studentId' => $studentId
                ]);
            }

            if ($dataExists->status == 0) {
                return redirect()->route('student.' . $viewName, [
                    'step' => $i,
                    'caseId' => $caseId,
                    'caseType' => $caseType,
                    'studentId' => $studentId,
                    'update' => true
                ])->with('data', $dataExists);
            }

            // If data exists and status is 1, continue to the next step
        }


        return redirect()->route('student.my-caseload')->with('info', 'All steps are completed.');
    }




    public function familyLawStepsPreDetail(Request $request)
    {
        $caseId = $request->query('caseId');
        $step = $request->query('step');
        $caseType = $request->query('caseType');
        $studentId = $request->query('studentId');

        $case = DB::table('family_law_cases')->where('id', $caseId)->first();

        if (!$case) {
            return redirect()->route('student.my-caseload')->with('error', 'Case not found.');
        }

        if ($request->query('update')) {
            $update = $request->query('update');


            $tableName = "{$caseType}_step_{$step}";

            $dataExists = DB::table($tableName)
                ->where('student_id', $studentId)
                ->where('case_id', $caseId)
                ->first();

            // return $dataExists;
            return view('student.family-law-step-' . $step, ['case' => $case, 'caseId' => $caseId, 'caseType' => $caseType])->with('data', $dataExists);;
        }

        return view('student.family-law-step-' . $step, ['case' => $case, 'caseId' => $caseId, 'caseType' => $caseType]);
    }





    public function updateFamilyLawStep1() {}
}
