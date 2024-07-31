@extends('../layouts/app')

@section('page-title', 'Edit Student Account')

@section('content')

    @includeIf('admin.partials._navbar')
    @includeIf('admin.partials._sidebar')

    <div class="pd-20 card-box mb-30">
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
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Edit Student Account</h4>
                <p class="mb-30">All fields are required</p>
            </div>
        </div>

        <form action="{{ route('admin.edit-student-account', $student->id) }}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Username</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control @error('username') is-invalid @enderror" type="text"
                        placeholder="Enter student username" name="username" value="{{ old('username', $student->username) }}" />
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control @error('email') is-invalid @enderror" placeholder="Enter student email"
                        type="email" name="email" value="{{ old('email', $student->email) }}" />
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Phone Number</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control @error('phno') is-invalid @enderror" type="text"
                        placeholder="Enter student phone number" name="phno" value="{{ old('phno', $student->phone_number) }}" />
                    @error('phno')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control @error('password') is-invalid @enderror" type="text"
                        placeholder="Enter student password" name="password" value="{{ old('password', $student->password) }}"/>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row d-flex justify-content-end">
                <button class="btn btn-primary">Update</button>
            </div>

        </form>
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
