@extends('../layouts/app')

@section('page-title', 'Advisor - Home')

@section('content')

    @includeIf('advisor.partials._navbar')
    @includeIf('advisor.partials._sidebar')

    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Advisor Caseload</h4>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Case Name</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < 10; $i++) { ?>

                <tr>
                    <th scope="row"><?php echo $i + 1; ?></th>
                    <td>Case - <?php echo $i + 1; ?></td>
                    <td><a class="btn btn-primary" href="{{route("advisor.view-students")}}">Allocate Case</a></td>
                </tr>

                <?php } ?>


            </tbody>
        </table>

    </div>

@endsection

@push('styles')
    <style>
        a>.card-box {
            background-image: linear-gradient(45deg, #23074d, #cc5333) !important;
        }
    </style>
@endpush
