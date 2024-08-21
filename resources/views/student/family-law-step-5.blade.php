@extends('../layouts/app')

@section('page-title', 'Family Law step-5')

@section('content')

    @includeIf('student.partials._navbar')
    @includeIf('student.partials._sidebar')

    <div class="pd-20 card-box mb-30">

        <div class="clearfix mb-20 text-center">
            <div class="">
                <h2 class="text-blue">Step 05: Drafting the plaint</h2>
            </div>
        </div>


        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">Introduction:</h5>
                <p>{{ $case->step_5_introduction }}</p>
            </div>
        </div>


        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">Instructions:</h5>
                <p>{{ $case->step_5_instructions }}</p>
            </div>
        </div>




        <form action="{{ route('student.insert-family-law-step-5') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="aid" value="{{ request()->query('aid') }}">
            <input type="hidden" name="caseid" value="{{ request('caseId') }}">

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Header</label>
                <div class="sm-12 col-md-10">
                    <textarea name="court_name" class="form-control" placeholder="Enter the name of the Court in which the suit is brought">{{ isset($data) ? $data->court_name ?? '' : '' }}</textarea>
                    <textarea name="plaintiff_details" class="form-control"
                        placeholder="Enter the name, description and place of residence of the plaintiff">{{ isset($data) ? $data->plaintiff_details ?? '' : '' }}</textarea>
                    <textarea name="defendant_details" class="form-control"
                        placeholder="Enter the name, description and place of residence of the defendant, so far as they can be ascertained">{{ isset($data) ? $data->defendant_details ?? '' : '' }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Subject of the plaint</label>
                <div class="sm-12 col-md-10">
                    <textarea name="plaint_subject" class="form-control"
                        placeholder="Such as: suit for dissolution of marriage, suit for recovery of maintenance etc.">{{ isset($data) ? $data->plaint_subject ?? '' : '' }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Facts relating to the dispute</label>
                <div class="sm-12 col-md-10">
                    <textarea name="cause_of_action" class="form-control" placeholder="Enter the cause of action when arose">{{ isset($data) ? $data->cause_of_action ?? '' : '' }}</textarea>
                    <textarea name="territorial_jurisdiction" class="form-control"
                        placeholder="Enter territorial jurisdiction of the court">{{ isset($data) ? $data->territorial_jurisdiction ?? '' : '' }}</textarea>
                    <input type="number" name="court_fee" class="form-control" placeholder="Enter court fee"
                        value="{{ isset($data) ? $data->court_fee ?? '' : '' }}" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Prayer</label>
                <div class="sm-12 col-md-10">
                    <textarea name="relief_claimed" class="form-control" placeholder="Enter the relief which the plaintiff claims">{{ isset($data) ? $data->relief_claimed ?? '' : '' }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Schedule of witnesses</label>
                <div class="sm-12 col-md-10">
                    <textarea name="witnesses_count" class="form-control"
                        placeholder="Enter the number of witnesses intended to be produced in support of the plaint">{{ isset($data) ? $data->witnesses_count ?? '' : '' }}</textarea>
                    <textarea name="witnesses_details" class="form-control"
                        placeholder="Enter the names and addresses of the witnesses and brief summary of the facts to which they would depose:">{{ isset($data) ? $data->witnesses_details ?? '' : '' }}</textarea>
                </div>
            </div>



            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Make sure, You must attach the following documents</label>
                <div class="col-sm-12 col-md-10">
                    <div class="checkbox-group">
                        <p>Copies of the plaint</p>
                        <p>Schedule of the witnesses</p>
                        <p>Precise statement of witnesses</p>
                        <p>List of documents rely upon</p>
                        <p>Copies of documents rely upon</p>
                        <p>List of documents in possession</p>
                        <p>Copies of documents in possession</p>
                    </div>
                </div>
            </div>



            @if (isset($data) && $data->file_attachment)
                <input type="hidden" name="old_file" value="{{ $data->file_attachment }}">
            @endif

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Attach files:</label>
                <div class="col-sm-12 col-md-10">
                    <input type="file" class="form-control" name="file_attachment[]" accept=".pdf,.doc,.docx,.zip"
                        multiple>
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
