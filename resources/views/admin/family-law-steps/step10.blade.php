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

                @if (filter_var($data['predetails']['video'], FILTER_VALIDATE_URL))
                    <a href="{{ $data['predetails']['video'] }}" target="_blank" class="btn btn-primary mt-3">View
                        Video</a>
                @else
                    <video class="w-100" src="{{ asset('/storage/' . $data['predetails']['video']) }}" controls
                        type="video/mp4"></video>
                @endif

            </div>
        </div>
    @endif


    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Procedural Steps</h4>
        </div>
        <div class="col-sm-12 col-md-10">
            <p class=""><b>Oath Taking:</b> {{ $data['form-data']->oath_taking ?? 'Not Provided' }}</p>
            <p class=""><b>Address of Party/Witness Statement:</b>
                {{ $data['form-data']->address_party_witness_statement ?? 'Not Provided' }}</p>
            <p class=""><b>Signature of Party/Witness:</b>
                {{ $data['form-data']->signature_party_witness ?? 'Not Provided' }}</p>
            <p class=""><b>Counter Signature of Judge:</b>
                {{ $data['form-data']->counter_signature_judge ?? 'Not Provided' }}</p>
        </div>
    </div>

    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Substantive Steps</h4>
        </div>
        <div class="col-sm-12 col-md-10">
            <p class=""><b>Straight Questions:</b> {{ $data['form-data']->straight_questions ?? 'Not Provided' }}
            </p>
            <p class=""><b>No Leading Questions:</b>
                {{ $data['form-data']->no_leading_questions ?? 'Not Provided' }}</p>
            <p class=""><b>Objections by Other Party:</b>
                {{ $data['form-data']->objections_other_party ?? 'Not Provided' }}</p>
            <p class=""><b>Statement According to Pleadings:</b>
                {{ $data['form-data']->statement_according_pleadings ?? 'Not Provided' }}</p>

            <p class=""><b>Impeach Credit of Witness:</b>
                {{ $data['form-data']->impeach_credit_witness ?? 'Not Provided' }}</p>

            <p class=""><b>Only Relevant Questions:</b>
                {{ $data['form-data']->only_relevant_questions ?? 'Not Provided' }}</p>

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
        <input type="hidden" class="form-control" name="step" value="10">
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Give Feedback:</label>
            <div class="sm-12 col-md-10">
                <textarea class="form-control" name="feedback">{{ $data['form-data']->feedback ?? '' }}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Marks</label>
            <div class="sm-12 col-md-10">
                <input type="number" class="form-control" name="marks" value="{{ $data['form-data']->marks ?? '' }}"
                    min="0" max="10">
            </div>
        </div>

    </form>



</div>


@if (!empty($data['form-data']->marks))
    @if ($data['form-data']->status == 1)
        <form action="{{ route('admin.unlock-current-next-step-family-law') }}" method="GET">
            <input type="hidden" class="form-control" name="fid" value="{{ $data['form-data']->id ?? '' }}">
            <input type="hidden" class="form-control" name="step" value="10">
            <div class="mb-20 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Unlock this step</button>
            </div>
        </form>
    @endif
@endif
