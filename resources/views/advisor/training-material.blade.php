@extends('../layouts/app')

@section('page-title', 'Training Materials')

@section('content')

    @includeIf('advisor.partials._navbar')
    @includeIf('advisor.partials._sidebar')

    <div class="pd-20 card-box mb-30">
        @if (session('success'))
            <div class="alert alert-success" id="success-message">
                {{ session('success') }}
            </div>
        @endif
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Upload New Training Material</h4>
            </div>
        </div>

        <form action="{{ route('advisor.add-training-material') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="caseId" value="{{ $caseId }}">

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">ZIP File</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control @error('zip_file') is-invalid @enderror" type="file" name="zip_file"
                        required />
                    @error('zip_file')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Title</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control @error('file_name') is-invalid @enderror" type="text" name="file_name"
                        required />
                    @error('file_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row d-flex justify-content-end">
                <button class="btn btn-primary">Upload</button>
            </div>
        </form>

    </div>

    <div class="pd-20 card-box mb-30 overflow-auto">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Training Materials</h4>
            </div>
        </div>

        @if ($training_material->isEmpty())
            <p class="text-center"><b>No Training Materials found.</b></p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Download</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($training_material as $index => $material)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $material->file_name }}</td>
                            <td>
                                <a class="btn btn-primary"
                                    href="{{ route('advisor.download-training-material', ['id' => $material->id]) }}">
                                    Download
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('advisor.delete-training-material', ['id' => $material->id]) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this training material?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
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
