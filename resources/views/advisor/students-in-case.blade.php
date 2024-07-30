@extends('../layouts/app')

@section('page-title', 'Students in case')

@section('content')

    @includeIf('advisor.partials._navbar')
    @includeIf('advisor.partials._sidebar')

    <div class="pd-20 card-box mb-30 overflow-auto">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Students in case</h4>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < 10; $i++) { ?>

                <tr>
                    <th scope="row"><?php echo $i + 1; ?></th>
                    <td>Student - <?php echo $i + 1; ?></td>
                    <td>Student@gmail.com</td>
                    <th><a class="btn btn-primary" href="{{route("advisor.student-feedback")}}">View Feedback</a></th>
                </tr>

                <?php } ?>
            </tbody>
        </table>

    </div>




@endsection

@push('styles')
@endpush
