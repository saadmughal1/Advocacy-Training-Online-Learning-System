@extends('../layouts/app')

@section('page-title', 'Create Student Account')

@section('content')

    @includeIf('admin.partials._navbar')
    @includeIf('admin.partials._sidebar')

    <div class="pd-20 card-box mb-30">
        @if (session('message'))
            <div class="alert alert-success" id="success-message">
                {{ session('message') }}
                <a href="{{ route('admin.view-students') }}">View Students</a>
            </div>
        @endif
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Create Student Account</h4>
                <p class="mb-30">All fields are required</p>
            </div>
        </div>

        <form action="{{ route('admin.create-student-account') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Username</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control @error('username') is-invalid @enderror" type="text"
                        placeholder="Enter student username" name="username" value="{{ old('username') }}"  autocomplete="off"/>
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control @error('email') is-invalid @enderror" placeholder="Enter student email"
                        type="email" name="email" value="{{ old('email') }}" autocomplete="off"/>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Ph Number</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control @error('phno') is-invalid @enderror" type="number"
                        placeholder="Enter student phone number" name="phno" value="{{ old('phno') }}" autocomplete="off"/>
                    @error('phno')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control @error('password') is-invalid @enderror" type="password"
                        placeholder="Enter student password" name="password" autocomplete="off"/>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row d-flex justify-content-end">
                <button class="btn btn-primary">Create</button>
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
        });
    </script>
@endpush
