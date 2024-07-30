<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8" />
	<title>Home</title>

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
		background-image: linear-gradient(45deg, #0f0c29, #302b63, #24243e) !important;
		padding: 10px !important;
	}

	/* a > .card-box{
	background-image: linear-gradient(45deg, #23074d, #cc5333) !important;
	padding: 0px !important;
} */
</style>

<body>

	<?php include_once "partials/navbar.php"; ?>
	<?php include_once "partials/sidebar.php"; ?>

	<div class="mobile-menu-overlay"></div>


	<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">
			<div class="title pb-20">
				<!-- <h2 class="h3 mb-0">Hospital Overview</h2> -->
			</div>

			<div class="row pb-10">

				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<a href="create-advisor-account">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap justify-content-center">
								<div class="widget-data text-center">
									<div class="weight-700 font-24 text-light">Create Advisor Account</div>
								</div>
							</div>
						</div>
					</a>
				</div>

				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<a href="view-advisors">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap justify-content-center">
								<div class="widget-data text-center">
									<div class="weight-700 font-24 text-light">View All Advisors</div>
								</div>
							</div>
						</div>
					</a>
				</div>

				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<a href="create-student-account">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap justify-content-center">
								<div class="widget-data text-center">
									<div class="weight-700 font-24 text-light">Create Student Account</div>
								</div>
							</div>
						</div>
					</a>
				</div>

				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<a href="view-students">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap justify-content-center">
								<div class="widget-data text-center">
									<div class="weight-700 font-24 text-light">View All Students</div>
								</div>
							</div>
						</div>
					</a>
				</div>

				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<a href="initiate-case">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap justify-content-center">
								<div class="widget-data text-center">
									<div class="weight-700 font-24 text-light">Initiate a Case</div>
								</div>
							</div>
						</div>
					</a>
				</div>

				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<a href="assign-case">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap justify-content-center">
								<div class="widget-data text-center">
									<div class="weight-700 font-24 text-light">Assigning Cases to Advisors</div>
								</div>
							</div>
						</div>
					</a>
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