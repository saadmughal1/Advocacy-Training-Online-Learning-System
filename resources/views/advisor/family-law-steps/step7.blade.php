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
                <video class="w-100" src="{{ asset('/storage/' . $data['predetails']['video']) }}" controls
                    type="video/mp4"></video>
            </div>
        </div>
    @endif



    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Procedural Skills</h4>
        </div>
        <div class="col-sm-12 col-md-10">
            <p class=""><b>Introduction of the
                    Reconciliator/Mediator:</b> {{ $data['form-data']->reconciliator_intro ?? 'Not Provided' }}</p>
            <p class=""><b>Confidentiality assurance:</b>
                {{ $data['form-data']->confidentiality_assurance ?? 'Not Provided' }}</p>
        </div>
    </div>



    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Coaxing</h4>
        </div>
        <div class="col-sm-12 col-md-10">
            <p class=""><b>Individual session:</b> {{ $data['form-data']->individual_session ?? 'Not Provided' }}
            </p>
            <p class=""><b>Joint session:</b> {{ $data['form-data']->joint_session ?? 'Not Provided' }}</p>
        </div>
    </div>



    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>Substantive skills</h4>
        </div>
        <div class="col-sm-12 col-md-10">
            <p class=""><b>Neutrality/Impartiality:</b>
                {{ $data['form-data']->neutrality_impartiality ?? 'Not Provided' }}</p>
            <p class=""><b>Helped parties to change positions:</b>
                {{ $data['form-data']->change_positions ?? 'Not Provided' }}</p>
            <p class=""><b>Helped parties to reach suggestions:</b>
                {{ $data['form-data']->reach_suggestions ?? 'Not Provided' }}</p>
            <p class=""><b>Helped parties to finalize suggestions:</b>
                {{ $data['form-data']->finalize_suggestions ?? 'Not Provided' }}</p>
            <p class=""><b>Helped parties to reach agreement:</b>
                {{ $data['form-data']->reach_agreement ?? 'Not Provided' }}</p>
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
        <input type="hidden" class="form-control" name="step" value="7">
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
            <input type="hidden" class="form-control" name="step" value="7">
            <div class="mb-20 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Unlock Next Step</button>
            </div>
        </form>
    @endif
@endif
