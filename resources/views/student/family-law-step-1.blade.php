@extends('../layouts/app')

@section('page-title', 'Family Law step-1')

@section('content')

    @includeIf('student.partials._navbar')
    @includeIf('student.partials._sidebar')





    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20 text-center">
            <div class="">
                <h2 class="text-blue">Step: 1 - Interviewing the Client</h2>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">Introduction:</h5>
                <p>{{ $case->step_1_introduction }}</p>
            </div>
        </div>

        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">Instructions:</h5>
                <p>{{ $case->step_1_instructions }}</p>
            </div>
        </div>

        @if (!empty($case->step_1_video))
            <div class="clearfix mb-20 text-center">
                <div class="">
                    <h5 class="text-blue text-center">Role Play Video</h5>
                    <video class="w-100" src="{{ asset('/storage/' . $case->step_1_video) }}" controls
                        type="video/mp4"></video>
                </div>
            </div>
        @endif


        <div class="clearfix mb-20 text-center">
            <div class="">
                <h6 class="text-blue">FAMILY LAW CLIENT INTERVIEW FORM</h6>
                <p></p>
            </div>
        </div>
 

        <form action="{{ route('student.insert-family-law-step-1') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="aid" value="{{ request()->query('aid') }}">
            <input type="hidden" name="caseid" value="{{ request('caseId') }}">

          



            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Select the ground of your Case:</label>
                <div class="col-sm-12 col-md-10">
                    <div class="checkbox-group">
                        @php
                            $caseGrounds = json_decode($data->case_ground ?? '[]');
                        @endphp

                        @foreach (['Whereabouts unknow for 4 years, Kindly consult proviso(a) of section 2', 'Failure to provide maintainence for 2 years', 'Husband has taken an additional wife', 'Imprisonment for 7 years', 'Failure to perfomr marital obligations for 3 years', 'Impotency of the Husband,Kindly consult priviso(b) section 2', 'Insanity for 2 years', 'Suffering from leprsy', 'Suffering from virulent venereal disease', 'Option of puberty', 'cruelty of Husband', 'Habitual Assault by Husband', 'Husband Making life miserable by conduct not amounting to physical ill-treatment', 'Association with infamous, evil reputed women', 'Forces wife to lead immoral life', 'Disposes of property of wife', 'Prevents the wife to exercise legal right over property', 'Obstructs religous obligations of wife', 'en-equlaity of treatment between wifes as per Quran', 'Any other recognized valid grant under muslim law'] as $index => $ground)
                            <label for="caseGround{{ $index + 1 }}">
                                <input type="checkbox" id="caseGround{{ $index + 1 }}" name="caseGround[]"
                                    value="{{ $ground }}" {{ in_array($ground, $caseGrounds) ? 'checked' : '' }}>
                                {{ $ground }}
                            </label>
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Please provide your full name, date of birth and place of
                    birth:</label>
                <div class="col-sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Enter full name" name="full_name"
                        value="{{ isset($data) ? $data->full_name ?? '' : '' }}">
                    <input type="date" class="form-control" name="dob"
                        value="{{ isset($data) ? $data->dob ?? '' : '' }}">
                    <input type="text" class="form-control" placeholder="Enter birth place" name="birth_place"
                        value="{{ isset($data) ? $data->birth_place ?? '' : '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Where are you living now?</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Address" name="current_address"
                        value="{{ isset($data) ? $data->current_address ?? '' : '' }}">
                    <input type="number" class="form-control" placeholder="Residence telephone" name="residence_telephone"
                        value="{{ isset($data) ? $data->residence_telephone ?? '' : '' }}">
                    <input type="number" class="form-control" placeholder="Mobile telephone" name="mobile_telephone"
                        value="{{ isset($data) ? $data->mobile_telephone ?? '' : '' }}">
                    <input type="email" class="form-control" placeholder="Email address" name="email"
                        value="{{ isset($data) ? $data->email ?? '' : '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"> Please complete the following concerning your
                    employment:</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Employer" name="employer"
                        value="{{ isset($data) ? $data->mployer ?? '' : '' }}">
                    <input type="text" class="form-control" placeholder="Job Title" name="job_title"
                        value="{{ isset($data) ? $data->job_title ?? '' : '' }}">
                    <input type="text" class="form-control" placeholder="Address" name="employer_address"
                        value="{{ isset($data) ? $data->employer_address ?? '' : '' }}">
                    <input type="number" class="form-control" placeholder="Telephone number" name="employer_telephone"
                        value="{{ isset($data) ? $data->employer_telephone ?? '' : '' }}">
                    <input type="number" class="form-control" placeholder="Gross salary/monthly" name="monthly_salary"
                        value="{{ isset($data) ? $data->monthly_salary ?? '' : '' }}">
                    <input type="number" class="form-control"
                        placeholder="Annual gross (including bonuses, stock options etc)" name="annual_salary"
                        value="{{ isset($data) ? $data->annual_salary ?? '' : '' }}">
                    <input type="number" class="form-control" placeholder="Length of employement"
                        name="length_of_employment" value="{{ isset($data) ? $data->length_of_employment ?? '' : '' }}">

                    <input type="text" class="form-control" placeholder="Education/Training" name="education"
                        value="{{ isset($data) ? $data->education ?? '' : '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">
                    Please provide your spouse’s full name, date and place of birth, Social Security number, driver's
                    license number:
                </label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Name" name="spouse_full_name"
                        value="{{ isset($data) ? $data->spouse_full_name ?? '' : '' }}">
                    <input type="date" class="form-control" name="spouse_dob"
                        value="{{ isset($data) ? $data->spouse_dob ?? '' : '' }}">
                    <input type="text" class="form-control" placeholder="Place of birth" name="spouse_birth_place"
                        value="{{ isset($data) ? $data->spouse_birth_place ?? '' : '' }}">
                    <input type="text" class="form-control" placeholder="Social Security"
                        name="spouse_social_security"
                        value="{{ isset($data) ? $data->spouse_social_security ?? '' : '' }}">
                    <input type="text" class="form-control" placeholder="Driver's License No"
                        name="spouse_drivers_license"
                        value="{{ isset($data) ? $data->spouse_drivers_license ?? '' : '' }}">
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Where is your spouse living?</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Address" name="spouse_current_address"
                        value="{{ isset($data) ? $data->spouse_current_address ?? '' : '' }}">
                    <input type="number" class="form-control" placeholder="Residence telephone"
                        name="spouse_residence_telephone"
                        value="{{ isset($data) ? $data->spouse_residence_telephone ?? '' : '' }}">
                    <input type="number" class="form-control" placeholder="Mobile telephone"
                        name="spouse_mobile_telephone"
                        value="{{ isset($data) ? $data->spouse_mobile_telephone ?? '' : '' }}">
                    <input type="email" class="form-control" placeholder="Email address" name="spouse_email"
                        value="{{ isset($data) ? $data->spouse_email ?? '' : '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Please complete the following concerning your spouse's
                    employment:</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Employer" name="spouse_employer"
                        value="{{ isset($data) ? $data->spouse_employer ?? '' : '' }}">
                    <input type="text" class="form-control" placeholder="Job Title" name="spouse_job_title"
                        value="{{ isset($data) ? $data->spouse_job_title ?? '' : '' }}">
                    <input type="text" class="form-control" placeholder="Address" name="spouse_employer_address"
                        value="{{ isset($data) ? $data->spouse_employer_address ?? '' : '' }}">
                    <input type="number" class="form-control" placeholder="Telephone number"
                        name="spouse_employer_telephone"
                        value="{{ isset($data) ? $data->spouse_employer_telephone ?? '' : '' }}">
                    <input type="number" class="form-control" placeholder="Gross salary/monthly"
                        name="spouse_monthly_salary"
                        value="{{ isset($data) ? $data->spouse_monthly_salary ?? '' : '' }}">
                    <input type="number" class="form-control"
                        placeholder="Annual gross (including bonuses, stock options etc)" name="spouse_annual_salary"
                        value="{{ isset($data) ? $data->spouse_annual_salary ?? '' : '' }}">
                    <input type="number" class="form-control" placeholder="Length of employment"
                        name="spouse_length_of_employment"
                        value="{{ isset($data) ? $data->spouse_length_of_employment ?? '' : '' }}">
                    <input type="text" class="form-control" placeholder="Education/Training" name="spouse_education"
                        value="{{ isset($data) ? $data->spouse_education ?? '' : '' }}">
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Please provide the date and place of your
                    marriage:</label>
                <div class="sm-12 col-md-10">
                    <input type="date" class="form-control" placeholder="Date" name="marriage_date"
                        value="{{ isset($data) ? $data->marriage_date ?? '' : '' }}">
                    <input type="text" class="form-control" placeholder="City, State" name="marriage_place"
                        value="{{ isset($data) ? $data->marriage_place ?? '' : '' }}">
                    <input type="date" class="form-control" placeholder="Date of separation" name="separation_date"
                        value="{{ isset($data) ? $data->separation_date ?? '' : '' }}">
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">If there are any children of this marriage, please provide
                    all requested information:</label>
                <div class="sm-12 col-md-10 overflow-auto">

                    <table border="1" class="table" id="childrenTable">
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
                        <tbody></tbody>
                    </table>
                    <button type="button" class="btn btn-primary float-right" id="addChildBtn">Add New Child</button>

                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Do the child(ren) have health insurance:</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Name of insurance company"
                        name="name_insurance_company"
                        value="{{ isset($data) ? $data->name_insurance_company ?? '' : '' }}">
                    <input type="text" class="form-control" placeholder="Group Number" name="insurance_group_number"
                        value="{{ isset($data) ? $data->insurance_group_number ?? '' : '' }}">
                    <input type="text" class="form-control" placeholder="Party responsible for premium"
                        name="insurance_party_responsible"
                        value="{{ isset($data) ? $data->insurance_party_responsible ?? '' : '' }}">
                    <input type="number" class="form-control" placeholder="Monthly cost of premium"
                        name="insurance_monthly_cost"
                        value="{{ isset($data) ? $data->insurance_monthly_cost ?? '' : '' }}">
                    <input type="text" class="form-control"
                        placeholder="Is the insurance covered through a parent's employment?"
                        name="insurance_covered_by_parent_employment"
                        value="{{ isset($data) ? $data->insurance_covered_by_parent_employment ?? '' : '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Will there be a dispute over custody of the
                    children?</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control"
                        placeholder="Will there be a dispute over custody of the children?"
                        name="children_custody_dispute"
                        value="{{ isset($data) ? $data->children_custody_dispute ?? '' : '' }}">
                    <input type="text" class="form-control" placeholder="If not, who will have custody?"
                        name="children_custody_holder"
                        value="{{ isset($data) ? $data->children_custody_holder ?? '' : '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Special circumstances of children and/or spouses:</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Special needs" name="special_needs"
                        value="{{ isset($data) ? $data->special_needs ?? '' : '' }}">
                    <input type="text" class="form-control" placeholder="Religious issues" name="religious_issues"
                        value="{{ isset($data) ? $data->religious_issues ?? '' : '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">If you have been married before, how many times?</label>
                <div class="sm-12 col-md-10">
                    <input type="number" class="form-control"
                        placeholder="If you have been married before, how many times?" name="previous_marriages"
                        value="{{ isset($data) ? $data->previous_marriages ?? '0' : '0' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">What are your grounds for divorce?</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="What are the grounds for divorce?"
                        name="grounds_for_divorce" value="{{ isset($data) ? $data->grounds_for_divorce ?? '' : '' }}">
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">If there are children from a previous marriage or other
                    relationship, please provide all requested information:</label>
                <div class="sm-12 col-md-10 overflow-auto">

                    <table border="1" class="table" id="previousChildrenTable">
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
                        <tbody></tbody>
                    </table>
                    <button type="button" class="btn btn-primary float-right" id="addPreviousChildBtn">Add New
                        Child</button>

                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">List all Retirement, Pensions, and Savings Plans: Do you
                    participate in any retirement plan or company savings plan?</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="" name="retirement_pension_savings_plans"
                        value="{{ isset($data) ? $data->retirement_pension_savings_plans ?? '' : '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Does your Spouse participate in any retirement plan or
                    company savings plan?</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder=""
                        name="spouse_retirement_pension_savings_plans"
                        value="{{ isset($data) ? $data->spouse_retirement_pension_savings_plans ?? '' : '' }}">
                </div>
            </div>

            @if (isset($data) && $data->file_attachment)
                <input type="hidden" name="old_file" value="{{ $data->file_attachment }}">
            @endif

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Attach file:</label>
                <div class="sm-12 col-md-10">
                    <input type="file" class="form-control" name="file_attachment" accept=".pdf">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Advisor Responce:</label>
                <div class="sm-12 col-md-10">{{ isset($data) ? $data->feedback ?? '' : '' }}</div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Marks Secured:</label>
                <div class="sm-12 col-md-10">

                    <span>{{ isset($data) ? $data->marks ?? '' : '' }}/10</span>
                </div>
            </div>

            <input type="hidden" name="fid" value="{{ isset($data) ? $data->id ?? '' : '' }}">

            <div class="form-group row">
                <div class="col-lg-6 d-flex justify-content-end">
                    {{-- <button type="submit" class="btn btn-primary">Update Details</button> --}}
                </div>
                <div class="col-lg-6 d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary">
                        {{ isset($data) ? 'Update Details' : 'Submit' }}
                    </button>
                </div>
            </div>

        </form>


    </div>



