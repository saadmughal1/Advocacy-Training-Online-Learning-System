@extends('../layouts/app')

@section('page-title', 'Family Law step-11')

@section('content')

    @includeIf('student.partials._navbar')

    <div class="pd-20 card-box mb-30">

        <form action="">
            <div class="clearfix mb-20 text-center">
                <div class="">
                    <h2 class="text-blue">Step 11: Final Arguments</h2>
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


            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Opening para: containing facts of the case</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Opening para: containing facts of the case "></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Second para: Issue(s) framed</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Second para: Issue(s) framed"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Third para: Evidence presented and admitted by the court</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Third para: Evidence presented and admitted by the court"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Fourth para: Relevant law(s) and how are they relevant</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Fourth para: Relevant law(s) and how are they relevant"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Fifth para: Relevant case law(s) and how they are relevant</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Fifth para: Relevant case law(s) and how they are relevant"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Sixth para: Closing para with prayer</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Sixth para: Closing para with prayer"></textarea>
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
                <label class="col-sm-12 col-md-2 col-form-label">The outlook based on the following:</label>
                <div class="sm-12 col-md-10">
                    <div class="checkbox-group">
                        <label for="techno1">
                            <input type="checkbox" id="techno1" name="techno[]" value="In Writing">
                            In Writing
                        </label>
                        <br>
                        <label for="techno2">
                            <input type="checkbox" id="techno2" name="techno[]" value="Paragraphed">
                            Paragraphed
                        </label>
                        <br>
                        <label for="techno3">
                            <input type="checkbox" id="techno3" name="techno[]" value="Signature of the lawyer">
                            Signature of the lawyer
                        </label>
                        <br>
                        <label for="techno4">
                            <input type="checkbox" id="techno4" name="techno[]" value="Stamp of the court">
                            Stamp of the court
                        </label>
                    </div>
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
