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


    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            {{-- <h4>Group Name</h4> --}}
        </div>
        <div class="col-sm-12 col-md-10">
            <p class=""><b>Group Name:</b> {{ $data['form-data']->group_name ?? 'Not Provided' }}</p>
            <p class=""><b>Plaintiff Name:</b> {{ $data['form-data']->plaintiff_name ?? 'Not Provided' }}</p>
            <p class=""><b>Defendant Name:</b> {{ $data['form-data']->defendant_name ?? 'Not Provided' }}</p>
            <p class=""><b>Wife Residence:</b> {{ $data['form-data']->wife_residence ?? 'Not Provided' }}</p>
            <p class=""><b>No of childeren:</b> {{ $data['form-data']->number_of_children ?? 'Not Provided' }}</p>
            <p class=""><b>Wife Income:</b> {{ $data['form-data']->wife_income ?? 'Not Provided' }}</p>
            <p class=""><b>Husband Income:</b> {{ $data['form-data']->husband_income ?? 'Not Provided' }}</p>
            <p class=""><b>Clash Reason:</b> {{ $data['form-data']->clash_reason ?? 'Not Provided' }}</p>
            <p class=""><b>Wife Prayers:</b> {{ $data['form-data']->wife_prayers ?? 'Not Provided' }}</p>

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
        <input type="hidden" class="form-control" name="step" value="2">
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
            <input type="hidden" class="form-control" name="step" value="2">
            <div class="mb-20 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Unlock this step</button>
            </div>
        </form>
    @endif
@endif
