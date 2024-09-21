@extends('../layouts/app')

@section('page-title', 'View Advisors')

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
            {{-- <div class="pull-left">
                <h4 class="text-blue h4">Advisors</h4>
            </div> --}}

            <form action="{{ route('admin.search-advisor') }}" method="GET">
                <div class="form-group row">
                    <div class="col-sm-12 col-md-10 mt-2">
                        <input class="form-control" type="search" placeholder="Search Advisors" name="search"
                            autocomplete="off" required value="{{ request('search') ?? '' }}" />
                    </div>
                    <div class="col-sm-12 col-md-2 d-flex justify-content-end mt-2">
                        <button class="btn btn-primary w-100">Search</button>
                    </div>
                </div>
            </form>
        </div>

        @if ($advisors->isEmpty())
            <p class="text-center"><b>No advisors found.</b></p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Password</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($advisors as $index => $advisor)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $advisor->username }}</td>
                            <td>{{ $advisor->email }}</td>
                            <td>{{ $advisor->phone_number }}</td>
                            <td>{{ $advisor->password }}</td>
                            <td>
                                <a href="{{ route('admin.edit-advisor-account', $advisor->id) }}">
                                    <span class="badge badge-primary border-0">Edit</span>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.delete-advisor', $advisor->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this advisor?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="badge badge-danger border-0">Delete</button>
                                </form>
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
