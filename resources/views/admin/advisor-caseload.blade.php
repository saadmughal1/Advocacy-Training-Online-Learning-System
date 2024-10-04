@extends('../layouts/app')

@section('page-title', 'Advisor Caseload')

@section('content')

    @includeIf('admin.partials._navbar')
    @includeIf('admin.partials._sidebar')

    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Advisor Caseload</h4>
            </div>
        </div>

        @if ($advisorCases->isEmpty())
            <p class="text-center">No cases found.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Advisor Name</th>
                        <th scope="col">Case Type</th>
                        <th scope="col">Case Name</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @php $index = 0; @endphp
                    @foreach ($advisorCases as $advisorCase)
                        <tr>
                            <th scope="row">{{ ++$index }}</th>
                            <td>{{ $advisorCase->username }}</td>
                            <td>{{ ucfirst(str_replace('_', ' ', $advisorCase->case_type)) }}</td>
                            <td>{{ $advisorCase->case_name }}</td>
                            <td>
                                <a class="btn btn-primary"
                                    href="{{ route('admin.students-in-advisor-case', ['caseType' => $advisorCase->case_type, 'caseId' => $advisorCase->case_id, 'advisorId' => $advisorCase->advisor_id]) }}">
                                    View Students
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
