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
      <?php
        $db_host = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "seb_hardware";

        $conn = mysqli_connect($db_host, $db_user, $db_password,$db_name);

        $sql = "SELECT * FROM enquiries";
        $result = mysqli_query($conn,$sql);

        echo "<div class ='view_enquiries'>
                <table class = 'view_enquiries'>
                  <tr>
                    <th>ID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Product</th>
                    <th class = 'subject'>Subject</th>
                    <th class = 'comment'>Comment:</th>
                  <tr>";
        if ((mysqli_num_rows($result))>0){
          while ($row = mysqli_fetch_assoc($result)){

            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['fname'] . "</td>
                    <td>" . $row['lname'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['phone'] . "</td>
                    <td>" . $row['product_id'] . "</td>
                    <td class = 'subject'>" . $row['subject'] . "</td>
                    <td class = 'comment'>" . $row['comment'] . "</td>
                  </tr>
                  </table>
                  </div>";


          }
        }
      ?>
    </article>

    <?php include "include/footer.php" ?>
  </body>
</html>