@endsection
@push('styles')
    <style>
        a>.card-box {
            background-image: linear-gradient(45deg, #23074d, #cc5333) !important;
        }

        input,
        textarea {
            margin-bottom: 5px;
        }
    </style>
@endpush







@push('scripts')
    <script>
        $(document).ready(function() {

            let previousChildCount = 0;
            let childCount = 0;

            // Function to create a row for previous children
            function createPreviousChildRow(sr = '', name = '', sex = '', dob = '', pob = '', residence = '') {
                previousChildCount++;
                return `
<tr>
    <th><input type="number" name="previousChild[${previousChildCount}][sr]" class="form-control" placeholder="Sr.#" value="${sr || previousChildCount}"></th>
    <th><input type="text" name="previousChild[${previousChildCount}][name]" class="form-control" placeholder="Name" value="${name}"></th>
    <th>
        <select name="previousChild[${previousChildCount}][sex]" class="form-control">
            <option value="">Select sex</option>
            <option value="1" ${sex === '1' ? 'selected' : ''}>Male</option>
            <option value="0" ${sex === '0' ? 'selected' : ''}>Female</option>
        </select>
    </th>
    <th><input type="date" name="previousChild[${previousChildCount}][dob]" class="form-control" placeholder="D.O.B" value="${dob}"></th>
    <th><input type="text" name="previousChild[${previousChildCount}][pob]" class="form-control" placeholder="Place of Birth" value="${pob}"></th>
    <th><input type="text" name="previousChild[${previousChildCount}][residence]" class="form-control" placeholder="Residence" value="${residence}"></th>
</tr>
`;
            }

            // Function to create a row for children
            function createChildRow(sr = '', name = '', sex = '', dob = '', pob = '', residence = '') {
                childCount++;
                return `
<tr>
    <th><input type="number" name="child[${childCount}][sr]" class="form-control" placeholder="Sr.#" value="${sr || childCount}"></th>
    <th><input type="text" name="child[${childCount}][name]" class="form-control" placeholder="Name" value="${name}"></th>
    <th>
        <select name="child[${childCount}][sex]" class="form-control">
            <option value="">Select sex</option>
            <option value="1" ${sex === '1' ? 'selected' : ''}>Male</option>
            <option value="0" ${sex === '0' ? 'selected' : ''}>Female</option>
        </select>
    </th>
    <th><input type="date" name="child[${childCount}][dob]" class="form-control" placeholder="D.O.B" value="${dob}"></th>
    <th><input type="text" name="child[${childCount}][pob]" class="form-control" placeholder="Place of Birth" value="${pob}"></th>
    <th><input type="text" name="child[${childCount}][residence]" class="form-control" placeholder="Residence" value="${residence}"></th>
</tr>
`;
            }


            @php
                $previousChildren = isset($data->children_from_previous_relationships) ? json_decode($data->children_from_previous_relationships, true) : [];
                $children = isset($data->children_details) ? json_decode($data->children_details, true) : [];
            @endphp


            @foreach ($previousChildren as $child)

                $('#previousChildrenTable tbody').append(createPreviousChildRow('{{ $child['sr'] }}',
                    '{{ $child['name'] }}', '{{ $child['sex'] }}', '{{ $child['dob'] }}',
                    '{{ $child['pob'] }}', '{{ $child['residence'] }}'));
            @endforeach


            @foreach ($children as $child)
                $('#childrenTable tbody').append(createChildRow('{{ $child['sr'] }}', '{{ $child['name'] }}',
                    '{{ $child['sex'] }}', '{{ $child['dob'] }}', '{{ $child['pob'] }}',
                    '{{ $child['residence'] }}'));
            @endforeach


            $('#addPreviousChildBtn').click(function() {
                $('#previousChildrenTable tbody').append(createPreviousChildRow());
            });


            $('#addChildBtn').click(function() {
                $('#childrenTable tbody').append(createChildRow());
            });

        });
    </script>
@endpush
