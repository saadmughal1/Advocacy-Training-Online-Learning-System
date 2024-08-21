@extends('../layouts/app')

@section('page-title', 'Family Law step-7')

@section('content')

    @includeIf('student.partials._navbar')
    @includeIf('student.partials._sidebar')

    <div class="pd-20 card-box mb-30">

        <div class="clearfix mb-20 text-center">
            <div class="">
                <h2 class="text-blue">Step 07: Pretrial Reconciliation</h2>
            </div>
        </div>


        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">Introduction:</h5>
                <p>{{ $case->step_7_introduction }}</p>
            </div>
        </div>


        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">Instructions:</h5>
                <p>{{ $case->step_7_instructions }}</p>
            </div>
        </div>

        @if (!empty($case->step_7_video))
            <div class="clearfix mb-20 text-center">
                <div class="">
                    <h5 class="text-blue text-center">Role Play Video</h5>
                </div>
                <video class="w-100" src="{{ asset('/storage/' . $case->step_7_video) }}" controls
                    type="video/mp4"></video>
            </div>
        @endif


        <form action="{{ route('student.insert-family-law-step-7') }}" method="POST" enctype="multipart/form-data">


            @csrf
            <input type="hidden" name="aid" value="{{ request()->query('aid') }}">
            <input type="hidden" name="caseid" value="{{ request('caseId') }}">




            


            <h3 class="text-blue">Procedural Skills</h3>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Enter the Introduction of the Reconciliator/Mediator</label>
                <div class="sm-12 col-md-10">
                    <textarea name="reconciliator_intro" class="form-control" placeholder="Enter the Introduction of the Reconciliator/Mediator">{{ isset($data) ? $data->reconciliator_intro ?? '' : '' }}</textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Enter the Confidentiality assurance</label>
                <div class="sm-12 col-md-10">
                    <textarea name="confidentiality_assurance" class="form-control" placeholder="Enter the Confidentiality assurance">{{ isset($data) ? $data->confidentiality_assurance ?? '' : '' }}</textarea>
                </div>
            </div>
            
            <h3 class="text-blue">Coaxing</h3>
            
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Enter the individual session</label>
                <div class="sm-12 col-md-10">
                    <textarea name="individual_session" class="form-control" placeholder="Enter the individual session">{{ isset($data) ? $data->individual_session ?? '' : '' }}</textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Enter the Joint session</label>
                <div class="sm-12 col-md-10">
                    <textarea name="joint_session" class="form-control" placeholder="Enter the Joint session">{{ isset($data) ? $data->joint_session ?? '' : '' }}</textarea>
                </div>
            </div>
            
            <h3 class="text-blue">Substantive skills</h3>
            
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Neutrality/Impartiality</label>
                <div class="sm-12 col-md-10">
                    <textarea name="neutrality_impartiality" class="form-control" placeholder="Neutrality/Impartiality">{{ isset($data) ? $data->neutrality_impartiality ?? '' : '' }}</textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Helped parties to change positions</label>
                <div class="sm-12 col-md-10">
                    <textarea name="change_positions" class="form-control" placeholder="Helped parties to change positions">{{ isset($data) ? $data->change_positions ?? '' : '' }}</textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Helped parties to reach suggestions</label>
                <div class="sm-12 col-md-10">
                    <textarea name="reach_suggestions" class="form-control" placeholder="Helped parties to reach suggestions">{{ isset($data) ? $data->reach_suggestions ?? '' : '' }}</textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Helped parties to finalize suggestions</label>
                <div class="sm-12 col-md-10">
                    <textarea name="finalize_suggestions" class="form-control" placeholder="Helped parties to finalize suggestions">{{ isset($data) ? $data->finalize_suggestions ?? '' : '' }}</textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Helped parties to reach agreement</label>
                <div class="sm-12 col-md-10">
                    <textarea name="reach_agreement" class="form-control" placeholder="Helped parties to reach agreement">{{ isset($data) ? $data->reach_agreement ?? '' : '' }}</textarea>
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
