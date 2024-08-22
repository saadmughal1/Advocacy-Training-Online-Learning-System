@extends('../layouts/app')

@section('page-title', 'Family Law step-11')

@section('content')

    @includeIf('student.partials._navbar')
    @includeIf('student.partials._sidebar')

    <div class="pd-20 card-box mb-30">

        <div class="clearfix mb-20 text-center">
            <div class="">
                <h2 class="text-blue">Step 11: Final Arguments</h2>
            </div>
        </div>


        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">Introduction:</h5>
                <p>{{ $case->step_11_introduction }}</p>
            </div>
        </div>


        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">Instructions:</h5>
                <p>{{ $case->step_11_instructions }}</p>
            </div>
        </div>


        @if (!empty($case->step_11_video))
            <div class="clearfix mb-20 text-center">
                <div class="">
                    <h5 class="text-blue text-center">Role Play Video</h5>
                    <video class="w-100" src="{{ asset('/storage/' . $case->step_11_video) }}" controls
                        type="video/mp4"></video>
                </div>
            </div>
        @endif


        <form action="{{ route('student.insert-family-law-step-11') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="aid" value="{{ request()->query('aid') }}">
            <input type="hidden" name="caseid" value="{{ request('caseId') }}">

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Opening para: containing facts of the case</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" name="opening_para_facts" placeholder="Opening para: containing facts of the case">{{ isset($data) ? $data->opening_para_facts ?? '' : '' }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Second para: Issue(s) framed</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" name="second_para_issues" placeholder="Second para: Issue(s) framed">{{ isset($data) ? $data->second_para_issues ?? '' : '' }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Third para: Evidence presented and admitted by the
                    court</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" name="third_para_evidence"
                        placeholder="Third para: Evidence presented and admitted by the court">{{ isset($data) ? $data->third_para_evidence ?? '' : '' }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Fourth para: Relevant law(s) and how are they
                    relevant</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" name="fourth_para_relevant_law"
                        placeholder="Fourth para: Relevant law(s) and how are they relevant">{{ isset($data) ? $data->fourth_para_relevant_law ?? '' : '' }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Fifth para: Relevant case law(s) and how they are
                    relevant</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" name="fifth_para_relevant_case_law"
                        placeholder="Fifth para: Relevant case law(s) and how they are relevant">{{ isset($data) ? $data->fifth_para_relevant_case_law ?? '' : '' }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Sixth para: Closing para with prayer</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" name="sixth_para_closing_prayer" placeholder="Sixth para: Closing para with prayer">{{ isset($data) ? $data->sixth_para_closing_prayer ?? '' : '' }}</textarea>
                </div>
            </div>




            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">The outlook based on the following:</label>
                <div class="col-sm-12 col-md-10">
                    <div class="checkbox-group">
                        @php
                            $outlook_based = json_decode($data->outlook_based ?? '[]');
                        @endphp

                        @foreach (['In Writing', 'Paragraphed', 'Signature of the lawyer', 'Stamp of the court'] as $index => $outlook)
                            <label for="outlook_based_{{ $index + 1 }}">
                                <input type="checkbox" id="outlook_based_{{ $index + 1 }}" name="outlook_based[]"
                                    value="{{ $outlook }}" {{ in_array($outlook, $outlook_based) ? 'checked' : '' }}>
                                {{ $outlook }}
                            </label>
                            <br>
                        @endforeach
                    </div>
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
