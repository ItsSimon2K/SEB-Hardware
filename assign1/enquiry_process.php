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

	<body>
		<!-- header start -->
		<?php include "include/nav.php"; ?>
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
				function test_input($data) {
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				}

        if (!empty($_POST["fname"])) {
          $fname = test_input($_POST["fname"]);
        }

        if (!empty($_POST["lname"])) {
          $lname = test_input($_POST["lname"]);
        }

        if (!empty($_POST["email"])) {
          $email = test_input($_POST["email"]);
        }

        if (!empty($_POST["phone"])) {
          $phone = test_input($_POST["phone"]);
        }

        if (!empty($_POST["street-address"])) {
          $streetadd = test_input($_POST["street-address"]);
        }

        if (!empty($_POST["postcode"])) {
          $postcode = test_input($_POST["postcode"]);
        }

        if (!empty($_POST["city"])) {
          $city = test_input($_POST["city"]);
        }

        if (!empty($_POST["state"])) {
          $state = test_input($_POST["state"]);
        }

        if (!empty($_POST["product"])) {
          $product = test_input($_POST["product"]);
        }

        if (!empty($_POST["subject"])) {
          $subject = test_input($_POST["subject"]);
        }

        if (!empty($_POST["comment"])) {
          $comment = test_input($_POST["comment"]);
        } else {
					$comment = "no comment";
				}

      ?>

			<div class="container">
				<div class="process">
					<h1>Enquiry Submitted</h1>
					<table>
						<tr>
							<td>
								First name:
							</td>
							<td>
								Last name:
							</td>
						</tr>

						<tr>
							<td>
								<?php echo $fname; ?>
							</td>
							<td>
								<?php echo $lname; ?>
							</td>
						</tr>

						<tr>
							<td>
								E-mail Address:
							</td>
							<td>
								Phone number:
							</td>
						</tr>

						<tr>
							<td>
								<?php echo $email; ?>
							</td>
							<td>
								<?php echo $phone; ?>
							</td>
						</tr>

						<tr>
							<td colspan="2">
								Street address:
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<?php echo $streetadd; ?>
							</td>
						</tr>

						<tr>
							<td>
								Postcode:
							</td>
							<td>
								City/Town:
							</td>
						</tr>

						<tr>
							<td>
								<?php echo $postcode; ?>
							</td>
							<td>
								<?php echo $city; ?>
							</td>
						</tr>

						<tr>
							<td colspan="2">
								State:
							</td>
						</tr>

						<tr>
							<td colspan="2">
								<?php echo $state; ?>
							</td>
						</tr>

						<tr>
							<td>
								Product:
							</td>
							<td>
								Subject:
							</td>
						</tr>

						<tr>
							<td>
								<?php echo $product; ?>
							</td>
							<td>
								<?php echo $subject; ?>
							</td>
						</tr>

						<tr>
							<td colspan="2">
								Comment:
							</td>
						</tr>

						<tr>
							<td colspan="2">
								<?php echo $comment; ?>
							</td>
						</tr>
					</table>
				</div>

				<form id = "enquiry" method = "POST" action = "process.php">
				 <input type="hidden" name="vFname" value="<?php echo $fname; ?>">
				 <input type="hidden" name="vLname" value="<?php echo $lname; ?>">
				 <input type="hidden" name="vEmail" value="<?php echo $email; ?>">
				 <input type="hidden" name="vPhone" value="<?php echo $phone; ?>">
				 <input type="hidden" name="vStreet-address" value="<?php echo $streetadd; ?>">
				 <input type="hidden" name="vPostcode" value="<?php echo $postcode; ?>">
				 <input type="hidden" name="vCity" value="<?php echo $city; ?>">
				 <input type="hidden" name="vState" value="<?php echo $state; ?>">
				 <input type="hidden" name="vProduct" value="<?php echo $product; ?>">
				 <input type="hidden" name="vSubject" value="<?php echo $subject; ?>">
				 <input type="hidden" name="vComment" value="<?php echo $comment; ?>">
				 <input type = "submit" value = "Confirm Enquiry"/>
			 </form>
			</div>
		</article>
		<!-- content end -->

		<!-- footer start -->
		<?php include "include/footer.php" ?>
		<!-- footer end -->
	</body>
</html>
