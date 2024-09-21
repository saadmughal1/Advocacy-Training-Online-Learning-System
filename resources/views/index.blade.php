@extends('../layouts/app')

@section('page-title', 'Advocacy - Home')

@section('content')
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="{{ asset('vendors/images/login-bg.png') }}" alt="" width="60%" class="login-bg-img"
                        id="banner-img" />
                </div>
                <div class="col-md-6 col-lg-5">
                    <div>
                        <a class="btn btn-primary" href="{{ route('admin.home') }}">Admin Login</a>
                        <a class="btn btn-primary" href="{{ route('advisor.home') }}">Advisor Login</a>
                        <a class="btn btn-primary" href="{{ route('student.home') }}">Student Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        @media (max-width: 767px) {
            #banner-img {
                display: none !important;
            }
        }
    </style>
@endpush
