{{-- <!-- resources/views/advisor/students-in-case.blade.php -->

@extends('../layouts/app')

@section('page-title', 'Students in case')

@section('content')

    @includeIf('advisor.partials._navbar')
    @includeIf('advisor.partials._sidebar')

    <div class="pd-20 card-box mb-30 overflow-auto">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Family Law Steps</h4>
            </div>
        </div>

        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Step No</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 14; $i++)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>Step - {{ $i }}</td>
                        <td><a href="" class="btn btn-primary">View Feedback</a></td>
                    </tr>
                @endfor
            </tbody>
            
        </table>

    </div>

@endsection

@push('styles')
@endpush --}}
