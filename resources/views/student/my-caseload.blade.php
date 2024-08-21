@extends('../layouts/app')

@section('page-title', 'Assigned Cases')

@section('content')

    @includeIf('student.partials._navbar')
    @includeIf('student.partials._sidebar')

    <div class="pd-20 card-box mb-30 overflow-auto">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Assigned Cases</h4>
            </div>
        </div>

        <!-- Display Flash Message -->
        @if (session('info'))
            <div class="alert alert-info" id="info-message">
                {{ session('info') }}
            </div>
        @endif


        @if (session('message'))
            <div class="alert alert-info" id="success-message">
                {{ session('message') }}
            </div>
        @endif


        @if ($cases->isEmpty())
            <p class="text-center">No cases found.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Advisor</th>
                        <th scope="col">Case Type</th>
                        <th scope="col">Case Name</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cases as $index => $case)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $case->advisor_username }}</td>
                            <td>{{ $case->case_type }}</td>
                            <td>{{ $case->case_name }}</td>
                            <td>
                                <a class="btn btn-primary"
                                    href="{{ route('student.start-case', ['caseId' => $case->student_case_id, 'caseType' => $case->case_type, 'aid' => $case->advisor_id]) }}">
                                    Start Case
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

@endsection

@push('styles')
    <style>
        a>.card-box {
            background-image: linear-gradient(45deg, #23074d, #cc5333) !important;
        }
    </style>
@endpush


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.getElementById('success-message');

            if (successMessage) {
                setTimeout(function() {
                        successMessage.style.transition = 'opacity 1s ease-out';
                        successMessage.style.opacity = '0';

                        setTimeout(function() {
                                successMessage.remove();
                            }

                            , 1000);
                    }

                    , 2000);
            }


            const infoMessage = document.getElementById('info-message');

            if (infoMessage) {
                setTimeout(function() {
                        infoMessage.style.transition = 'opacity 1s ease-out';
                        infoMessage.style.opacity = '0';

                        setTimeout(function() {
                                infoMessage.remove();
                            }

                            , 1000);
                    }

                    , 2000);
            }

        });
    </script>
@endpush
