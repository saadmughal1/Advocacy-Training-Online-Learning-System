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

    public function insertOrUpdateFamilyLawStep1(Request $request)
    {

        // return $request;
        $student_id = Auth::guard('student')->id();
        $fid = $request->input('fid');
        $caseid = $request->input('caseid');

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
            'aid'
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
        $data['case_id'] = $caseid;
        $data['updated_at'] = now();


        if ($fid) {
            DB::table('family_law_step_1')
                ->where('id', $fid)
                ->update($data);
            session()->flash('message', 'Form Updated.');
        } else {
            $data['created_at'] = now();
            DB::table('family_law_step_1')->insert($data);
            session()->flash('message', 'Form Submitted.');
        }


        return redirect()->route('student.my-caseload');
    }

    public function insertOrUpdateFamilyLawStep2(Request $request)
    {
        $student_id = Auth::guard('student')->id();
        $fid = $request->input('fid');
        $caseid = $request->input('caseid');

        $request->validate([
            'group_name' => 'nullable|string|max:255',
            'plaintiff_name' => 'nullable|string|max:255',
            'defendant_name' => 'nullable|string|max:255',
            'wife_residence' => 'nullable|string|max:255',
            'number_of_children' => 'nullable|integer',
            'wife_income' => 'nullable|numeric',
            'husband_income' => 'nullable|numeric',
            'clash_reason' => 'nullable|string|max:255',
            'wife_prayers' => 'nullable|string',
        ]);

        $data = $request->only([
            'group_name',
            'plaintiff_name',
            'defendant_name',
            'wife_residence',
            'number_of_children',
            'wife_income',
            'husband_income',
            'clash_reason',
            'wife_prayers',
            'aid'
        ]);

        if ($request->hasFile('file_attachment')) {
            $file = $request->file('file_attachment');
            $filePath = $file->store('documents', 'public');
            $data['file_attachment'] = $filePath;
        }

        $data['student_id'] = $student_id;
        $data['case_id'] = $caseid;
        $data['updated_at'] = now();

        if ($fid) {
            DB::table('family_law_step_2')
                ->where('id', $fid)
                ->update($data);
            session()->flash('message', 'Form Updated.');
        } else {
            $data['created_at'] = now();
            DB::table('family_law_step_2')->insert($data);
            session()->flash('message', 'Form Submitted.');
        }

        return redirect()->route('student.my-caseload');
    }

    public function insertOrUpdateFamilyLawStep3(Request $request)
    {
        $student_id = Auth::guard('student')->id();
        $fid = $request->input('fid');
        $caseid = $request->input('caseid');

        $request->validate([
            'group_name' => 'nullable|string|max:255',
            'dissolution_grounds' => 'nullable|string|max:255',
            'enactments_provisions' => 'nullable|string|max:255',
            'rules_provisions' => 'nullable|string|max:255',
            'relevant_caselaw' => 'nullable|string',
        ]);

        $data = $request->only([
            'group_name',
            'dissolution_grounds',
            'enactments_provisions',
            'rules_provisions',
            'relevant_caselaw',
            'aid'
        ]);

        if ($request->hasFile('file_attachment')) {
            $file = $request->file('file_attachment');
            $filePath = $file->store('documents', 'public');
            $data['file_attachment'] = $filePath;
        } else if ($request->input('old_file')) {
            $data['file_attachment'] = $request->input('old_file');
        }

        $data['student_id'] = $student_id;
        $data['case_id'] = $caseid;
        $data['updated_at'] = now();

        if ($fid) {
            DB::table('family_law_step_3')
                ->where('id', $fid)
                ->update($data);
            session()->flash('message', 'Form Updated.');
        } else {
            $data['created_at'] = now();
            DB::table('family_law_step_3')->insert($data);
            session()->flash('message', 'Form Submitted.');
        }

        return redirect()->route('student.my-caseload');
    }

    public function insertOrUpdateFamilyLawStep4(Request $request)
    {
        $student_id = Auth::guard('student')->id();
        $fid = $request->input('fid');
        $caseid = $request->input('caseid');

        $request->validate([
            'case_title' => 'nullable|string|max:255',
            'citation_details' => 'nullable|string',
            'headnote_relevant_laws' => 'nullable|string',
            'case_facts' => 'nullable|string',
            'court_verdict' => 'nullable|string',
            'additional_info' => 'nullable|string',
        ]);

        $data = $request->only([
            'case_title',
            'citation_details',
            'headnote_relevant_laws',
            'case_facts',
            'court_verdict',
            'additional_info',
            'aid'
        ]);

        if ($request->hasFile('file_attachment')) {
            $file = $request->file('file_attachment');
            $filePath = $file->store('documents', 'public');
            $data['file_attachment'] = $filePath;
        } else if ($request->input('old_file')) {
            $data['file_attachment'] = $request->input('old_file');
        }

        $data['student_id'] = $student_id;
        $data['case_id'] = $caseid;
        $data['updated_at'] = now();

        if ($fid) {
            DB::table('family_law_step_4')
                ->where('id', $fid)
                ->update($data);
            session()->flash('message', 'Form Updated.');
        } else {
            $data['created_at'] = now();
            DB::table('family_law_step_4')->insert($data);
            session()->flash('message', 'Form Submitted.');
        }

        return redirect()->route('student.my-caseload');
    }

    public function insertOrUpdateFamilyLawStep5(Request $request)
    {
        $student_id = Auth::guard('student')->id();
        $fid = $request->input('fid');
        $caseid = $request->input('caseid');

        $request->validate([
            'court_name' => 'nullable|string',
            'plaintiff_details' => 'nullable|string',
            'defendant_details' => 'nullable|string',
            'plaint_subject' => 'nullable|string',
            'cause_of_action' => 'nullable|string',
            'territorial_jurisdiction' => 'nullable|string',
            'court_fee' => 'nullable|integer',
            'relief_claimed' => 'nullable|string',
            'witnesses_count' => 'nullable|string',
            'witnesses_details' => 'nullable|string',
        ]);

        $data = $request->only([
            'court_name',
            'plaintiff_details',
            'defendant_details',
            'plaint_subject',
            'cause_of_action',
            'territorial_jurisdiction',
            'court_fee',
            'relief_claimed',
            'witnesses_count',
            'witnesses_details',
            'aid'
        ]);

        if ($request->hasFile('file_attachment')) {
            $files = $request->file('file_attachment');
            $fileNames = [];

            foreach ($files as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('documents', $filename, 'public');
                $fileNames[] = $filePath;
            }

            $data['file_attachment'] = implode(',', $fileNames);
        } else if ($request->input('old_file')) {
            $data['file_attachment'] = $request->input('old_file');
        }


        $data['student_id'] = $student_id;
        $data['case_id'] = $caseid;
        $data['updated_at'] = now();

        if ($fid) {
            // Update existing record
            DB::table('family_law_step_5')
                ->where('id', $fid)
                ->update($data);
            session()->flash('message', 'Form Updated.');
        } else {
            // Insert new record
            $data['created_at'] = now();
            DB::table('family_law_step_5')->insert($data);
            session()->flash('message', 'Form Submitted.');
        }

        return redirect()->route('student.my-caseload');
    }


    public function insertOrUpdateFamilyLawStep6(Request $request)
    {
        $student_id = Auth::guard('student')->id();
        $fid = $request->input('fid');
        $caseid = $request->input('caseid');

        // Validate request data
        $request->validate([
            'court_name' => 'nullable|string',
            'plaintiff_details' => 'nullable|string',
            'defendant_details' => 'nullable|string',
            'written_statement_subject' => 'nullable|string',
            'new_facts' => 'nullable|string',
            'denials' => 'nullable|string',
            'cause_of_action' => 'nullable|string',
            'territorial_jurisdiction' => 'nullable|string',
            'court_fee' => 'nullable|numeric',
            'defendant_relief' => 'nullable|string',
            'verification' => 'nullable|string',
            'witnesses_number' => 'nullable|string',
            'witnesses_details' => 'nullable|string',
        ]);

        // Prepare data for insertion/updating
        $data = $request->only([
            'court_name',
            'plaintiff_details',
            'defendant_details',
            'written_statement_subject',
            'new_facts',
            'denials',
            'cause_of_action',
            'territorial_jurisdiction',
            'court_fee',
            'defendant_relief',
            'verification',
            'witnesses_number',
            'witnesses_details',
            'aid'
        ]);

        if ($request->hasFile('file_attachment')) {
            $files = $request->file('file_attachment');
            $fileNames = [];

            foreach ($files as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('documents', $filename, 'public');
                $fileNames[] = $filePath;
            }

            $data['file_attachment'] = implode(',', $fileNames);
        } else if ($request->input('old_file')) {
            $data['file_attachment'] = $request->input('old_file');
        }

        // Add student_id and case_id to the data array
        $data['student_id'] = $student_id;
        $data['case_id'] = $caseid;
        $data['updated_at'] = now();

        if ($fid) {
            // Update existing record
            DB::table('family_law_step_6')
                ->where('id', $fid)
                ->update($data);
            session()->flash('message', 'Form Updated.');
        } else {
            // Insert new record
            $data['created_at'] = now();
            DB::table('family_law_step_6')->insert($data);
            session()->flash('message', 'Form Submitted.');
        }

        return redirect()->route('student.my-caseload');
    }

    public function insertOrUpdateFamilyLawStep7(Request $request)
    {
        $student_id = Auth::guard('student')->id();
        $fid = $request->input('fid');
        $caseid = $request->input('caseid');

        $request->validate([
            'reconciliator_intro' => 'nullable|string',
            'confidentiality_assurance' => 'nullable|string',
            'individual_session' => 'nullable|string',
            'joint_session' => 'nullable|string',
            'neutrality_impartiality' => 'nullable|string',
            'change_positions' => 'nullable|string',
            'reach_suggestions' => 'nullable|string',
            'finalize_suggestions' => 'nullable|string',
            'reach_agreement' => 'nullable|string',
        ]);

        $data = $request->only([
            'reconciliator_intro',
            'confidentiality_assurance',
            'individual_session',
            'joint_session',
            'neutrality_impartiality',
            'change_positions',
            'reach_suggestions',
            'finalize_suggestions',
            'reach_agreement',
            'aid'
        ]);

        if ($request->hasFile('file_attachment')) {
            $file = $request->file('file_attachment');
            $filePath = $file->store('documents', 'public');
            $data['file_attachment'] = $filePath;
        } else if ($request->input('old_file')) {
            $data['file_attachment'] = $request->input('old_file');
        }

        $data['student_id'] = $student_id;
        $data['case_id'] = $caseid;
        $data['updated_at'] = now();

        if ($fid) {
            DB::table('family_law_step_7')
                ->where('id', $fid)
                ->update($data);
            session()->flash('message', 'Form Updated.');
        } else {
            $data['created_at'] = now();
            DB::table('family_law_step_7')->insert($data);
            session()->flash('message', 'Form Submitted.');
        }

        return redirect()->route('student.my-caseload');
    }

    public function insertOrUpdateFamilyLawStep8(Request $request)
    {

        $student_id = Auth::guard('student')->id();
        $fid = $request->input('fid');
        $caseid = $request->input('caseid');

        $data = $request->only([
            'aid'
        ]);


        if ($request->hasFile('file_attachment')) {
            $file = $request->file('file_attachment');
            $filePath = $file->store('documents', 'public');
            $data['file_attachment'] = $filePath;
        }

        $issue_law_data = [];
        if ($request->has('issue_law')) {
            foreach ($request->issue_law as $issueLawData) {
                if (!empty($issueLawData['law']) && !empty($issueLawData['prove'])) {
                    $issue_law_data[] = [
                        'law' => $issueLawData['law'],
                        'prove' => $issueLawData['prove'],
                    ];
                }
            }
        }


        $issue_fact_data = [];
        if ($request->has('issue_fact')) {
            foreach ($request->issue_fact as $issueFactData) {
                if (!empty($issueFactData['fact']) && !empty($issueFactData['prove'])) {
                    $issue_fact_data[] = [
                        'fact' => $issueFactData['fact'],
                        'prove' => $issueFactData['prove'],
                    ];
                }
            }
        }

        $data['issue_law'] = json_encode($issue_law_data);
        $data['issue_fact'] = json_encode($issue_fact_data);
        $data['student_id'] = $student_id;
        $data['case_id'] = $caseid;
        $data['updated_at'] = now();


        if ($fid) {
            DB::table('family_law_step_8')
                ->where('id', $fid)
                ->update($data);
            session()->flash('message', 'Form Updated.');
        } else {
            $data['created_at'] = now();
            DB::table('family_law_step_8')->insert($data);
            session()->flash('message', 'Form Submitted.');
        }


        return redirect()->route('student.my-caseload');
    }

    public function insertOrUpdateFamilyLawStep9(Request $request)
    {
        $student_id = Auth::guard('student')->id();
        $fid = $request->input('fid');
        $caseid = $request->input('caseid');

        $request->validate([
            'oath_taking' => 'nullable|string',
            'address_party_witness_statement' => 'nullable|string',
            'signature_party_witness' => 'nullable|string',
            'counter_signature_judge' => 'nullable|string',
            'straight_questions' => 'nullable|string',
            'no_leading_questions' => 'nullable|string',
            'objections_other_party' => 'nullable|string',
            'statement_according_pleadings' => 'nullable|string',
        ]);

        $data = $request->only([
            'oath_taking',
            'address_party_witness_statement',
            'signature_party_witness',
            'counter_signature_judge',
            'straight_questions',
            'no_leading_questions',
            'objections_other_party',
            'statement_according_pleadings',
            'aid'
        ]);

        if ($request->hasFile('file_attachment')) {
            $file = $request->file('file_attachment');
            $filePath = $file->store('documents', 'public');
            $data['file_attachment'] = $filePath;
        } else if ($request->input('old_file')) {
            $data['file_attachment'] = $request->input('old_file');
        }

        $data['student_id'] = $student_id;
        $data['case_id'] = $caseid;
        $data['updated_at'] = now();

        if ($fid) {
            DB::table('family_law_step_9')
                ->where('id', $fid)
                ->update($data);
            session()->flash('message', 'Form Updated.');
        } else {
            $data['created_at'] = now();
            DB::table('family_law_step_9')->insert($data);
            session()->flash('message', 'Form Submitted.');
        }

        return redirect()->route('student.my-caseload');
    }

    public function insertOrUpdateFamilyLawStep10(Request $request)
    {
        $student_id = Auth::guard('student')->id();
        $fid = $request->input('fid');
        $caseid = $request->input('caseid');

        $request->validate([
            'oath_taking' => 'nullable|string',
            'address_party_witness_statement' => 'nullable|string',
            'signature_party_witness' => 'nullable|string',
            'counter_signature_judge' => 'nullable|string',
            'straight_questions' => 'nullable|string',
            'no_leading_questions' => 'nullable|string',
            'objections_other_party' => 'nullable|string',
            'statement_according_pleadings' => 'nullable|string',
            'impeach_credit_witness' => 'nullable|string',
            'only_relevant_questions' => 'nullable|string'
        ]);

        $data = $request->only([
            'oath_taking',
            'address_party_witness_statement',
            'signature_party_witness',
            'counter_signature_judge',
            'straight_questions',
            'no_leading_questions',
            'objections_other_party',
            'statement_according_pleadings',
            'impeach_credit_witness',
            'only_relevant_questions',
            'aid'
        ]);

        if ($request->hasFile('file_attachment')) {
            $file = $request->file('file_attachment');
            $filePath = $file->store('documents', 'public');
            $data['file_attachment'] = $filePath;
        } else if ($request->input('old_file')) {
            $data['file_attachment'] = $request->input('old_file');
        }

        $data['student_id'] = $student_id;
        $data['case_id'] = $caseid;
        $data['updated_at'] = now();

        if ($fid) {
            DB::table('family_law_step_10')
                ->where('id', $fid)
                ->update($data);
            session()->flash('message', 'Form Updated.');
        } else {
            $data['created_at'] = now();
            DB::table('family_law_step_10')->insert($data);
            session()->flash('message', 'Form Submitted.');
        }

        return redirect()->route('student.my-caseload');
    }

    public function insertOrUpdateFamilyLawStep11(Request $request)
    {
        $student_id = Auth::guard('student')->id();
        $fid = $request->input('fid');
        $caseid = $request->input('caseid');

        $request->validate([
            'opening_para_facts' => 'nullable|string',
            'second_para_issues' => 'nullable|string',
            'third_para_evidence' => 'nullable|string',
            'fourth_para_relevant_law' => 'nullable|string',
            'fifth_para_relevant_case_law' => 'nullable|string',
            'sixth_para_closing_prayer' => 'nullable|string',
        ]);

        $data = $request->only([
            'opening_para_facts',
            'second_para_issues',
            'third_para_evidence',
            'fourth_para_relevant_law',
            'fifth_para_relevant_case_law',
            'sixth_para_closing_prayer',
            'aid'
        ]);


        if ($request->hasFile('file_attachment')) {
            $file = $request->file('file_attachment');
            $filePath = $file->store('documents', 'public');
            $data['file_attachment'] = $filePath;
        } else if ($request->input('old_file')) {
            $data['file_attachment'] = $request->input('old_file');
        }


        $outlook_based = $request->has('outlook_based') ? $request->outlook_based : [];
        $data['outlook_based'] = json_encode($outlook_based);

        $data['student_id'] = $student_id;
        $data['case_id'] = $caseid;
        $data['updated_at'] = now();

        if ($fid) {
            // Update existing record
            DB::table('family_law_step_11')
                ->where('id', $fid)
                ->update($data);
            session()->flash('message', 'Form Updated.');
        } else {
            // Insert new record
            $data['created_at'] = now();
            DB::table('family_law_step_11')->insert($data);
            session()->flash('message', 'Form Submitted.');
        }

        return redirect()->route('student.my-caseload');
    }

    public function insertOrUpdateFamilyLawStep12(Request $request)
    {
        $student_id = Auth::guard('student')->id();
        $fid = $request->input('fid');
        $caseid = $request->input('caseid');

        $request->validate([
            'introduction_reconciliator' => 'nullable|string',
            'confidentiality_assurance' => 'nullable|string',
            'individual_session' => 'nullable|string',
            'joint_session' => 'nullable|string',
            'neutrality_impartiality' => 'nullable|string',
            'change_positions' => 'nullable|string',
            'reach_suggestions' => 'nullable|string',
            'finalize_suggestions' => 'nullable|string',
            'reach_agreement' => 'nullable|string',
        ]);

        $data = $request->only([
            'introduction_reconciliator',
            'confidentiality_assurance',
            'individual_session',
            'joint_session',
            'neutrality_impartiality',
            'change_positions',
            'reach_suggestions',
            'finalize_suggestions',
            'reach_agreement',
            'aid'
        ]);


        if ($request->hasFile('file_attachment')) {
            $file = $request->file('file_attachment');
            $filePath = $file->store('documents', 'public');
            $data['file_attachment'] = $filePath;
        } else if ($request->input('old_file')) {
            $data['file_attachment'] = $request->input('old_file');
        }
        // Add common fields
        $data['student_id'] = $student_id;
        $data['case_id'] = $caseid;
        $data['updated_at'] = now();

        if ($fid) {
            // Update the existing record
            DB::table('family_law_step_12')
                ->where('id', $fid)
                ->update($data);
            session()->flash('message', 'Form Updated.');
        } else {
            // Insert a new record
            $data['created_at'] = now();
            DB::table('family_law_step_12')->insert($data);
            session()->flash('message', 'Form Submitted.');
        }

        // Redirect to the appropriate route
        return redirect()->route('student.my-caseload');
    }

    public function insertOrUpdateFamilyLawStep13(Request $request)
    {

        $student_id = Auth::guard('student')->id();
        $fid = $request->input('fid');
        $caseid = $request->input('caseid');

        $data = $request->only([
            'aid'
        ]);

        if ($request->hasFile('file_attachment')) {
            $file = $request->file('file_attachment');
            $filePath = $file->store('documents', 'public');
            $data['file_attachment'] = $filePath;
        } else if ($request->input('old_file')) {
            $data['file_attachment'] = $request->input('old_file');
        }
        // Add common fields
        $data['student_id'] = $student_id;
        $data['case_id'] = $caseid;
        $data['updated_at'] = now();

        if ($fid) {
            // Update the existing record
            DB::table('family_law_step_13')
                ->where('id', $fid)
                ->update($data);
            session()->flash('message', 'Form Updated.');
        } else {
            // Insert a new record
            $data['created_at'] = now();
            DB::table('family_law_step_13')->insert($data);
            session()->flash('message', 'Form Submitted.');
        }

        // Redirect to the appropriate route
        return redirect()->route('student.my-caseload');
    }

    public function insertOrUpdateFamilyLawStep14(Request $request)
    {

        $student_id = Auth::guard('student')->id();
        $fid = $request->input('fid');
        $caseid = $request->input('caseid');

        $data = $request->only([
            'aid'
        ]);

        if ($request->hasFile('file_attachment')) {
            $file = $request->file('file_attachment');
            $filePath = $file->store('documents', 'public');
            $data['file_attachment'] = $filePath;
        } else if ($request->input('old_file')) {
            $data['file_attachment'] = $request->input('old_file');
        }
        // Add common fields
        $data['student_id'] = $student_id;
        $data['case_id'] = $caseid;
        $data['updated_at'] = now();

        if ($fid) {
            // Update the existing record
            DB::table('family_law_step_14')
                ->where('id', $fid)
                ->update($data);
            session()->flash('message', 'Form Updated.');
        } else {
            // Insert a new record
            $data['created_at'] = now();
            DB::table('family_law_step_14')->insert($data);
            session()->flash('message', 'Form Submitted.');
        }

        // Redirect to the appropriate route
        return redirect()->route('student.my-caseload');
    }

    public function startCase(Request $request)
    {
        $caseId = $request->query('caseId');
        $caseType = $request->query('caseType');
        $aid = $request->query('aid');

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
                ->where('aid', $aid)
                ->first();

            $viewName = str_replace('_', '-', $stepTablePrefix) . "-step-{$i}";

            if (!$dataExists) {
                return redirect()->route('student.' . $viewName, [
                    'step' => $i,
                    'caseId' => $caseId,
                    'caseType' => $caseType,
                    'studentId' => $studentId,
                    'aid' => $aid
                ]);
            }

            if ($dataExists->status == 0) {
                return redirect()->route('student.' . $viewName, [
                    'step' => $i,
                    'caseId' => $caseId,
                    'caseType' => $caseType,
                    'studentId' => $studentId,
                    'update' => true,
                    'aid' => $aid
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
        $aid = $request->query('aid');

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
                ->where('aid', $aid)
                ->first();

            return view('student.family-law-step-' . $step, ['case' => $case, 'caseId' => $caseId, 'caseType' => $caseType])->with('data', $dataExists);;
        }

        return view('student.family-law-step-' . $step, ['case' => $case, 'caseId' => $caseId, 'caseType' => $caseType]);
    }
}
