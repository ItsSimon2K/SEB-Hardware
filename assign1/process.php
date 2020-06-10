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
		<script src="scripts/shared.js"></script>
		<script src="scripts/script.js"></script>
		<script src="scripts/enhancement.js"></script>
	</head>

	<body>
		<!-- header start -->
		<?php include "include/nav.php"; ?>

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

				$select_data = "SELECT name,id FROM products";
				$result = mysqli_query($conn,$select_data);


				while ($row = mysqli_fetch_assoc($result)){
					$product_name = $row['name'];
					if ($product_name == $product){
						$product_id = $row['id'];
						break;
					}
				}

        $sql = "INSERT INTO enquiries(fname,lname,email,phone,street_address,postcode,city,state,subject,comment,product_id)
               VALUES ('$fname','$lname','$email','$phone','$streetadd','$postcode','$city','$state','$subject','$comment',$product_id)";
        if (mysqli_query($conn,$sql)){
          echo "<h1>Enquiry Submitted</h1>";
        }else{
          echo "Unsuccessful Enquiry". mysqli_error($conn);
        }

      ?>
    </article>

    <?php include "include/footer.php" ?>
  </body>
</html>
