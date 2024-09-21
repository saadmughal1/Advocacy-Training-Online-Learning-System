<!-- resources/views/advisor/students-in-case.blade.php -->

@extends('../layouts/app')

@section('page-title', 'Students in case')

@section('content')

    @includeIf('advisor.partials._navbar')
    @includeIf('advisor.partials._sidebar')

    <div class="pd-20 card-box mb-30 overflow-auto">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Students in Case</h4>
            </div>
        </div>

        @if ($students->isEmpty())
            <p class="text-center">No Students assigned to this case.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $index => $student)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $student->username }}</td>
                            <td>{{ $student->email }}</td>
                            <td class="text-center">
                                <a class="btn btn-primary"
                                    href="{{ route('advisor.query', ['sid' => $student->id, 'username' => $student->username]) }}">
                                    Chat
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-primary"
                                    href="{{ route('advisor.student-feedback', ['caseType' => request('caseType'), 'caseId' => request('caseId'), 'sid' => $student->id]) }}">View
                                    Feedback</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>

@endsection

@push('styles')
@endpush
