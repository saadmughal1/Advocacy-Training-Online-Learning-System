@extends('../layouts/app')

@section('page-title', 'Query')

@section('content')

    @includeIf('student.partials._navbar')
    @includeIf('student.partials._sidebar')

    <div class="pd-20 card-box mb-30">
        @if (session('message'))
            <div class="alert alert-info" id="success-message">
                {{ session('message') }}
            </div>
        @endif
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Ask Any Question</h4>
            </div>
        </div>

        <form action="{{ route('student.send-message') }}" method="POST">
            @csrf

            <input type="hidden" name="aid" value="{{ request('aid') }}">

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">{{ request('username') }}:</label>
                <div class="col-sm-12 col-md-10">
                    <textarea class="form-control w-100" placeholder="..." rows="5" readonly>{{ isset($messages) && $messages->isNotEmpty() ? $messages->first()->advisor_message : '' }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">You:</label>
                <div class="col-sm-12 col-md-10">
                    <textarea class="form-control w-100" name="message" placeholder="Write Message Here..." rows="5">{{ isset($messages) && $messages->isNotEmpty() ? $messages->first()->student_message : '' }}</textarea>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-end">
                <button class="btn btn-primary">Send</button>
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
        });
    </script>
@endpush
