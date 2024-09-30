@extends('../layouts/app')

@section('page-title', 'Resources')

@section('content')

    @includeIf('admin.partials._navbar')
    @includeIf('admin.partials._sidebar')

    <div class="pd-20 card-box mb-30">
        @if (session('success'))
            <div class="alert alert-success" id="success-message">
                {{ session('success') }}
            </div>
        @endif
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Add New Resource</h4>
            </div>
        </div>

        <form action="{{ route('admin.add-resource') }}" method="POST">
            @csrf
            <input type="hidden" name="caseId" value="{{ $caseId }}">
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Url</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control @error('url') is-invalid @enderror" type="url" placeholder="Enter url"
                        name="url" value="{{ old('url') }}" autocomplete="off" required />
                    @error('url')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row d-flex justify-content-end">
                <button class="btn btn-primary">Add</button>
            </div>

        </form>
    </div>


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
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resources as $index => $resource)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td><a target="_blank" href="{{ $resource->url }}">{{ $resource->url }}</a></td>
                            <td>
                                <a href="{{ route('admin.edit-resource', ['id' => $resource->id, 'caseId' => $caseId]) }}">
                                    <span class="badge badge-primary border-0">Edit</span>
                                </a>
                            </td>
                            <td>
                                <form
                                    action="{{ route('admin.delete-resource', ['id' => $resource->id, 'caseId' => $caseId]) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this resource?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="badge badge-danger border-0">Delete</button>
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
