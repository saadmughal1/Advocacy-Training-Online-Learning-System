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
            {{-- <h4></h4> --}}
        </div>
        <div class="sm-12 col-md-12 overflow-auto">
            @php
                $issue_law = isset($data['form-data']) ? json_decode($data['form-data']->issue_law, true) : null;
            @endphp

            <table border="1" class="table text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Issue Law</th>
                        <th>Onus to Prove</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!is_null($issue_law) && !empty($issue_law))
                        @foreach ($issue_law as $index => $law)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $law['law'] ?? 'N/A' }}</td>
                                <td>{{ $law['prove'] ?? 'N/A' }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No Law available</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>



    <div class="form-group row border p-3">
        <div class="col-sm-12 text-center">
            {{-- <h4></h4> --}}
        </div>
        <div class="sm-12 col-md-12 overflow-auto">
            @php
                $issue_fact = isset($data['form-data']) ? json_decode($data['form-data']->issue_fact, true) : null;
            @endphp

            <table border="1" class="table text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Issue Law</th>
                        <th>Onus to Prove</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!is_null($issue_fact) && !empty($issue_fact))
                        @foreach ($issue_fact as $index => $fact)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $fact['fact'] ?? 'N/A' }}</td>
                                <td>{{ $fact['prove'] ?? 'N/A' }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No Fact available</td>
                        </tr>
                    @endif
                </tbody>
            </table>
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
        <input type="hidden" class="form-control" name="step" value="8">
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
            <input type="hidden" class="form-control" name="step" value="8">
            <div class="mb-20 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Unlock Next Step</button>
            </div>
        </form>
    @endif
@endif
