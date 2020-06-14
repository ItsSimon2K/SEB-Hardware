<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="Sim Mao Chen & Emily" />
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
			<?php include "include/enq.php";?>

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


        $db_host = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "seb_hardware";

        $conn = mysqli_connect($db_host, $db_user, $db_password,$db_name);

				$select_data = "SELECT id FROM products
												WHERE name = '$product'";

				$result = mysqli_query($conn,$select_data);

				while ($row = mysqli_fetch_assoc($result)){
					$product_id = $row['id'];
				}
				$chk_data = "SELECT * FROM enquiries
				 						 WHERE fname = '$fname'
										 AND lname = '$lname'
										 AND email = '$email'
										 AND phone = '$phone'
										 AND street_address = '$streetadd'
										 AND  postcode = '$postcode'
										 AND city = '$city'
										 AND state = '$state'
										 AND subject = '$subject'
										 AND comment = '$comment'
										 AND product_id = '$product_id'";

				$chked = mysqli_query($conn,$chk_data);
				if ((mysqli_num_rows($chked))<1){
					$sql = "INSERT INTO enquiries(fname,lname,email,phone,street_address,postcode,city,state,subject,comment,product_id)
	               VALUES ('$fname','$lname','$email','$phone','$streetadd','$postcode','$city','$state','$subject','$comment','$product_id')";
	        if (mysqli_query($conn,$sql)){
	          echo "<h1 class = 'submitted'>Enquiry Submitted</h1>";
						echo "<p class = 'submitted'>Thank you for taking time to submit the enquiry. We will get back to you soon.</p>";
	        }else{
	          echo "<h1 class = 'submitted'>Unsuccessful Enquiry</h1>";
	        }
				}else{
					echo "<h1 class = 'submitted'>Enquiry Submitted</h1>";
	 			 echo "<p class = 'submitted'>Thank you for taking time to submit the enquiry. We will get back to you soon.</p>";
				}

      ?>

			<div class="container">
				<div class="process">
					<table>
						<tr>
							<th>
								First name:
							</th>
							<th>
								Last name:
							</th>
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
							<th>
								E-mail Address:
							</th>
							<th>
								Phone number:
							</th>
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
							<th colspan="2">
								Street address:
							</th>
						</tr>
						<tr>
							<td colspan="2">
								<?php echo $streetadd; ?>
							</td>
						</tr>

						<tr>
							<th>
								Postcode:
							</th>
							<th>
								City/Town:
							</th>
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
							<th colspan="2">
								State:
							</th>
						</tr>

						<tr>
							<td colspan="2">
								<?php echo $state; ?>
							</td>
						</tr>

						<tr>
							<th>
								Product:
							</th>
							<th>
								Subject:
							</th>
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
							<th colspan="2">
								Comment:
							</th>
						</tr>

						<tr>
							<td colspan="2">
								<?php echo $comment; ?>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</article>
		<!-- content end -->

		<!-- footer start -->
		<?php include "include/footer.php" ?>
		<!-- footer end -->
	</body>
</html>
