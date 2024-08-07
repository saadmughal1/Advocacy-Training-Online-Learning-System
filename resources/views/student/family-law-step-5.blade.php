@extends('../layouts/app')

@section('page-title', 'Family Law step-5')

@section('content')

    @includeIf('student.partials._navbar')
    @includeIf('student.partials._sidebar')

    <div class="pd-20 card-box mb-30">

        <form action="">
            <div class="clearfix mb-20 text-center">
                <div class="">
                    <h2 class="text-blue">Step 05: Drafting the plaint</h2>
                </div>
            </div>


            <div class="clearfix mb-20">
                <div class="pull-left">
                    <h5 class="text-blue">Introduction:</h5>
                    <p>{{ $case->step_5_introduction }}</p>
                </div>
            </div>


            <div class="clearfix mb-20">
                <div class="pull-left">
                    <h5 class="text-blue">Instructions:</h5>
                    <p>{{ $case->step_5_instructions }}</p>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Header</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Enter the name of the Court in which the suit is brought"></textarea>
                    <textarea class="form-control" placeholder="Enter the name, description and place of residence of the plaintiff"></textarea>
                    <textarea class="form-control" placeholder="Enter the name, description and place of residence of the defendant, so far as they can be ascertained"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Subject of the plaint</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Such as: suit for dissolution of marriage, suit for recovery of maintenance etc. "></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Facts relating to the dispute</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Enter the cause of action when arose "></textarea>
                    <textarea class="form-control" placeholder="Enter territorial jurisdiction of the court  "></textarea>
                    <input type="number" class="form-control" placeholder="Enter court fee" required>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Prayer</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Enter the relief which the plaintiff claim "></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Schedule of witnesses</label>
                <div class="sm-12 col-md-10">
                    <textarea class="form-control" placeholder="Enter the number of witnesses intended to be produced in support of the plaint"></textarea>
                    <textarea class="form-control" placeholder="Enter the names and addresses of the witnesses and brief summary of the facts to which they would depose: "></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Make sure, You must attach the following documents</label>
                <div class="sm-12 col-md-10">
                    <div class="checkbox-group">
                        <label for="techno1">
                            <input type="checkbox" id="techno1" name="techno[]" value="Whereabouts unknow for 4 years, Kindly consult proviso(a) of section 2">
                            Copies of the plaint
                        </label>
                        <br>
                        <label for="techno2">
                            <input type="checkbox" id="techno2" name="techno[]" value="Failure to provide maintainence for 2 years">
                            Schedule of the witnesses
                        </label>
                        <br>
                        <label for="techno3">
                            <input type="checkbox" id="techno3" name="techno[]" value="Husband has taken an additional wife">
                            Precise statement of witnesses
                        </label>
                        <br>
                        <label for="techno4">
                            <input type="checkbox" id="techno4" name="techno[]" value="Imprisonment for 7 years">
                            List of documents rely upon
                        </label>
                        <br>
                        <label for="techno5">
                            <input type="checkbox" id="techno5" name="techno[]" value="Failure to perfomr marital obligations for 3 years">
                            Copies of documents rely upon
                        </label>
                        <br>
                        <label for="techno6">
                            <input type="checkbox" id="techno6" name="techno[]" value="Impotency of the Husband,Kindly consult priviso(b) section 2">
                            List of documents in posession
                        </label>
                        <br>
                        <label for="techno7">
                            <input type="checkbox" id="techno7" name="techno[]" value="Insanity for 2 years">
                            Copies of documents in posession
                        </label>

                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Upload attachments of the plaint:</label>
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
