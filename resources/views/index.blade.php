@extends('../layouts/app')

@section('page-title', 'Advocacy - Home')

@section('content')


    <div class="container d-flex justify-content-center pb-5">
        <div>
            <a class="btn btn-primary" href="{{ route('admin.home') }}">Admin Login</a>
            <a class="btn btn-primary" href="{{ route('advisor.home') }}">Advisor Login</a>
            <a class="btn btn-primary" href="{{ route('student.home') }}">Student Login</a>
        </div>
    </div>

@endsection

@push('styles')
    <style>
        a>.card-box {
            background-image: linear-gradient(45deg, #0f0c29, #302b63, #24243e) !important;
            padding: 10px !important;
        }
    </style>
@endpush
