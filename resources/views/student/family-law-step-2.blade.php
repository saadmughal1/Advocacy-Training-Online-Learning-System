@extends('../layouts/app')

@section('page-title', 'Family Law step-2')

@section('content')

    @includeIf('student.partials._navbar')
    @includeIf('student.partials._sidebar')

    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20 text-center">
            <div class="">
                <h2 class="text-blue">Step: 2 - Sorting Facts from the Story</h2>
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
                <p>{{ $case->step_2_introduction }}</p>
            </div>
        </div>

        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">Instructions:</h5>
                <p>{{ $case->step_2_instructions }}</p>
            </div>
        </div>



 
        <form action="{{ route('student.insert-family-law-step-2') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="aid" value="{{ request()->query('aid') }}">
            <input type="hidden" name="caseid" value="{{ request('caseId') }}">

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Name of the Group *</label>
                <div class="col-sm-12 col-md-10">
                    <input type="text" name="group_name" class="form-control" placeholder="Enter name of the group"
                        value="{{ isset($data) ? $data->group_name ?? '' : '' }}" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Name of the Plaintiff *</label>
                <div class="col-sm-12 col-md-10">
                    <input type="text" name="plaintiff_name" class="form-control" placeholder="Name of the Plaintiff"
                        value="{{ isset($data) ? $data->plaintiff_name ?? '' : '' }}" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Name of the Defendant *</label>
                <div class="col-sm-12 col-md-10">
                    <input type="text" name="defendant_name" class="form-control" placeholder="Name of the Defendant"
                        value="{{ isset($data) ? $data->defendant_name ?? '' : '' }}" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Current place of residence of wife *</label>
                <div class="col-sm-12 col-md-10">
                    <input type="text" name="wife_residence" class="form-control"
                        placeholder="Current place of residence of wife"
                        value="{{ isset($data) ? $data->wife_residence ?? '' : '' }}" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Number of children</label>
                <div class="col-sm-12 col-md-10">
                    <input type="number" name="number_of_children" class="form-control" placeholder="Number of children"
                        value="{{ isset($data) ? $data->number_of_children ?? '' : '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Income of the wife *</label>
                <div class="col-sm-12 col-md-10">
                    <input type="number" step="0.01" name="wife_income" class="form-control"
                        placeholder="Income of the wife" value="{{ isset($data) ? $data->wife_income ?? '' : '' }}"
                        required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Income of the husband/month *</label>
                <div class="col-sm-12 col-md-10">
                    <input type="number" step="0.01" name="husband_income" class="form-control"
                        placeholder="Income of the husband/month"
                        value="{{ isset($data) ? $data->husband_income ?? '' : '' }}" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Reason/Ground & date of starting of clash *</label>
                <div class="col-sm-12 col-md-10">
                    <input type="text" name="clash_reason" class="form-control"
                        placeholder="Reason/Ground & date of starting of clash"
                        value="{{ isset($data) ? $data->clash_reason ?? '' : '' }}" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Prayer(s) of the wife</label>
                <div class="col-sm-12 col-md-10">
                    <textarea name="wife_prayers" class="form-control" placeholder="Prayer(s) of the wife">{{ isset($data) ? $data->wife_prayers ?? '' : '' }}</textarea>
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
