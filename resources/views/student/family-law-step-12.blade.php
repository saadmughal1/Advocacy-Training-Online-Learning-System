@extends('../layouts/app')

@section('page-title', 'Family Law step-12')

@section('content')

    @includeIf('student.partials._navbar')

    <div class="pd-20 card-box mb-30">

        <form action="">
            <div class="clearfix mb-20 text-center">
                <div class="">
                    <h2 class="text-blue">Step 12: Post-trial Reconciliation</h2>
                </div>
            </div>


            <div class="clearfix mb-20">
                <div class="pull-left">
                    <h5 class="text-blue">Introduction:</h5>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi delectus, dolor temporibus nam pariatur in ratione, numquam perferendis voluptates aut aspernatur quidem. Sequi eum aut maiores facere repudiandae ad aperiam facilis sapiente molestias, dignissimos quod ex adipisci ratione ducimus. Excepturi cum fuga repellat nam laboriosam blanditiis, voluptas ut odio mollitia.
                    </p>
                </div>
            </div>


            <div class="clearfix mb-20">
                <div class="pull-left">
                    <h5 class="text-blue">Instructions:</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus minima amet totam, quasi vel consequuntur.</p>
                </div>
            </div>

            

            <div class="clearfix mb-20 text-center">
                <div class="">
                    <h5 class="text-blue text-center">Role Play Video</h5>
                    <video class="w-100" src="../vendors/documents/videos/demo.mp4" controls type="video/mp4"></video>
                </div>
            </div>


            <h3 class="text-blue ">Procedural Skills</h3>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Enter the Introduction of the Reconciliator/Mediator</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Enter the Introduction of the Reconciliator/Mediator"></textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Enter the Confidentiality assurance</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Enter the Confidentiality assurance "></textarea>
                </div>
            </div>

            <h3 class="text-blue ">Coaxing</h3>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Enter the individual session</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Enter the individual session"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Enter the Joint session</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Enter the Joint session"></textarea>
                </div>
            </div>


            
            <h3 class="text-blue ">Substantive skills</h3>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Neutrality/Impartiality</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Neutrality/Impartiality "></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Helped parties to change positions</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Helped parties to change positions "></textarea>
                </div>
            </div>

            
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Helped parties to reach suggestions</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Helped parties to reach suggestions "></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Helped parties to finalize suggestions</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Helped parties to finalize suggestions"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Helped parties to reach agreement</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Helped parties to reach agreement "></textarea>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Attach agreement/compromise File:</label>
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
