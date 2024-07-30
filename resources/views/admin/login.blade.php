@extends('../layouts/login-app')

@section('page-title', 'Admin - Login')

@section('content')
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="../vendors/images/login-bg.png" alt="" width="60%" class="login-bg-img" />
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Login To Advocacy</h2>
                        </div>
                        <form>
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" placeholder="Username" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" placeholder="**********" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <a class="btn btn-primary btn-lg btn-block" href="../#">Sign In</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    
@endpush
