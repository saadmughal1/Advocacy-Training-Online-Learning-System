@extends('../layouts/app')

@section('page-title', 'Family Law step-2')

@section('content')

    @includeIf('student.partials._navbar')

    
    <div class="pd-20 card-box mb-30">
        <form action="">
            <div class="clearfix mb-20 text-center">
                <div class="">
                    <h2 class="text-blue">Step: 2 - Sorting Facts from the Story</h2>
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

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Name of the Group *</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Enter name of teh group" required>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Name of the Plaintiff *</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Name of the Plaintiff" required>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Name of the Defendant *</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Name of the Defendant" required>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Current place of residence of wife *</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Current place of residence of wife" required>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">No of children</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="No of children" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Income of the wife *</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Income of the wife" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Income of the husband/month *</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Income of the husband/month" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Reason/Ground & date of starting of clash *</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Reason/Ground & date of starting of clash" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Prayer(s) of the wife</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Prayer(s) of the wife" required>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Attach file:</label>
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
