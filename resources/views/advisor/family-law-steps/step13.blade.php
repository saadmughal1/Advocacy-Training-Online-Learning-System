<div class="pd-20 card-box mb-30">



    <div class="clearfix mb-20">
        <div class="pull-left">
            <h5 class="text-blue">Introduction:</h5>
            <p>{{ $data['predetails']['introduction'] }}</p>
        </div>
    </div>


    <div class="clearfix mb-20">
        <div class="pull-left">
            <h5 class="text-blue">Instructions:</h5>
            <p>{{ $data['predetails']['instructions'] }}</p>
        </div>
    </div>







        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Attach any file</label>
            <div class="sm-12 col-md-10">
                <p class="form-control">No file attached</p>
            </div>
        </div>



        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Add your feedback</label>
            <div class="sm-12 col-md-10">
                <textarea class="form-control"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-12 d-flex justify-content-end">
                <button type="button" class="btn btn-primary">Send Feedback</button>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Give Marks</label>
            <div class="sm-12 col-md-10">
                <input type="number" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-12 d-flex justify-content-end">
                <button type="button" class="btn btn-primary">Add Marks</button>
            </div>
        </div>
    
</div>

<div class="mb-20 d-flex justify-content-center">
    <button type="button" class="btn btn-primary">Unlock Next Step</button>
</div>
