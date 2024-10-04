@extends('../layouts/app')

@section('page-title', 'Student Feedback')

@section('content')

    @includeIf('admin.partials._navbar')
    @includeIf('admin.partials._sidebar')

    @php
        $steps_titles = [
            'Interviewing the Client',
            'Sorting Facts from the Story',
            'Searching Relevant Laws/Rules/Policies',
            'Preparing Case Summaries',
            'Drafting the Plaint',
            'Written Statement',
            'Pretrial Reconciliation',
            'Framing of Issues',
            'Examination in Chief',
            'Cross Examination',
            'Final Arguments',
            'Post-trial Reconciliation',
            'Judgment',
            'Certification',
        ];
    @endphp


    <div class="accordion accordion-flush" id="family-law-steps-accordion">
        @foreach ($response as $index => $step)
            <div class="accordion-item">
                <button
                    {{ $response[$index]['form-data'] === null ? 'disabled style=background:#dc3545;' : 'style=background:#198754;' }}
                    class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapse{{ $loop->iteration }}" aria-expanded="false"
                    aria-controls="flush-collapse{{ $loop->iteration }}">
                    <h6 class="text-light">
                        Step: {{ $loop->iteration }} - {{ $steps_titles[$loop->iteration - 1] }}
                        {!! $loop->iteration - 1 != 0 && $response['step' . $loop->iteration - 1]['status'] === 0
                            ? '<i class="bi bi-lock-fill"></i>'
                            : '<i class="bi bi-unlock-fill"></i>' !!}
                    </h6>
                </button>
                <div id="flush-collapse{{ $loop->iteration }}" class="accordion-collapse collapse"
                    aria-labelledby="flush-heading1" data-bs-parent="#family-law-steps-accordion">
                    <div class="accordion-body">
                        @include('admin.family-law-steps.step' . $loop->iteration, [
                            'data' => $response[$index],
                        ])
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        a>.card-box {
            background-image: linear-gradient(45deg, #23074d, #cc5333) !important;
        }

        input,
        textarea {
            margin-bottom: 5px;
        }

        .accordion-button:focus {
            box-shadow: none;
            outline: none;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endpush
