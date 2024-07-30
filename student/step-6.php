<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>step-6</title>

    <!-- Site favicon -->
    <link rel="icon" type="image/png" href="../vendors/images/fav-icon.png" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="../https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="../vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="../src/plugins/datatables/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="../src/plugins/datatables/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="../vendors/styles/style.css" />
    <link rel="stylesheet" type="text/css" href="../vendors/styles/my-style.css" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="../https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
    <script async src="../https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258" crossorigin="anonymous"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "G-GBZ3SGGX85");
    </script>

</head>

<style>
    a>.card-box {
        background-image: linear-gradient(45deg, #23074d, #cc5333) !important;
    }

    input,
    textarea {
        margin-bottom: 5px;
    }
</style>

<body>

    <?php include_once "partials/navbar.php"; ?>

    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">

                <div class="pd-20 card-box mb-30">

                    <form action="">
                        <div class="clearfix mb-20 text-center">
                            <div class="">
                                <h2 class="text-blue">Step 06: Written Statement</h2>
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
                            <label class="col-sm-12 col-md-2 col-form-label">Header</label>
                            <div class="sm-12 col-md-10">
                                <textarea class="form-control" placeholder="Enter the name of the Court in which the suit is brought"></textarea>
                                <textarea class="form-control" placeholder="Enter the name, description and place of residence of the plaintiff"></textarea>
                                <textarea class="form-control" placeholder="Enter the name, description and place of residence of the defendant, so far as they can be ascertained"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Subject of the Written Statement</label>
                            <div class="sm-12 col-md-10">
                                <textarea class="form-control" placeholder="Such as: suit for dissolution of marriage, suit for recovery of maintenance etc. "></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Body of the Written Statement</label>
                            <div class="sm-12 col-md-10">
                                <textarea class="form-control" placeholder="New facts must be specially pleaded."></textarea>
                                <textarea class="form-control" placeholder="Denials should not be evasive "></textarea>
                            </div>
                        </div>
                        
                        
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Responding Legal paragraphs</label>
                            <div class="sm-12 col-md-10">
                                <textarea class="form-control" placeholder="Enter the cause of action when arose "></textarea>
                                <textarea class="form-control" placeholder="Enter territorial jurisdiction of the court  "></textarea>
                                <input type="number" class="form-control" placeholder="Enter court fee" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Prayer</label>
                            <div class="sm-12 col-md-10">
                                <textarea class="form-control" placeholder="The Relief which the Defendant Claim  "></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Verification</label>
                            <div class="sm-12 col-md-10">
                                <textarea class="form-control" placeholder="Enter Verified the content of the written statement  "></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Schedule of witnesses</label>
                            <div class="sm-12 col-md-10">
                                <textarea class="form-control" placeholder="Giving the number of witnesses intended to be produced in support of the written statement "></textarea>
                                <textarea class="form-control" placeholder="Enter the names and addresses of the witnesses and brief summary of the facts to which they would depose"></textarea>
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
                            <label class="col-sm-12 col-md-2 col-form-label">Upload attachments of the written statement:</label>
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
            </div>
            <?php include_once "partials/footer.php"; ?>
        </div>
    </div>


    <!-- js -->
    <script src="../vendors/scripts/core.js"></script>
    <script src="../vendors/scripts/script.min.js"></script>
    <script src="../vendors/scripts/process.js"></script>
    <script src="../vendors/scripts/layout-settings.js"></script>
    <script src="../src/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="../src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="../src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="../src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <script src="../vendors/scripts/dashboard3.js"></script>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="../https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
</body>

</html>