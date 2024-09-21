@extends('../layouts/app')

@section('page-title', 'Family Law step-9')

@section('content')

    @includeIf('student.partials._navbar')
    @includeIf('student.partials._sidebar')

    <div class="pd-20 card-box mb-30">

        <div class="clearfix mb-20 text-center">
            <div class="">
                <h2 class="text-blue">Step 10: Cross Examination</h2>
            </div>
        </div>


        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">Introduction:</h5>
                <p>{{ $case->step_10_introduction }}</p>
            </div>
        </div>


        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">Instructions:</h5>
                <p>{{ $case->step_10_instructions }}</p>
            </div>
        </div>



        @if (!empty($case->step_10_video))
            <div class="clearfix mb-20 text-center">
                <div class="">
                    <h5 class="text-blue text-center">Role Play Video</h5>

                    @if (filter_var($case->step_10_video, FILTER_VALIDATE_URL))
                        <a href="{{ $case->step_10_video }}" target="_blank" class="btn btn-primary mt-3">View Video</a>
                    @else
                        <video class="w-100" src="{{ asset('/storage/' . $case->step_10_video) }}" controls
                            type="video/mp4"></video>
                    @endif
                </div>
            </div>
        @endif



        <form action="{{ route('student.insert-family-law-step-10') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="aid" value="{{ request()->query('aid') }}">
            <input type="hidden" name="caseid" value="{{ request('caseId') }}">

            <h3 class="text-blue">Procedural Steps</h3>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Oath taking</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" name="oath_taking" placeholder="Oath taking">{{ isset($data) ? $data->oath_taking ?? '' : '' }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Address of the party/witness Statement</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" name="address_party_witness_statement"
                        placeholder="Address of the party/witness Statement">{{ isset($data) ? $data->address_party_witness_statement ?? '' : '' }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Signature of the party/witness</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" name="signature_party_witness" placeholder="Signature of the party/witness">{{ isset($data) ? $data->signature_party_witness ?? '' : '' }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Counter signature of the Judge</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" name="counter_signature_judge" placeholder="Counter signature of the Judge">{{ isset($data) ? $data->counter_signature_judge ?? '' : '' }}</textarea>
                </div>
            </div>

            <h3 class="text-blue">Substantive steps</h3>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Straight questions</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" name="straight_questions" placeholder="Straight questions">{{ isset($data) ? $data->straight_questions ?? '' : '' }}</textarea>
                </div>
            </div>


            

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">No leading questions</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" name="no_leading_questions" placeholder="No leading questions">{{ isset($data) ? $data->no_leading_questions ?? '' : '' }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Objections taken by other party</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" name="objections_other_party" placeholder="Objections taken by other party">{{ isset($data) ? $data->objections_other_party ?? '' : '' }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Statement according to the pleadings</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" name="statement_according_pleadings" placeholder="Statement according to the pleadings">{{ isset($data) ? $data->statement_according_pleadings ?? '' : '' }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">To impeach the credit of witness, any question could be
                    asked</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" name="impeach_credit_witness"
                        placeholder="To impeach the credit of witness, any question could be asked">{{ isset($data) ? $data->impeach_credit_witness ?? '' : '' }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Only relevant questions could be asked</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" name="only_relevant_questions" placeholder="Only relevant questions could be asked">{{ isset($data) ? $data->only_relevant_questions ?? '' : '' }}</textarea>
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
