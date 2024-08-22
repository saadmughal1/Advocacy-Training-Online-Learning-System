@extends('../layouts/app')

@section('page-title', 'Family Law step-8')

@section('content')

    @includeIf('student.partials._navbar')
    @includeIf('student.partials._sidebar')

    <div class="pd-20 card-box mb-30">

        <div class="clearfix mb-20 text-center">
            <div class="">
                <h2 class="text-blue">Step 8: Framing of issues</h2>
            </div>
        </div>


        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">Introduction:</h5>
                <p>{{ $case->step_8_introduction }}</p>
            </div>
        </div>


        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">Instructions:</h5>
                <p>{{ $case->step_8_instructions }}</p>
            </div>
        </div>



        <form action="{{ route('student.insert-family-law-step-8') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="aid" value="{{ request()->query('aid') }}">
            <input type="hidden" name="caseid" value="{{ request('caseId') }}">


            <div class="form-group row">
                <div class="sm-12 col-md-12 overflow-auto">

                    <table border="1" class="table" id="issueLawTable">
                        <thead>
                            <tr>
                                <th class="text-center">Issue of Law</th>
                                <th class="text-center">Onus to Prove</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <button type="button" class="btn btn-primary float-right" id="issueLawBtn">Add new Issue Law</button>

                </div>
            </div>



            <div class="form-group row">
                <div class="sm-12 col-md-12 overflow-auto">

                    <table border="1" class="table" id="issueFactTable">
                        <thead>
                            <tr>
                                <th class="text-center">Issue of Fact</th>
                                <th class="text-center">Onus to Prove</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <button type="button" class="btn btn-primary float-right" id="issueFactBtn">Add new Fact Law</button>

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

            let issueLawCount = 0;
            let issueFactCount = 0;

            // Function to create a row for previous children
            function createIssueLawRow(law = '', prove = '') {
                issueLawCount++;
                return `
<tr>
    
    <th><input type="text" name="issue_law[${issueLawCount}][law]" class="form-control" placeholder="Issue of Law" value="${law}"></th>
    <th><input type="text" name="issue_law[${issueLawCount}][prove]" class="form-control" placeholder="Onus to Prove" value="${prove}"></th>
</tr>
`;
            }

            // Function to create a row for children
            function createIssueFactRow(fact = '', prove = '') {
                issueFactCount++;
                return `
<tr>
    <th><input type="text" name="issue_fact[${issueFactCount}][fact]" class="form-control" placeholder="Issue of Fact" value="${fact}"></th>
    <th><input type="text" name="issue_fact[${issueFactCount}][prove]" class="form-control" placeholder="Onus to Prove" value="${prove}"></th>
</tr>
`;
            }


            @php
        
                $issue_law = isset($data->issue_law) ? json_decode($data->issue_law, true) : [];
                $issue_fact = isset($data->issue_fact) ? json_decode($data->issue_fact, true) : [];
                
            @endphp


            @foreach ($issue_law as $law)

                $('#issueLawTable tbody').append(createIssueLawRow(
                    '{{ $law['law'] }}',
                    '{{ $law['prove'] }}',
                ));
            @endforeach

            $('#issueLawBtn').click(function() {
                $('#issueLawTable tbody').append(createIssueLawRow());
            });


            @foreach ($issue_fact as $law)
                $('#issueFactTable tbody').append(createIssueFactRow(
                    '{{ $law['fact'] }}',
                    '{{ $law['prove'] }}',
                ));
            @endforeach

            $('#issueFactBtn').click(function() {
                $('#issueFactTable tbody').append(createIssueFactRow());
            });

        });
    </script>
@endpush
