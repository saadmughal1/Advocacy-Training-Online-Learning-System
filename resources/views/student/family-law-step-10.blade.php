@extends('../layouts/app')

@section('page-title', 'Family Law step-10')

@section('content')

    @includeIf('student.partials._navbar')
    @includeIf('student.partials._sidebar')
  
    <div class="pd-20 card-box mb-30">

        <form action="">
            <div class="clearfix mb-20 text-center">
                <div class="">
                    <h2 class="text-blue">Step 10: Cross Examination</h2>
                </div>
            </div>


            <div class="clearfix mb-20">
                <div class="pull-left">
                    <h5 class="text-blue">Introduction:</h5>
                    <p>{{ $case->step_10_introduction }}</p>
                </div>
            </div>


            <div class="clearfix mb-20">
                <div class="pull-left">
                    <h5 class="text-blue">Instructions:</h5>
                    <p>{{ $case->step_10_instructions }}</p>
                </div>
            </div>

            

            @if (!empty( $case->step_10_video)){   
                @endif
                <div class="clearfix mb-20 text-center">
                    <div class="">
                        <h5 class="text-blue text-center">Role Play Video</h5>
                        <video class="w-100" src="{{ asset('/storage/'. $case->step_10_video) }}" controls type="video/mp4"></video>
                    </div>
                </div>
            }


            <h3 class="text-blue ">Procedural Steps</h3>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Oath taking</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Oath taking "></textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Address of the party/witness Statement</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Address of the party/witness Statement"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Signature of the party/witness</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Signature of the party/witness "></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Counter signature of the Judge</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Counter signature of the Judge"></textarea>
                </div>
            </div>






            <h3 class="text-blue ">Substantive steps</h3>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Straight questions</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Straight questions "></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">No leading questions</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="No leading questions"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Objections taken by other party</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Objections taken by other party"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Statement according to the pleadings</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Statement according to the pleadings"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">To impeach the credit of witness, any question could be asked</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="To impeach the credit of witness, any question could be asked"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Only relevant questions could be asked</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Only relevant questions could be asked"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Attach the transcrip:</label>
                <div class="sm-12 col-md-10">
                    <input type="file" class="form-control" placeholder="" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Advisor Responce:</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Feedback Box"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Marks Secured:</label>
                <div class="sm-12 col-md-10">
                    <span>5/10</span>
                </div>
            </div>



            <div class="form-group row">

                <div class="col-lg-6 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Update Details</button>
                </div>

                <div class="col-lg-6 d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary">Next Step</button>
                </div>
            </div>

        </form>
    </div>




@endsection

@push('styles')
    <style>
        a>.card-box {
            background-image: linear-gradient(45deg, #23074d, #cc5333) !important;
        }

        input,
        textarea {
            margin-bottom: 5px;
        }
    </style>
@endpush
