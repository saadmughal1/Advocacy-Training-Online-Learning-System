@extends('../layouts/app')

@section('page-title', 'Admin - Home')

@section('content')

    @includeIf('admin.partials._navbar')
    @includeIf('admin.partials._sidebar')

    <div class="row pb-10">
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <a href="{{ route('admin.create-advisor-account') }}">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap justify-content-center">
                        <div class="widget-data text-center">
                            <div class="weight-700 font-24 text-light">Create Advisor Account</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <a href="{{ route('admin.view-advisors') }}">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap justify-content-center">
                        <div class="widget-data text-center">
                            <div class="weight-700 font-24 text-light">View All Advisors</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <a href="{{ route('admin.create-student-account') }}">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap justify-content-center">
                        <div class="widget-data text-center">
                            <div class="weight-700 font-24 text-light">Create Student Account</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <a href="{{ route('admin.view-students') }}">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap justify-content-center">
                        <div class="widget-data text-center">
                            <div class="weight-700 font-24 text-light">View All Students</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <a href="{{ route('admin.initiate-case') }}">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap justify-content-center">
                        <div class="widget-data text-center">
                            <div class="weight-700 font-24 text-light">Initiate a Case</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <a href="{{ route('admin.display-cases') }}">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap justify-content-center">
                        <div class="widget-data text-center">
                            <div class="weight-700 font-24 text-light">Display All Cases</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <a href="{{ route('admin.assign-case') }}">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap justify-content-center">
                        <div class="widget-data text-center">
                            <div class="weight-700 font-24 text-light">Assigning Cases to Advisors</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <a href="{{ route('admin.advisor-caseload') }}">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap justify-content-center">
                        <div class="widget-data text-center">
                            <div class="weight-700 font-24 text-light">Advisor Caseload</div>
                        </div>
                    </div>
                </div>
            </a>
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
