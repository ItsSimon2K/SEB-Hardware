<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="Sim Mao Chen" />
		<meta name="description" content="hardware_website" />
		<meta name="keywords" content="equipments,hardware" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<title>SEB Hardware - Enquiry</title>
		<link
			rel="stylesheet"
			type="text/css"
			href="https://fonts.googleapis.com/css?family=Open+Sans:400,700"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="https://fonts.googleapis.com/css?family=Roboto+Slab:700"
		/>
		<script src="scripts/shared.js"></script>
		<script src="scripts/script.js"></script>
		<script src="scripts/enhancement.js"></script>
	</head>

	<body onload="enquiryPage()">
		<!-- header start -->
		<?php include "./nav.php"; ?>
		<!-- header end -->

		<!-- content start -->
		<article>
			<div class="product-hero product-hero--enquiry">
				<div class="product-hero__container container">
					<h1 class="product-hero__container__title">Enquiry</h1>
					<p class="product-hero__container__desc">
						We want to hear from you
					</p>
				</div>
			</div>

      <?php 
        $fname = $_POST["fname"];
        $lnmae = $_POST["lname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $streetadd = $_POST["street-address"];
        $postcode = $_POST["postcode"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $product = $_POST["product"];
        $subject = $_POST["subject"];
        $comment = $_POST["comment"];
      ?>

			<div class="container">
				<form name="enquiry" action="" method="POST">
					<div class="eform-card">
						
					</div>
				</form>
			</div>
		</article>
		<!-- content end -->

		<!-- footer start -->
		<?php include "./footer.php" ?>
		<!-- footer end -->
	</body>
</html>
