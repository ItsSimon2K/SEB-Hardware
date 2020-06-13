<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="Emily" />
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
		<script src="scripts/script.js"></script>
		<script src="scripts/enhancement.js"></script>
	</head>

	<body>
		<!-- header start -->
		<?php include "include/nav.php"; ?>

    <article>
			<?php include "include/enq.php";?>
			<div class = "enquiry_submit">
	      <?php
	        $fname = $_POST['vFname'];
	        $lname = $_POST['vLname'];
	        $email = $_POST['vEmail'];
	        $phone = $_POST['vPhone'];
	        $streetadd = $_POST['vStreet-address'];
	        $postcode = $_POST['vPostcode'];
	        $city = $_POST['vCity'];
	        $state = $_POST['vState'];
	        $product = $_POST['vProduct'];
	        $subject = $_POST['vSubject'];
	        $comment = $_POST['vComment'];

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
		          echo "<h1>Enquiry Submitted</h1>";
							echo "<p>Thank you for taking time to submit the enquiry. We will get back to you soon.</p>";
		        }else{
		          echo "<h1>Unsuccessful Enquiry</h1>";
		        }
					}
					else{
						echo "<h1>Enquiry Submitted</h1>";
						echo "<p>Thank you for taking time to submit the enquiry. We will get back to you soon.</p>";
					}
	     
	      ?>
			</div>
    </article>

    <?php include "include/footer.php" ?>
  </body>
</html>
