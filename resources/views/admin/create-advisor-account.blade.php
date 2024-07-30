@extends('../layouts/app')

@section('page-title', 'Create Advisor Account')

@section('content')

    @includeIf('admin.partials._navbar')
    @includeIf('admin.partials._sidebar')

    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Create Advisor Account</h4>
                <p class="mb-30">All fields are required</p>
            </div>
        </div>

        <form>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Username</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter Advisor username" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" placeholder="Enter advisor email" type="email" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Ph Number</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="number" placeholder="Enter advisor phone number" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="password" placeholder="Enter advisor password" />
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
