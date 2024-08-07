@extends('../layouts/app')

@section('page-title', 'Students Caseload')

@section('content')

    @includeIf('advisor.partials._navbar')
    @includeIf('advisor.partials._sidebar')

    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Students Caseload</h4>
            </div>
        </div>

        @if ($cases->isEmpty())
            <p class="text-center">No cases found.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Case Type</th>
                        <th scope="col">Case Name</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @php $index = 0; @endphp
                    @foreach ($cases as $case)
                        <tr>
                            <th scope="row">{{ ++$index }}</th>
                            <td>{{ ucfirst(str_replace('_', ' ', $case->case_type)) }}</td>
                            <td>{{ $case->case_name }}</td>
                            <td>
                                <a class="btn btn-primary"
                                href="{{ route('advisor.students-in-case', ['caseId' => $case->id]) }}">
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
