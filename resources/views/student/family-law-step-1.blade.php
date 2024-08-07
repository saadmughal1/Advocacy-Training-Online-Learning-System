@extends('../layouts/app')

@section('page-title', 'Family Law step-1')

@section('content')

    @includeIf('student.partials._navbar')
    @includeIf('student.partials._sidebar')

    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20 text-center">
            <div class="">
                <h2 class="text-blue">Step: 1 - Interviewing the Client</h2>
            </div>
        </div>

        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">Introduction:</h5>
                <p>{{ $case->step_1_introduction }}</p>
            </div>
        </div>

        <div class="clearfix mb-20">
            <div class="pull-left">
                <h5 class="text-blue">Instructions:</h5>
                <p>{{ $case->step_1_instructions }}</p>
            </div>
        </div>

        @if (!empty($case->step_1_video))
            <div class="clearfix mb-20 text-center">
                <div class="">
                    <h5 class="text-blue text-center">Role Play Video</h5>
                    <video class="w-100" src="{{ asset('/storage/' . $case->step_1_video) }}" controls
                        type="video/mp4"></video>
                </div>
            </div>
        @endif


        <div class="clearfix mb-20 text-center">
            <div class="">
                <h6 class="text-blue">FAMILY LAW CLIENT INTERVIEW FORM</h6>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente accusamus sed ullam commodi impedit
                    enim tempora, dolorem nisi id recusandae?</p>
            </div>
        </div>



        <form>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Select the ground of your Case:</label>
                <div class="sm-12 col-md-10">
                    <div class="checkbox-group">
                        <label for="techno1">
                            <input type="checkbox" id="techno1" name="techno[]"
                                value="Whereabouts unknow for 4 years, Kindly consult proviso(a) of section 2">
                            Whereabouts unknow for 4 years, Kindly consult proviso(a) of section 2
                        </label>
                        <br>
                        <label for="techno2">
                            <input type="checkbox" id="techno2" name="techno[]"
                                value="Failure to provide maintainence for 2 years">
                            Failure to provide maintainence for 2 years
                        </label>
                        <br>
                        <label for="techno3">
                            <input type="checkbox" id="techno3" name="techno[]"
                                value="Husband has taken an additional wife">
                            Husband has taken an additional wife
                        </label>
                        <br>
                        <label for="techno4">
                            <input type="checkbox" id="techno4" name="techno[]" value="Imprisonment for 7 years">
                            Imprisonment for 7 years
                        </label>
                        <br>
                        <label for="techno5">
                            <input type="checkbox" id="techno5" name="techno[]"
                                value="Failure to perfomr marital obligations for 3 years">
                            Failure to perfomr marital obligations for 3 years
                        </label>
                        <br>
                        <label for="techno6">
                            <input type="checkbox" id="techno6" name="techno[]"
                                value="Impotency of the Husband,Kindly consult priviso(b) section 2">
                            Impotency of the Husband,Kindly consult priviso(b) section 2
                        </label>
                        <br>
                        <label for="techno7">
                            <input type="checkbox" id="techno7" name="techno[]" value="Insanity for 2 years">
                            Insanity for 2 years
                        </label>
                        <br>
                        <label for="techno8">
                            <input type="checkbox" id="techno8" name="techno[]" value="Suffering from leprsy">
                            Suffering from leprsy
                        </label>
                        <br>
                        <label for="techno9">
                            <input type="checkbox" id="techno9" name="techno[]"
                                value="Suffering from virulent venereal disease">
                            Suffering from virulent venereal disease
                        </label>
                        <br>
                        <label for="techno10">
                            <input type="checkbox" id="techno10" name="techno[]" value="Option of puberty">
                            Option of puberty
                        </label>
                        <br>
                        <label for="techno11">
                            <input type="checkbox" id="techno11" name="techno[]" value="cruelty of Husband">
                            cruelty of Husband
                        </label>
                        <br>
                        <label for="techno12">
                            <input type="checkbox" id="techno12" name="techno[]" value="Habitual Assault by Husband">
                            Habitual Assault by Husband
                        </label>
                        <br>
                        <label for="techno13">
                            <input type="checkbox" id="techno13" name="techno[]"
                                value="Husband Making life miserable by conduct not amounting to physical ill-treatment">
                            Husband Making life miserable by conduct not amounting to physical ill-treatment
                        </label>
                        <br>
                        <label for="techno14">
                            <input type="checkbox" id="techno14" name="techno[]"
                                value="Association with infamous, evil reputed women">
                            Association with infamous, evil reputed women
                        </label>
                        <br>
                        <label for="techno15">
                            <input type="checkbox" id="techno15" name="techno[]" value="Forces wife to lead immoral life">
                            Forces wife to lead immoral life
                        </label>
                        <br>
                        <label for="techno16">
                            <input type="checkbox" id="techno16" name="techno[]" value="Disposes of property of wife">
                            Disposes of property of wife
                        </label>
                        <br>
                        <label for="techno17">
                            <input type="checkbox" id="techno17" name="techno[]"
                                value="Prevents the wife to exercise legal right over property">
                            Prevents the wife to exercise legal right over property
                        </label>
                        <br>
                        <label for="techno18">
                            <input type="checkbox" id="techno18" name="techno[]"
                                value="Obstructs religous obligations of wife">
                            Obstructs religous obligations of wife
                        </label>
                        <br>
                        <label for="techno18">
                            <input type="checkbox" id="techno18" name="techno[]"
                                value="en-equlaity of treatment between wifes as per Quran">
                            en-equlaity of treatment between wifes as per Quran
                        </label>
                        <br>
                        <label for="techno20">
                            <input type="checkbox" id="techno20" name="techno[]"
                                value="Any other recognized valid grant under muslim law">
                            Any other recognized valid grant under muslim law
                        </label>

                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Please provide your full name, date of birth and place of
                    birth:</label>
                <div class="col-sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Enter full name" required>
                    <input type="date" class="form-control" required>
                    <input type="text" class="form-control" placeholder="Enter birth place" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Where are you living now?</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Address" required>
                    <input type="text" class="form-control" placeholder="Residence telephone" required>
                    <input type="text" class="form-control" placeholder="Mobile telephone" required>
                    <input type="text" class="form-control" placeholder="Email address" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"> Please complete the following concerning your
                    employment:</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Employer" required>
                    <input type="text" class="form-control" placeholder="Job Title" required>
                    <input type="text" class="form-control" placeholder="Address" required>
                    <input type="number" class="form-control" placeholder="Telephone number" required>
                    <input type="number" class="form-control" placeholder="Gross salary/monthly" required>
                    <input type="number" class="form-control"
                        placeholder="Annual gross (including bonuses, stock options etc)" required>
                    <input type="number" class="form-control" placeholder="Length of employement" required>
                    <input type="text" class="form-control" placeholder="Education/Training" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"> Please provide your spouse’s full name, date and place of
                    birth, Social Security number, driver's license number:</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Name" required>
                    <input type="date" class="form-control" required>
                    <input type="text" class="form-control" placeholder="Place of birth" required>
                    <input type="text" class="form-control" placeholder="Social Security" required>
                    <input type="text" class="form-control" placeholder="Driver's Lisence No" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Where is your spouse living?</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Address" required>
                    <input type="text" class="form-control" placeholder="Residence telephone" required>
                    <input type="text" class="form-control" placeholder="Mobile telephone" required>
                    <input type="text" class="form-control" placeholder="Email address" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"> Please complete the following concerning your spouse's
                    employment:</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Employer" required>
                    <input type="text" class="form-control" placeholder="Job Title" required>
                    <input type="text" class="form-control" placeholder="Address" required>
                    <input type="number" class="form-control" placeholder="Telephone number" required>
                    <input type="number" class="form-control" placeholder="Gross salary/monthly" required>
                    <input type="number" class="form-control"
                        placeholder="Annual gross (including bonuses, stock options etc)" required>
                    <input type="number" class="form-control" placeholder="Length of employement" required>
                    <input type="text" class="form-control" placeholder="Education/Training" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Please provide the date and place of your
                    marriage:</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Date" required>
                    <input type="text" class="form-control" placeholder="City, State" required>
                    <input type="text" class="form-control" placeholder="Date of seperation" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">If there are any children of this marriage, please provide
                    all requested information:</label>
                <div class="sm-12 col-md-10 overflow-auto">
                    <table border="1" class="table">
                        <tr>
                            <th>Sr. #</th>
                            <th>Name: </th>
                            <th>Sex: </th>
                            <th>D.O.B.: </th>
                            <th>Place of Birth: </th>
                            <th>Residence: </th>
                        </tr>

                        <tr>
                            <th><input type="text" name="child1sr" class="form-control" placeholder="Sr. #"></th>
                            <th><input type="text" name="child1Name" class="form-control" placeholder="Name: "></th>
                            <th><input type="text" name="child1Sex" class="form-control" placeholder="Sex: "></th>
                            <th><input type="text" name="child1DOB" class="form-control" placeholder="D.O.B.:"></th>
                            <th><input type="text" name="child1POB" class="form-control"
                                    placeholder="Place of Birth: "></th>
                            <th><input type="text" name="child1Residence" class="form-control"
                                    placeholder="Residence: "></th>
                        </tr>

                        <tr>
                            <th><input type="text" name="child2sr" class="form-control" placeholder="Sr. #"></th>
                            <th><input type="text" name="child2Name" class="form-control" placeholder="Name: "></th>
                            <th><input type="text" name="child2Sex" class="form-control" placeholder="Sex: "></th>
                            <th><input type="text" name="child2DOB" class="form-control" placeholder="D.O.B.:"></th>
                            <th><input type="text" name="child2POB" class="form-control"
                                    placeholder="Place of Birth: "></th>
                            <th><input type="text" name="child2Residence" class="form-control"
                                    placeholder="Residence: "></th>
                        </tr>

                        <tr>
                            <th><input type="text" name="child3sr" class="form-control" placeholder="Sr. #"></th>
                            <th><input type="text" name="child3Name" class="form-control" placeholder="Name: "></th>
                            <th><input type="text" name="child3Sex" class="form-control" placeholder="Sex: "></th>
                            <th><input type="text" name="child3DOB" class="form-control" placeholder="D.O.B.:"></th>
                            <th><input type="text" name="child3POB" class="form-control"
                                    placeholder="Place of Birth: "></th>
                            <th><input type="text" name="child3Residence" class="form-control"
                                    placeholder="Residence: "></th>
                        </tr>
                    </table>

                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Do the child(ren) have health insurance:</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Name of insurance company" required>
                    <input type="text" class="form-control" placeholder="Group Number" required>
                    <input type="text" class="form-control" placeholder="Party responsible for premium" required>
                    <input type="text" class="form-control" placeholder="Monthly cost of premium" required>
                    <input type="text" class="form-control"
                        placeholder="Is the insurance converd through a parent's employement?" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Will there be a dispute over custody of the
                    children?</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control"
                        placeholder="Will there be a dispute over custody of the childern?" required>
                    <input type="text" class="form-control" placeholder="If not, who will have custody?" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Special circumstances of children and/or spouses:</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="Special needs" required>
                    <input type="text" class="form-control" placeholder="religious issues" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">If you have you been married before, how many
                    times?</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control"
                        placeholder="If you have you been married before, how many times?" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">What are your grounds for divorce?</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="What are the grounds for divorce?" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">If there are children from a previous marriage or other
                    relationship, please provide all requested information:</label>
                <div class="sm-12 col-md-10 overflow-auto">
                    <table border="1" class="table">
                        <tr>
                            <th>Sr. #</th>
                            <th>Name: </th>
                            <th>Sex: </th>
                            <th>D.O.B.: </th>
                            <th>Place of Birth: </th>
                            <th>Residence: </th>
                        </tr>

                        <tr>
                            <th><input type="text" name="child1sr" class="form-control" placeholder="Sr. #"></th>
                            <th><input type="text" name="child1Name" class="form-control" placeholder="Name: "></th>
                            <th><input type="text" name="child1Sex" class="form-control" placeholder="Sex: "></th>
                            <th><input type="text" name="child1DOB" class="form-control" placeholder="D.O.B.:"></th>
                            <th><input type="text" name="child1POB" class="form-control"
                                    placeholder="Place of Birth: "></th>
                            <th><input type="text" name="child1Residence" class="form-control"
                                    placeholder="Residence: "></th>
                        </tr>

                        <tr>
                            <th><input type="text" name="child2sr" class="form-control" placeholder="Sr. #"></th>
                            <th><input type="text" name="child2Name" class="form-control" placeholder="Name: "></th>
                            <th><input type="text" name="child2Sex" class="form-control" placeholder="Sex: "></th>
                            <th><input type="text" name="child2DOB" class="form-control" placeholder="D.O.B.:"></th>
                            <th><input type="text" name="child2POB" class="form-control"
                                    placeholder="Place of Birth: "></th>
                            <th><input type="text" name="child2Residence" class="form-control"
                                    placeholder="Residence: "></th>
                        </tr>

                        <tr>
                            <th><input type="text" name="child3sr" class="form-control" placeholder="Sr. #"></th>
                            <th><input type="text" name="child3Name" class="form-control" placeholder="Name: "></th>
                            <th><input type="text" name="child3Sex" class="form-control" placeholder="Sex: "></th>
                            <th><input type="text" name="child3DOB" class="form-control" placeholder="D.O.B.:"></th>
                            <th><input type="text" name="child3POB" class="form-control"
                                    placeholder="Place of Birth: "></th>
                            <th><input type="text" name="child3Residence" class="form-control"
                                    placeholder="Residence: "></th>
                        </tr>
                    </table>

                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">List all Retirement, Pensions, and Savings Plans: Do you
                    participate in any retirement plan or company savings plan?</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Does your Spouse participate in any retirement plan or
                    company savings plan?</label>
                <div class="sm-12 col-md-10">
                    <input type="text" class="form-control" placeholder="" required>
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
