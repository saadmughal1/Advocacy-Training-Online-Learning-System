@extends('../layouts/app')

@section('page-title', 'Initiate Case')

@section('content')

    @includeIf('admin.partials._navbar')
    @includeIf('admin.partials._sidebar')

    {{ old('case-type') }}

    <div class="pd-20 card-box mb-30">
        @if (session('success'))
            <div class="alert alert-success" id="success-message">
                {{ session('success') }}
            </div>
        @endif
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Select Case Type</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <select class="custom-select2 form-control" name="caseType" id="caseTypeSelect"
                        style="width: 100%; height: 38px">
                        <option value="">Select Case Type</option>
                        <option value="family-law">Family Law</option>
                        {{-- <option value="early-bird-moot">Early Bird Moot</option> --}}
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div id="family-law" class="case-content" style="display: none;">

        <form action="{{ route('admin.initiate-family-law-case') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h3 class="pd-20 text-center mb-30">Family Law</h3>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <!-- <h4 class="text-blue h4">---</h4> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Enter the name of case</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" name="case-name" placeholder="Enter the name of case" />
                        @error('case-name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

            </div>


            {{-- step 1 --}}
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Step:1 - Interviewing the Client</h4>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the introduction"
                            name="step-1-introduction" />
                        @error('step-1-introduction')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the instructions"
                            name="step-1-instructions" />
                        @error('step-1-instructions')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Video</label>
                    <div class="col-sm-12 col-md-10">
                        <input placeholder="Video Url" class="form-control mb-3" type="url" name="step-1-video-url" />
                        <p class="text-center">OR</p>
                        <input class="form-control" type="file" accept="video/mp4" name="step-1-video" />
                        @error('step-1-video')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>

            {{-- step 2 --}}
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Step:2 - Sorting Facts from the Story</h4>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the introduction"
                            name="step-2-introduction" />
                        @error('step-2-introduction')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the instructions"
                            name="step-2-instructions" />
                        @error('step-2-instructions')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>

            {{-- step 3 --}}
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Step:3 - Searching Relavant Laws/Rules/Policies</h4>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the introduction"
                            name="step-3-introduction" />
                        @error('step-3-introduction')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the instructions"
                            name="step-3-instructions" />
                        @error('step-3-instructions')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>

            {{-- step 4 --}}
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Step:4 - Preparing Case Summaries</h4>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the introduction"
                            name="step-4-introduction" />
                        @error('step-4-introduction')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the instructions"
                            name="step-4-instructions" />
                        @error('step-4-instructions')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>

            {{-- step 5 --}}
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Step:5 - Drafting the plaint</h4>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the introduction"
                            name="step-5-introduction" />
                        @error('step-5-introduction')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the instructions"
                            name="step-5-instructions" />
                        @error('step-5-instructions')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>

            {{-- step 6 --}}
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Step:6 - Written Statement</h4>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the introduction"
                            name="step-6-introduction" />
                        @error('step-6-introduction')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the instructions"
                            name="step-6-instructions" />
                        @error('step-6-instructions')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>

            {{-- step 7 --}}
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Step:7 - IPretrial Reconciliation</h4>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the introduction"
                            name="step-7-introduction" />
                        @error('step-7-introduction')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the instructions"
                            name="step-7-instructions" />
                        @error('step-7-instructions')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Video</label>
                    <div class="col-sm-12 col-md-10">
                        <input placeholder="Video Url" class="form-control mb-3" type="url"
                            name="step-7-video-url" />
                        <p class="text-center">OR</p>
                        <input class="form-control" type="file" accept="video/mp4" name="step-7-video" />
                        @error('step-7-video')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>

            {{-- step 8 --}}
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Step 8: - Framing of issues</h4>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the introduction"
                            name="step-8-introduction" />
                        @error('step-8-introduction')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the instructions"
                            name="step-8-instructions" />
                        @error('step-8-instructions')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>

            {{-- step 9 --}}
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Step:9 - Examination in chief</h4>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the introduction"
                            name="step-9-introduction" />
                        @error('step-9-introduction')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the instructions"
                            name="step-9-instructions" />
                        @error('step-9-instructions')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Video</label>
                    <div class="col-sm-12 col-md-10">
                        <input placeholder="Video Url" class="form-control mb-3" type="url"
                            name="step-9-video-url" />
                        <p class="text-center">OR</p>
                        <input class="form-control" type="file" accept="video/mp4" name="step-9-video" />
                        @error('step-9-video')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>

            {{-- step 10 --}}
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Step:10 - Cross Examination</h4>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the introduction"
                            name="step-10-introduction" />
                        @error('step-10-introduction')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the instructions"
                            name="step-10-instructions" />
                        @error('step-10-instructions')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Video</label>
                    <div class="col-sm-12 col-md-10">
                        <input placeholder="Video Url" class="form-control mb-3" type="url"
                            name="step-10-video-url" />
                        <p class="text-center">OR</p>
                        <input class="form-control" type="file" accept="video/mp4" name="step-10-video" />
                        @error('step-10-video')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>

            {{-- step 11 --}}
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Step:11 - Final Arguments</h4>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the introduction"
                            name="step-11-introduction" />
                        @error('step-11-introduction')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the instructions"
                            name="step-11-instructions" />
                        @error('step-11-instructions')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Video</label>
                    <div class="col-sm-12 col-md-10">
                        <input placeholder="Video Url" class="form-control mb-3" type="url" name="step-11-video-url" />
                        <p class="text-center">OR</p>
                        <input class="form-control" type="file" accept="video/mp4" name="step-11-video" />
                        @error('step-11-video')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>

            {{-- step 12 --}}
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Step:12 - Post-trial Reconciliation</h4>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the introduction"
                            name="step-12-introduction" />
                        @error('step-12-introduction')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the instructions"
                            name="step-12-instructions" />
                        @error('step-12-instructions')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Video</label>
                    <div class="col-sm-12 col-md-10">
                        <input placeholder="Video Url" class="form-control mb-3" type="url" name="step-12-video-url" />
                        <p class="text-center">OR</p>
                        <input class="form-control" type="file" accept="video/mp4" name="step-12-video" />
                        @error('step-12-video')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- step 13 --}}
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Step 13: - Group presentations</h4>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the introduction"
                            name="step-13-introduction" />
                        @error('step-13-introduction')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the instructions"
                            name="step-13-instructions" />
                        @error('step-13-instructions')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>

            {{-- step 13 --}}
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Step 14: - Certification</h4>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Introduction</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the introduction"
                            name="step-14-introduction" />
                        @error('step-14-introduction')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Instructions</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Enter the instructions"
                            name="step-14-instructions" />
                        @error('step-14-instructions')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>


            <div class="form-group row d-flex justify-content-center">
                <button class="btn btn-primary">Initiate the case</button>
            </div>


        </form>

    </div>

    <div id="early-bird-moot" class="case-content" style="display: none;">
        <form action="{{ route('admin.initiate-early-bird-moot') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h3 class="pd-20 text-center mb-30">Early Bird Moot</h3>

            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <!-- <h4 class="text-blue h4">---</h4> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Enter the name of case</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" name="case-name"
                            placeholder="Enter the name of case" />
                        @error('case-name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

            </div>


            <div class="form-group row d-flex justify-content-center">
                <button class="btn btn-primary">Initiate the case</button>
            </div>

        </form>
    </div>

@endsection

@push('styles')
    <style>
        .case-content {
            display: none;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {

            var caseType = "{{ session('case_type') }}";

            if (caseType === 'family-law') {
                $('#family-law').show();
                $('#caseTypeSelect').val('family-law');
            } else if (caseType === 'early-bird-moot') {
                $('#early-bird-moot').show();
                $('#caseTypeSelect').val('early-bird-moot');
            }

            function updateContent() {
                var selectedValue = $('#caseTypeSelect').val();
                $('.case-content').hide();
                if (selectedValue) {
                    $('#' + selectedValue).show();
                }
            }
            updateContent();
            $('#caseTypeSelect').change(function() {
                updateContent();
            });
        });

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
