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
            {{-- <h4>Procedural Steps</h4> --}}
        </div>
        <div class="col-sm-12 col-md-10">
            <p class=""><b>Opening para: containing facts of the case:</b>
                {{ $data['form-data']->opening_para_facts ?? 'Not Provided' }}</p>
            <p class=""><b>Second para: Issue(s) framed:</b>
                {{ $data['form-data']->second_para_issues ?? 'Not Provided' }}</p>
            <p class=""><b>Third para: Evidence presented and admitted by the
                    court:</b> {{ $data['form-data']->third_para_evidence ?? 'Not Provided' }}</p>
            <p class=""><b>Fourth para: Relevant law(s) and how are they
                    relevant:</b> {{ $data['form-data']->fourth_para_relevant_law ?? 'Not Provided' }}</p>
            <p class=""><b>Fifth para: Relevant case law(s) and how they are
                    relevant:</b> {{ $data['form-data']->fifth_para_relevant_case_law ?? 'Not Provided' }}</p>
            <p class=""><b>Sixth para: Closing para with prayer:</b>
                {{ $data['form-data']->sixth_para_closing_prayer ?? 'Not Provided' }}</p>
        </div>
    </div>


    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            <h4>The outlook based on the following:</h4>
        </div>
        <div class="sm-12 col-md-10">
            <div class="checkbox-group">

                <p class="">
                    @php
                        $outlook_based = $data['form-data']->outlook_based ?? null;
                        if (is_string($outlook_based)) {
                            $outlook_based = json_decode($outlook_based, true);
                        }
                    @endphp

                    @if (!empty($outlook_based))
                        <ul style="list-style-type: disc; padding-left: 20px;">
                            @foreach ($outlook_based as $outlook)
                                <li>{{ $outlook }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>No outlook based available.</p>
                    @endif
                </p>
            </div>
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
        <input type="hidden" class="form-control" name="step" value="11">
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
            <input type="hidden" class="form-control" name="step" value="11">
            <div class="mb-20 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Unlock Next Step</button>
            </div>
        </form>
    @endif
@endif
