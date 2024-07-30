@extends('../layouts/app')

@section('page-title', 'View Students')

@section('content')

    @includeIf('admin.partials._navbar')
    @includeIf('admin.partials._sidebar')

    <div class="pd-20 card-box mb-30 overflow-auto">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Students</h4>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ph Number</th>
                    <th scope="col">Password</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < 10; $i++) { ?>

                <tr>
                    <th scope="row"><?php echo $i + 1; ?></th>
                    <td>Student - <?php echo $i + 1; ?></td>
                    <td>Student@gmail.com</td>
                    <td>00-00-00</td>
                    <td>******</td>
                    <td><a href="edit-student"><span class="badge badge-primary">Edit</span></a></td>
                    <td><a href="#"><span class="badge badge-danger">Delete</span></a></td>
                </tr>

                <?php } ?>


            </tbody>
        </table>

    </div>

@endsection

@push('styles')
   
@endpush
