@extends('../layouts/app')

@section('page-title', 'Family Law step-3')

@section('content')

    @includeIf('student.partials._navbar')
    @includeIf('student.partials._sidebar')

    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20 text-center">
            <div class="">
                <h2 class="text-blue">Step 03: Searching Relavant Laws/Rules/Policies</h2>
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
                <p>{{ $case->step_3_introduction }}</p>
            </div>
        </div>


        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">Instructions:</h5>
                <p>{{ $case->step_3_instructions }}</p>
            </div>
        </div>

        <form action="{{ route('student.insert-family-law-step-3') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="aid" value="{{ request()->query('aid') }}">
            <input type="hidden" name="caseid" value="{{ request('caseId') }}">

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Name of the Group *</label>
                <div class="sm-12 col-md-10">
                    <input type="text" name="group_name" class="form-control" placeholder="Enter name of the group"
                        value="{{ isset($data) ? $data->group_name ?? '' : '' }}" required>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Ground(s) for dissolution</label>
                <div class="sm-12 col-md-10">
                    <input type="text" name="dissolution_grounds" class="form-control" placeholder="Ground(s) for dissolution"
                        value="{{ isset($data) ? $data->dissolution_grounds ?? '' : '' }}" required>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Enactments with relevant provisions</label>
                <div class="sm-12 col-md-10">
                    <input type="text" name="enactments_provisions" class="form-control" placeholder="Enactments with relevant provisions"
                        value="{{ isset($data) ? $data->enactments_provisions ?? '' : '' }}" required>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Rules with relevant provisions</label>
                <div class="sm-12 col-md-10">
                    <input type="text" name="rules_provisions" class="form-control" placeholder="Rules with relevant provisions"
                        value="{{ isset($data) ? $data->rules_provisions ?? '' : '' }}" required>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Relevant caselaw</label>
                <div class="sm-12 col-md-10">
                    <input type="text" name="relevant_caselaw" class="form-control" placeholder="Relevant caselaws, if you want to input multiple caselaws, then put ',' in between"
                        value="{{ isset($data) ? $data->relevant_caselaw ?? '' : '' }}" required>
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
