@extends('../layouts/app')

@section('page-title', 'Initiate Case')

@section('content')

    @includeIf('admin.partials._navbar')
    @includeIf('admin.partials._sidebar')

    <form action="">

        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Select Case Type</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <select class="custom-select2 form-control" name="state" style="width: 100%; height: 38px">
                            <option value="">Family Law</option>
                            <option value="">Case 2</option>
                            <option value="">Case 3</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>


        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <!-- <h4 class="text-blue h4">---</h4> -->
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Enter the name of case</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the name of case" />
                </div>
            </div>

        </div>



        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Step:1 - Interviewing the Client</h4>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the introduction" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the instructions" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Video Link</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="file" />
                </div>
            </div>

        </div>


        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Step:2 - Sorting Facts from the Story</h4>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the introduction" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the instructions" />
                </div>
            </div>

        </div>


        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Step:3 - Searching Relavant Laws/Rules/Policies</h4>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the introduction" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the instructions" />
                </div>
            </div>

        </div>


        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Step:4 - Preparing Case Summaries</h4>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the introduction" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the instructions" />
                </div>
            </div>

        </div>


        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Step:5 - Drafting the plaint</h4>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the introduction" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the instructions" />
                </div>
            </div>

        </div>


        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Step:6 - Written Statement</h4>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the introduction" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the instructions" />
                </div>
            </div>

        </div>



        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Step:7 - IPretrial Reconciliation</h4>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the introduction" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the instructions" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Video Link</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="file" />
                </div>
            </div>

        </div>



        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Step 8: - Framing of issues</h4>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the introduction" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the instructions" />
                </div>
            </div>

        </div>


        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Step:9 - Examination in chief</h4>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the introduction" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the instructions" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Video Link</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="file" />
                </div>
            </div>

        </div>

        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Step:10 - Cross Examination</h4>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the introduction" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the instructions" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Video Link</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="file" />
                </div>
            </div>

        </div>

        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Step:11 - Final Arguments</h4>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the introduction" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the instructions" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Video Link</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="file" />
                </div>
            </div>

        </div>

        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Step:12 - Post-trial Reconciliation</h4>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the introduction" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the instructions" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Video Link</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="file" />
                </div>
            </div>
        </div>

        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Step 13: - Group presentations</h4>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the introduction" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the instructions" />
                </div>
            </div>

        </div>


        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Step 14: - Certification</h4>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the introduction" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" placeholder="Enter the instructions" />
                </div>
            </div>

        </div>


        <div class="form-group row d-flex justify-content-center">
            <button class="btn btn-primary">Initiate the case</button>
        </div>


    </form>


@endsection

@push('styles')
  
@endpush
