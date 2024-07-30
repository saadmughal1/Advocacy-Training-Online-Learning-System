<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>Admin - Assigning Cases to Advisors</title>

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

<body>

    <?php include_once "partials/navbar.php"; ?>
    <?php include_once "partials/sidebar.php"; ?>

    <div class="mobile-menu-overlay"></div>


    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">

                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Assigning Cases to Advisors</h4>
                            <!-- <p class="mb-30">All fields are required</p> -->
                        </div>
                    </div>
                    <form>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Select Case</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select2 form-control" name="state" style="width: 100%; height: 38px">
                                    <option value="">Family Law</option>
                                    <option value="">Case 2</option>
                                    <option value="">Case 3</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Select Advisor</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select2 form-control" name="state" style="width: 100%; height: 38px">
                                    <option value="">Advisor-1</option>
                                    <option value="">Advisor-2</option>
                                    <option value="">Advisor-3</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Select Students</label>
                            <div class="col-sm-12 col-md-10 overflow-auto">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">#</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 0; $i < 10; $i++) { ?>

                                            <tr>
                                            <th scope="row"><input type="checkbox"></th>
                                                <th scope="row"><?php echo $i + 1; ?></th>
                                                <td>Student - <?php echo $i + 1; ?></td>
                                                <td>Student@gmail.com</td>

                                            </tr>

                                        <?php } ?>


                                    </tbody>
                                </table>

                            </div>
                        </div>


                        <div class="form-group row d-flex justify-content-end">
                            <button class="btn btn-primary">Assign</button>
                        </div>
                    </form>
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