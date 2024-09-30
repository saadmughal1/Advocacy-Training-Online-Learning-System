@extends('../layouts/app')

@section('page-title', 'Edit Resources')

@section('content')

    @includeIf('advisor.partials._navbar')
    @includeIf('advisor.partials._sidebar')

    <div class="pd-20 card-box mb-30">
        @if (session('message'))
            <div class="alert alert-success" id="success-message">
                {{ session('message') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger" id="error-message">
                {{ session('error') }}
            </div>
        @endif

        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Edit Resource</h4>
            </div>
        </div>

        <form action="{{ route('advisor.update-resource', $resource->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="caseId" value="{{ $resource->caseid }}">
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Url</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control @error('url') is-invalid @enderror" type="url" placeholder="Enter URL"
                        name="url" value="{{ old('url', $resource->url) }}" autocomplete="off" required />
                    @error('url')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row d-flex justify-content-end">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>
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
