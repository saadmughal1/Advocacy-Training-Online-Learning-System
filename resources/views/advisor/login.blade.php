@extends('../layouts/login-app')

@section('page-title', 'Advisor - Login')

@section('content')
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="{{ asset('vendors/images/login-bg.png') }}" alt="" width="60%" class="login-bg-img" id="banner-img"/>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Login To Advocacy</h2>
                        </div>

                        <form action="{{ route('advisor.login') }}" method="POST">
                            @csrf
                            <div class="input-group custom mb-0 mt-4">
                                <input type="text" class="form-control form-control-lg" placeholder="Username"
                                    name="username" value="{{ old('username') }}" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="input-group custom mb-0 mt-4">
                                <input type="password" class="form-control form-control-lg" placeholder="**********"
                                    name="password" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="row mt-4">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Sign In</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        @if (session('error'))
                            <span class="text-danger mt-3 text-center">
                                {{ session('error') }}
                            </span>
                        @endif
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
