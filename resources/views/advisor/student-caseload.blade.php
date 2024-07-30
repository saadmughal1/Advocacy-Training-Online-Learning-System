@extends('../layouts/app')

@section('page-title', 'Students Caseload')

@section('content')

    @includeIf('advisor.partials._navbar')
    @includeIf('advisor.partials._sidebar')

    <div class="pd-20 card-box mb-30">

        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Students Caseload</h4>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Case</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < 10; $i++) { ?>

                <tr>
                    <th scope="row"><?php echo $i + 1; ?></th>
                    <td>case - <?php echo $i + 1; ?></td>
                    <th><a class="btn btn-primary" href="{{route("advisor.students-in-case")}}">View Students</a></th>
                </tr>

                <?php } ?>
            </tbody>
        </table>

    </div>



@endsection

@push('styles')
@endpush
