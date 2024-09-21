<div class="pd-20 card-box mb-30">

    <div class="clearfix mb-20">
        <div class="pull-left">
            <h5 class="text-blue">Introduction:</h5>
            <p>{{ $data['predetails']['introduction'] }}</p>
        </div>
    </div>


    <div class="clearfix mb-20">
        <div class="pull-left">
            <h5 class="text-blue">Instructions:</h5>
            <p>{{ $data['predetails']['instructions'] }}</p>
        </div>
    </div>


    @if ($data['predetails']['video'] != 'No video available')
        <div class="clearfix mb-20 text-center">
            <div class="">
                <h5 class="text-blue text-center">Role Play Video</h5>
                <video class="w-100" src="{{ asset('/storage/' . $data['predetails']['video']) }}" controls
                    type="video/mp4"></video>
            </div>
        </div>
    @endif





    <div class="clearfix mb-20 text-center">
        <div class="">
            <h6 class="text-blue">FAMILY LAW CLIENT INTERVIEW FORM</h6>
        </div>
    </div>





    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Grounds of Your Case</h4>
        </div>
        <div class="sm-12 col-md-10">
            <div class="checkbox-group">

                <p class="">
                    @php
                        $caseGround = $data['form-data']->case_ground ?? null;
                        if (is_string($caseGround)) {
                            $caseGround = json_decode($caseGround, true);
                        }
                    @endphp

                    @if (!empty($caseGround))
                        <ul style="list-style-type: disc; padding-left: 20px;">
                            @foreach ($caseGround as $ground)
                                <li>{{ $ground }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>No case grounds available.</p>
                    @endif
                </p>
            </div>
        </div>
    </div>

    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Personal Details</h4>
        </div>
        <div class="col-sm-12 col-md-10">
            <p class=""><b>Full Name:</b> {{ $data['form-data']->full_name ?? 'Not Provided' }}</p>
            <p class=""><b>Date of Birth:</b> {{ $data['form-data']->dob ?? 'Not Provided' }}</p>
            <p class=""><b>Birth Place:</b> {{ $data['form-data']->birth_place ?? 'Not Provided' }}</p>
        </div>
    </div>

    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Current Living Details</h4>
        </div>
        <div class="col-sm-12">
            <p class=""><b>Current Address:</b> {{ $data['form-data']->current_address ?? 'Not Provided' }}
            </p>
            <p class=""><b>Residence Telephone:</b>
                {{ $data['form-data']->residence_telephone ?? 'Not Provided' }}</p>
            <p class=""><b>Mobile Phone:</b> {{ $data['form-data']->mobile_tephone ?? 'Not Provided' }}</p>
            <p class=""><b>Email:</b> {{ $data['form-data']->email ?? 'Not Provided' }}</p>
        </div>
    </div>

    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Employment Details</h4>
        </div>
        <div class="col-sm-12">
            <p class=""><b>Employer:</b> {{ $data['form-data']->employer ?? 'Not Provided' }}</p>
            <p class=""><b>Job Title:</b> {{ $data['form-data']->job_title ?? 'Not Provided' }}</p>
            <p class=""><b>Employer Address:</b> {{ $data['form-data']->employer_address ?? 'Not Provided' }}
            </p>
            <p class=""><b>Employer Telephone:</b>
                {{ $data['form-data']->employer_telephone ?? 'Not Provided' }}</p>
            <p class=""><b>Monthly Salary:</b> {{ $data['form-data']->monthly_salary ?? 'Not Provided' }}</p>
            <p class=""><b>Annual Salary:</b> {{ $data['form-data']->annual_salary ?? 'Not Provided' }}</p>
            <p class=""><b>Length of Employment:</b>
                {{ $data['form-data']->length_of_employement ?? 'Not Provided' }}</p>
            <p class=""><b>Education:</b> {{ $data['form-data']->education ?? 'Not Provided' }}</p>
        </div>
    </div>


    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Spouse's Details</h4>
        </div>
        <div class="sm-12 col-md-10">
            <p class=""><b>Spouse's Full Name:</b>
                {{ $data['form-data']->spouse_full_name ?? 'Not Provided' }}</p>
            <p class=""><b>Spouse's Date of Birth:</b> {{ $data['form-data']->spouse_dob ?? 'Not Provided' }}
            </p>
            <p class=""><b>Spouse's Place of Birth:</b>
                {{ $data['form-data']->spouse_birth_place ?? 'Not Provided' }}</p>
            <p class=""><b>Spouse's Social Security Number:</b>
                {{ $data['form-data']->spouse_social_security ?? 'Not Provided' }}</p>
            <p class=""><b>Spouse's Driver's License Number:</b>
                {{ $data['form-data']->spouse_drivers_license ?? 'Not Provided' }}</p>
        </div>
    </div>

    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Spouse's Living Details</h4>
        </div>
        <div class="col-sm-12">
            <p class=""><b>Spouse's Current Address:</b>
                {{ $data['form-data']->spouse_current_address ?? 'Not Provided' }}</p>
            <p class=""><b>Spouse's Residence Telephone:</b>
                {{ $data['form-data']->spouse_residence_telephone ?? 'Not Provided' }}</p>
            <p class=""><b>Spouse's Mobile Telephone:</b>
                {{ $data['form-data']->spouse_mobile_telephone ?? 'Not Provided' }}</p>
            <p class=""><b>Spouse's Email:</b> {{ $data['form-data']->spouse_email ?? 'Not Provided' }}</p>
        </div>
    </div>


    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Spouse's Employment Details</h4>
        </div>
        <div class="col-sm-12">
            <p class=""><b>Spouse's Employer:</b> {{ $data['form-data']->spouse_employer ?? 'Not Provided' }}
            </p>
            <p class=""><b>Spouse's Job Title:</b>
                {{ $data['form-data']->spouse_job_title ?? 'Not Provided' }}</p>
            <p class=""><b>Spouse's Employer Address:</b>
                {{ $data['form-data']->spouse_employer_address ?? 'Not Provided' }}</p>
            <p class=""><b>Spouse's Employer Telephone:</b>
                {{ $data['form-data']->spouse_employer_telephone ?? 'Not Provided' }}</p>
            <p class=""><b>Spouse's Monthly Salary:</b>
                {{ $data['form-data']->spouse_monthly_salary ?? 'Not Provided' }}</p>
            <p class=""><b>Spouse's Annual Salary:</b>
                {{ $data['form-data']->spouse_annual_salary ?? 'Not Provided' }}</p>
            <p class=""><b>Spouse's Length of Employment:</b>
                {{ $data['form-data']->spouse_length_of_employment ?? 'Not Provided' }}</p>
            <p class=""><b>Spouse's Education:</b>
                {{ $data['form-data']->spouse_education ?? 'Not Provided' }}</p>
        </div>
    </div>


    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Marriage Details</h4>
        </div>
        <div class="col-sm-12">
            <p class=""><b>Marriage Date:</b> {{ $data['form-data']->marriage_date ?? 'Not Provided' }}</p>
            <p class=""><b>Marriage Place:</b> {{ $data['form-data']->marriage_place ?? 'Not Provided' }}</p>
            <p class=""><b>Separation Date:</b> {{ $data['form-data']->separation_date ?? 'Not Provided' }}
            </p>
        </div>
    </div>


    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Childs From this Marriage</h4>
        </div>
        <div class="sm-12 col-md-12 overflow-auto">
            @php
                $childrenData = isset($data['form-data'])
                    ? json_decode($data['form-data']->children_details, true)
                    : null;
            @endphp

            <table border="1" class="table text-center">
                <thead>
                    <tr>
                        <th>Sr. #</th>
                        <th>Name:</th>
                        <th>Sex:</th>
                        <th>D.O.B.:</th>
                        <th>Place of Birth:</th>
                        <th>Residence:</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!is_null($childrenData) && !empty($childrenData))
                        @foreach ($childrenData as $child)
                            <tr>
                                <td>{{ $child['sr'] }}</td>
                                <td>{{ $child['name'] }}</td>
                                <td>{{ $child['sex'] == 1 ? 'Male' : 'Female' }}</td>
                                <td>{{ $child['dob'] ?? 'N/A' }}</td>
                                <td>{{ $child['pob'] ?? 'N/A' }}</td>
                                <td>{{ $child['residence'] ?? 'N/A' }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No Children available</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>



    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Health Insurance for Children</h4>
        </div>
        <div class="sm-12 col-md-10">
            <p class=""><b>Name of Insurance Company:</b>
                {{ $data['form-data']->name_insurance_company ?? 'Not Provided' }}</p>
            <p class=""><b>Insurance Group Number:</b>
                {{ $data['form-data']->insurance_group_number ?? 'Not Provided' }}</p>
            <p class=""><b>Responsible Party for Insurance:</b>
                {{ $data['form-data']->insurance_party_responsible ?? 'Not Provided' }}</p>
            <p class=""><b>Monthly Insurance Cost:</b>
                {{ $data['form-data']->insurance_monthly_cost ?? 'Not Provided' }}</p>
            <p class=""><b>Covered by Parent's Employment:</b>
                {{ $data['form-data']->insurance_covered_by_parent_employment ?? 'Not Provided' }}</p>
        </div>
    </div>

    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Custody Dispute</h4>
        </div>
        <div class="sm-12 col-md-10">
            <p class=""><b>Custody Dispute:</b>
                {{ $data['form-data']->children_custody_dispute ?? 'Not Provided' }}</p>
            <p class=""><b>Custody Holder:</b>
                {{ $data['form-data']->children_custody_holder ?? 'Not Provided' }}</p>
        </div>
    </div>

    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Special Circumstances</h4>
        </div>
        <div class="sm-12 col-md-10">
            <p class=""><b>Special Needs:</b> {{ $data['form-data']->special_needs ?? 'Not Provided' }}</p>
            <p class=""><b>Religious Issues:</b>
                {{ $data['form-data']->religious_issues ?? 'Not Provided' }}</p>
        </div>
    </div>

    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Previous Marriages</h4>
        </div>
        <div class="sm-12 col-md-10">
            <p class=""><b>Previous Marriages:</b>
                {{ $data['form-data']->previous_marriages ?? 'Not Provided' }}</p>

        </div>
    </div>

    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Grounds for Divorce</h4>
        </div>
        <div class="sm-12 col-md-10">
            <p class=""><b>Grounds for Divorce:</b>
                {{ $data['form-data']->grounds_for_divorce ?? 'Not Provided' }}</p>

        </div>
    </div>

    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Childs From Previous Marriage</h4>
        </div>
        <div class="sm-12 col-md-12 overflow-auto">
            @php
                // Check if $data['form-data'] exists and is not null
                $childrenData = isset($data['form-data'])
                    ? json_decode($data['form-data']->children_from_previous_relationships, true)
                    : null;
            @endphp

            <table border="1" class="table text-center">
                <thead>
                    <tr>
                        <th>Sr. #</th>
                        <th>Name:</th>
                        <th>Sex:</th>
                        <th>D.O.B.:</th>
                        <th>Place of Birth:</th>
                        <th>Residence:</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!is_null($childrenData) && !empty($childrenData))
                        @foreach ($childrenData as $child)
                            <tr>
                                <td>{{ $child['sr'] }}</td>
                                <td>{{ $child['name'] }}</td>
                                <td>{{ $child['sex'] == 1 ? 'Male' : 'Female' }}</td>
                                <td>{{ $child['dob'] ?? 'N/A' }}</td>
                                <td>{{ $child['pob'] ?? 'N/A' }}</td>
                                <td>{{ $child['residence'] ?? 'N/A' }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No Children available</td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>

    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Your Retirement, Pensions, and Savings Plans</h4>
        </div>
        <div class="sm-12 col-md-10">
            <p class=""><b>Retirement, Pension, and Savings Plans:</b>
                {{ $data['form-data']->retirement_pension_savings_plans ?? 'Not Provided' }}</p>
        </div>
    </div>

    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Spouse's Retirement, Pensions, and Savings Plans</h4>
        </div>
        <div class="sm-12 col-md-10">
            <div class="sm-12 col-md-10">
                <p class=""><b>Spouse's Retirement, Pension, and Savings Plans:</b>
                    {{ $data['form-data']->spouse_retirement_pension_savings_plans ?? 'Not Provided' }}</p>
            </div>
        </div>
    </div>

    <div class="form-group row border p-3">
        <label class="col-sm-12 col-md-2 col-form-label">Attach file:</label>
        <div class="col-sm-12 col-md-10">
            @if (!empty($data['form-data']->file_attachment))
                {{-- <a href="{{ asset('/storage/' . $data['form-data']->file_attachment) }}" class="btn btn-primary" download>Download PDF</a> --}}
                <a href="{{ asset('/storage/' . $data['form-data']->file_attachment) }}" class="btn btn-primary"
                    target="_blank">View File</a>
            @else
                Not Provided
            @endif
        </div>
    </div>



    <form action="{{ route('advisor.add-feedback-marks-family-law-case') }}" method="GET">
        @csrf
        <input type="hidden" class="form-control" name="fid" value="{{ $data['form-data']->id ?? '' }}">
        <input type="hidden" class="form-control" name="step" value="1">
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Give Feedback:</label>
            <div class="sm-12 col-md-10">
                <textarea class="form-control" name="feedback">{{ $data['form-data']->feedback ?? '' }}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Give Marks</label>
            <div class="sm-12 col-md-10">
                <input type="number" class="form-control" name="marks"
                    value="{{ $data['form-data']->marks ?? '' }}" min="0" max="10">
            </div>
        </div>

        @if (isset($data['form-data']->status) && $data['form-data']->status == 0)
            <div class="form-group row">
                <div class="col-lg-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </div>
            </div>
        @endif


    </form>


</div>




@if (!empty($data['form-data']->marks))
    @if ($data['form-data']->status == 0)
        <form action="{{ route('advisor.next-step-family-law') }}" method="GET">
            <input type="hidden" class="form-control" name="fid" value="{{ $data['form-data']->id ?? '' }}">
            <input type="hidden" class="form-control" name="step" value="1">
            <div class="mb-20 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Unlock Next Step</button>
            </div>
        </form>
    @endif
@endif
