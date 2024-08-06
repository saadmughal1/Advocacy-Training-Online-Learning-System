@extends('../layouts/app')

@section('page-title', 'Display Cases')

@section('content')

    @includeIf('admin.partials._navbar')
    @includeIf('admin.partials._sidebar')

    <div class="pd-20 card-box mb-30 overflow-auto">
        @if (session('message'))
            <div class="alert alert-success" id="success-message">
                {{ session('message') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger" id="error-message">
                {{ session('error') }}
            </div>
        @endif

        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Display Cases</h4>
            </div>
        </div>

        @if ($cases->isEmpty())
            <p class="text-center"><b>No cases found.</b></p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Case Type</th>
                        <th scope="col">Case Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cases as $index => $case)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $case['case_type'] }}</td>
                            <td>{{ $case['case_name'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>

@endsection

@push('styles')
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
                    }, 1000);
                }, 2000);
            }

            const errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                setTimeout(function() {
                    errorMessage.style.transition = 'opacity 1s ease-out';
                    errorMessage.style.opacity = '0';
                    setTimeout(function() {
                        errorMessage.remove();
                    }, 1000);
                }, 2000);
            }
        });
    </script>
@endpush
