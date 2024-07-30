@extends('../layouts/app')

@section('page-title', 'Assign Case')

@section('content')

    @includeIf('admin.partials._navbar')
    @includeIf('admin.partials._sidebar')

    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Assigning Cases to Advisors</h4>
                <!-- <p class="mb-30">All fields are required</p> -->
            </div>
        </div>
        <form>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Select Case</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select2 form-control" name="state" style="width: 100%; height: 38px">
                        <option value="">Family Law</option>
                        <option value="">Case 2</option>
                        <option value="">Case 3</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Select Advisor</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select2 form-control" name="state" style="width: 100%; height: 38px">
                        <option value="">Advisor-1</option>
                        <option value="">Advisor-2</option>
                        <option value="">Advisor-3</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Select Students</label>
                <div class="col-sm-12 col-md-10 overflow-auto">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < 10; $i++) { ?>

                            <tr>
                                <th scope="row"><input type="checkbox"></th>
                                <th scope="row"><?php echo $i + 1; ?></th>
                                <td>Student - <?php echo $i + 1; ?></td>
                                <td>Student@gmail.com</td>

                            </tr>

                            <?php } ?>


                        </tbody>
                    </table>

                </div>
            </div>


            <div class="form-group row d-flex justify-content-end">
                <button class="btn btn-primary">Assign</button>
            </div>
        </form>
    </div>

@endsection

@push('styles')

@endpush
