@extends('../layouts/app')

@section('page-title', 'Family Law step-4')

@section('content')

    @includeIf('student.partials._navbar')
    @includeIf('student.partials._sidebar')

    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20 text-center">
            <div class="">
                <h2 class="text-blue">Step 04: Preparing Case Summaries</h2>
            </div>
        </div>


        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">Introduction:</h5>
                <p>{{ $case->step_4_introduction }}</p>
            </div>
        </div>


        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">Instructions:</h5>
                <p>{{ $case->step_4_instructions }}</p>
            </div>
        </div>


        <form action="{{ route('student.insert-family-law-step-4') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="aid" value="{{ request()->query('aid') }}">
            <input type="hidden" name="caseid" value="{{ request('caseId') }}">

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Step 1</label>
                <div class="sm-12 col-md-10">
                    <input type="text" name="case_title" class="form-control" placeholder="Enter the title of the case"
                        value="{{ isset($data) ? $data->case_title ?? '' : '' }}" required>
                    <textarea name="citation_details" class="form-control" placeholder="Enter Citation Details">{{ isset($data) ? $data->citation_details ?? '' : '' }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Step 2</label>
                <div class="sm-12 col-md-10">
                    <textarea name="headnote_relevant_laws" class="form-control" placeholder="Enter Headnote: Relevant laws">{{ isset($data) ? $data->headnote_relevant_laws ?? '' : '' }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Step 3</label>
                <div class="sm-12 col-md-10">
                    <textarea name="case_facts" class="form-control" placeholder="Enter Facts of the case">{{ isset($data) ? $data->case_facts ?? '' : '' }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Step 4</label>
                <div class="sm-12 col-md-10">
                    <textarea name="court_verdict" class="form-control" placeholder="Enter Verdict of the court">{{ isset($data) ? $data->court_verdict ?? '' : '' }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Step 5</label>
                <div class="sm-12 col-md-10">
                    <textarea name="additional_info" class="form-control" placeholder="">{{ isset($data) ? $data->additional_info ?? '' : '' }}</textarea>
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
