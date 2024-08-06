@extends('../layouts/app')

@section('page-title', 'Student - Home')

@section('content')

    @includeIf('student.partials._navbar')
    @includeIf('student.partials._sidebar')
    

    <div class="row pb-10">
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <a href="{{ route('student.my-caseload') }}">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap justify-content-center">
                        <div class="widget-data text-center">
                            <div class="weight-700 font-24 text-light">My Caseload</div>
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
