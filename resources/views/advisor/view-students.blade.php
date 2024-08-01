@extends('../layouts/app')

@section('page-title', 'View Students')

@section('content')

    @includeIf('advisor.partials._navbar')
    @includeIf('advisor.partials._sidebar')

    <div class="pd-20 card-box mb-30">

        @if (session('success'))
            <div class="alert alert-success" id="success-message">
                {{ session('success') }}
            </div>
        @endif

        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Assign Case - {{ $caseName }} to Students</h4>
            </div>
        </div>

        <form action="{{ route('advisor.assign-case') }}" method="POST" class="overflow-auto">
            @csrf
            <input type="hidden" name="case_id" value="{{ request()->query('case_id') }}">
            <input type="hidden" name="case_name" value="{{ request()->query('case_name') }}">

            @if ($studentsNotInStudentCases->isEmpty())
                <p class="text-center">No students available to assign.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Assign Student</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $index = 0; @endphp
                        @foreach ($studentsNotInStudentCases as $student)
                            <tr>
                                <th scope="row">{{ ++$index }}</th>
                                <td>{{ $student->username }}</td>
                                <td>{{ $student->email }}</td>
                                <td><input type="checkbox" name="students[]" value="{{ $student->id }}"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            <div class="form-group row d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Assign</button>
            </div>
        </form>

    </div>

@endsection

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


        });
    </script>
@endpush
