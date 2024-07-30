@extends('../layouts/app')

@section('page-title', 'View Students')

@section('content')

    @includeIf('advisor.partials._navbar')
    @includeIf('advisor.partials._sidebar')

    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Assign case - 1 to Students</h4>
            </div>
        </div>

        <form action="" class="overflow-auto">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Assign Student</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < 10; $i++) { ?>

                    <tr>
                        <th scope="row"><?php echo $i + 1; ?></th>
                        <td>Student - <?php echo $i + 1; ?></td>
                        <td>Student@gmail.com</td>
                        <th scope=""><input type="checkbox"></th>
                    </tr>

                    <?php } ?>
                </tbody>
            </table>

            <div class="form-group row d-flex justify-content-end">
                <button class="btn btn-primary">Assign</button>
            </div>

        </form>

    </div>


@endsection

@push('styles')
@endpush
