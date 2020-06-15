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
      <div class="container">
        <table class = "view_enquiries">
          <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Product</th>
            <th class="subject">Subject</th>
            <th class="comment">Comment:</th>
          <tr>
          <?php
            session_start();

            $db_host = "localhost";
            $db_user = "root";
            $db_password = "";
            $db_name = "seb_hardware";

            $conn = mysqli_connect($db_host, $db_user, $db_password,$db_name);

            // Make sure authorize, returns user role if autorize
            $role = check_authorization($conn);

            if ($role == "viewer") {
              echo "<p class='note'>NOTE: you only have viewer access. You cannot edit anything here.</p>";
            }

            $sql = "SELECT * FROM enquiries";
            $result = mysqli_query($conn,$sql);

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
                      </tr>";
              }
            } else {
              echo "<p class='note'>No enquiry at the moment. Please check again later.</p>";
            }

            // Check autorization
            function check_authorization($conn) {
              // Check come from login.php
              if (!isset($_POST["username"]) || !isset($_POST["password"])) {
                // not from login.php, we check existing session
                if (isset($_SESSION) && isset($_SESSION["role"])) {
                  // Legit access
                  return $_SESSION["role"];
                } else {
                  redirect_login();
                }
              } else {
                $username = $_POST["username"];
                $password = $_POST["password"];

                $sql = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ?;");
                mysqli_stmt_bind_param($sql, "s", $username);
                mysqli_stmt_execute($sql);
                $result = mysqli_stmt_get_result($sql);

                $row = mysqli_fetch_assoc($result);
      
                // If no row, means username invalid
                if (!$row) {
                  redirect_login();
                }
      
                $hash = $row["hash"];
                $correct_password = password_verify($password, $hash);

                if ($correct_password) {
                  // Legit access, start session so dont have to login on next session
                  // Save role
                  $_SESSION["role"] = $row["role"];

                  return $row["role"];
                } else {
                  // Incorrect password, shoo go away
                  redirect_login();
                }
              }
            }

            function redirect_login() {
              header("Location: login.php");
              exit();
            }
          ?>
        </table>
      </div>
      <div class="logout">
        <form name="logout" action="logout.php" method="post">
          <input type="submit" value="Logout" />
        </form>
      </div>
    </article>

    <?php include "include/footer.php" ?>
  </body>
</html>
