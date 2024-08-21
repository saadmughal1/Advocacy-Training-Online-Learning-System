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
            <h4>Header</h4>
        </div>
        <div class="col-sm-12 col-md-10">
            <p class=""><b>Court Name:</b> {{ $data['form-data']->court_name ?? 'Not Provided' }}</p>
            <p class=""><b>Plaintiff Details:</b> {{ $data['form-data']->plaintiff_details ?? 'Not Provided' }}
            </p>
            <p class=""><b>Defendant Details:</b> {{ $data['form-data']->defendant_details ?? 'Not Provided' }}
            </p>
        </div>
    </div>


    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Subject of the plaint</h4>
        </div>
        <div class="col-sm-12 col-md-10">
            <p class=""><b>Suit for dissolution of marriage:</b>
                {{ $data['form-data']->plaint_subject ?? 'Not Provided' }}</p>
        </div>
    </div>


    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Facts Relating to the Dispute</h4>
        </div>
        <div class="col-sm-12 col-md-10">
            <p class=""><b>Cause of Action:</b> {{ $data['form-data']->cause_of_action ?? 'Not Provided' }}</p>
            <p class=""><b>Territorial Jurisdiction:</b>
                {{ $data['form-data']->territorial_jurisdiction ?? 'Not Provided' }}</p>
            <p class=""><b>Court Fee:</b> {{ $data['form-data']->court_fee ?? 'Not Provided' }}</p>
        </div>
    </div>


    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Prayer</h4>
        </div>
        <div class="col-sm-12 col-md-10">
            <p class=""><b>Relief Claimed:</b> {{ $data['form-data']->relief_claimed ?? 'Not Provided' }}</p>
        </div>
    </div>

    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Schedule of Witnesses</h4>
        </div>
        <div class="col-sm-12 col-md-10">
            <p class=""><b>Number of Witnesses:</b> {{ $data['form-data']->witnesses_count ?? 'Not Provided' }}
            </p>
            <p class=""><b>Witnesses Details:</b> {{ $data['form-data']->witnesses_details ?? 'Not Provided' }}
            </p>
        </div>
    </div>



    <div class="form-group row border p-3">
        <label class="col-sm-12 col-md-2 col-form-label">Attach file:</label>
        <div class="col-sm-12 col-md-10">
            @if (!empty($data['form-data']->file_attachment))
                <a href="{{ route('downloadFiles', ['file_attachment' => $data['form-data']->file_attachment]) }}"
                    class="btn btn-primary">Download</a>
            @else
                Not Provided
            @endif
        </div>
    </div>




    <form action="{{ route('advisor.add-feedback-marks-family-law-case') }}" method="GET">
        @csrf
        <input type="hidden" class="form-control" name="fid" value="{{ $data['form-data']->id ?? '' }}">
        <input type="hidden" class="form-control" name="step" value="5">
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Give Feedback:</label>
            <div class="sm-12 col-md-10">
                <textarea class="form-control" name="feedback">{{ $data['form-data']->feedback ?? '' }}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Give Marks</label>
            <div class="sm-12 col-md-10">
                <input type="number" class="form-control" name="marks" value="{{ $data['form-data']->marks ?? '' }}"
                    min="0" max="10">
            </div>
        </div>

        @if (isset($data['form-data']->status) && $data['form-data']->status == 0)
            <div class="form-group row">
                <div class="col-lg-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </div>
            </div>
        @endif
    </form>



</div>

@if (!empty($data['form-data']->marks))
    @if ($data['form-data']->status == 0)
        <form action="{{ route('advisor.next-step-family-law') }}" method="GET">
            <input type="hidden" class="form-control" name="fid" value="{{ $data['form-data']->id ?? '' }}">
            <input type="hidden" class="form-control" name="step" value="5">
            <div class="mb-20 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Unlock Next Step</button>
            </div>
        </form>
    @endif
@endif
