<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>step-8</title>

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
                                <h2 class="text-blue">Step 8: Framing of issues</h2>
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

                        <div class="container pt-4">
                            <div class="table-responsive">

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Issue of Law</th>
                                            <th class="text-center">Onus to Prove</th>

                                        </tr>
                                    </thead>
                                    <tbody id="tbody">

                                    </tbody>
                                </table>
                            </div>
                            <button class="btn btn-md btn-primary" id="addBtn" type="button">
                                Add new Issue Law
                            </button>
                        </div>

                        <div class="container pt-4">
                            <div class="table-responsive">

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Issue of Fact</th>
                                            <th class="text-center">Onus to Prove</th>

                                        </tr>
                                    </thead>
                                    <tbody id="tbody">

                                    </tbody>
                                </table>
                            </div>
                            <button class="btn btn-md btn-primary" id="addBtn" type="button">
                                Add new Fact Law
                            </button>
                        </div>



                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Attach any file</label>
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