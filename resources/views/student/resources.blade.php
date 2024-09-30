@extends('../layouts/app')

@section('page-title', 'Resources')

@section('content')

    @includeIf('student.partials._navbar')
    @includeIf('student.partials._sidebar')

    <div class="pd-20 card-box mb-30 overflow-auto">

        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Resources</h4>
            </div>
        </div>

        @if ($resources->isEmpty())
            <p class="text-center"><b>No Resources found.</b></p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Url</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resources as $index => $resource)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td><a target="_blank" href="{{ $resource->url }}">{{ $resource->url }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>

@endsection

@push('styles')
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.transition = 'opacity 1s ease-out';
                    successMessage.style.opacity = '0';
                    setTimeout(function() {
                        successMessage.remove();
                    }, 1000);
                }, 2000);
            }

            const errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                setTimeout(function() {
                    errorMessage.style.transition = 'opacity 1s ease-out';
                    errorMessage.style.opacity = '0';
                    setTimeout(function() {
                        errorMessage.remove();
                    }, 1000);
                }, 2000);
            }
        });
    </script>
@endpush
