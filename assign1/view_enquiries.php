<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="Emily & Bjorn" />
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

						if ($_SESSION["role"] == "admin"){
	            if (isset($_POST['formaction']) && $_POST['formaction'] == 'delete') {
	              delete_data($conn, $_POST['id']);
	            } elseif (isset($_POST['formaction']) && $_POST['formaction'] == 'viewed') {
	              viewed_data($conn, $_POST['id']);
							} elseif (isset($_POST['formaction']) && $_POST['formaction'] == 'unview') {
	              unview_data($conn, $_POST['id']);
							}
						}

            show_existing_enquiries($conn);
            show_viewed_enquiries($conn);

            function show_existing_enquiries($conn) {
              $sql = "
                SELECT e.*, p.name AS product_name FROM enquiries AS e
                  LEFT JOIN products AS p ON e.product_id = p.id
                  WHERE e.viewed = false;
              ";
              $result = mysqli_query($conn, $sql);

              echo "<h1 class='enquiry_header'>Existing Enquiries</h1>";

              if (mysqli_num_rows($result) > 0) {
                echo "<table class = 'view_enquiries'>
                        <tr>
                          <th>First name</th>
                          <th>Last name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Product</th>
                          <th class='subject'>Subject</th>
                          <th class='comment'>Comment:</th>
                        <tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>
                          <td>" . $row['fname'] . "</td>
                          <td>" . $row['lname'] . "</td>
                          <td>" . $row['email'] . "</td>
                          <td>" . $row['phone'] . "</td>
                          <td>" . $row['product_name'] . "</td>
                          <td class = 'subject'>" . $row['subject'] . "</td>
                          <td class = 'comment'>" . $row['comment'] . "</td>";

													if ($_SESSION["role"] == "admin"){
		                        echo "<td>
				                            <form action = 'view_enquiries.php' method = 'POST'>
				                              <input type='hidden' name='formaction' value='viewed' />
				                              <input type='hidden' name='id' value='" . $row['id'] . "' />
				                              <button type='submit' title='Set viewed'>
				                                <img src = 'images/update_icon.png' alt = 'update_icon' />
				                              </button>
				                            </form>
				                          </td>
				                          <td>
				                            <form action = 'view_enquiries.php' method = 'POST'>
				                              <input type='hidden' name='formaction' value='delete' />
				                              <input type='hidden' name='id' value='" . $row['id'] . "' />
				                              <button type='submit' title='Delete row'>
				                                <img src = 'images/delete_icon.png' alt = 'delete_icon' />
				                              </button>
				                            </form>
				                          </td>
				                        </tr>";
												}
                }
                echo "</table>";
              } else {
                echo "<p class='note'>No existing enquiry at the moment. Please check again later.</p>";
              }
            }

            function show_viewed_enquiries($conn) {
              $sql = "
                SELECT e.*, p.name AS product_name FROM enquiries AS e
                  LEFT JOIN products AS p ON e.product_id = p.id
                  WHERE e.viewed = true;
              ";
              $result = mysqli_query($conn, $sql);

              echo "<h1 class='enquiry_header'>Viewed Enquiries</h1>";

              if (mysqli_num_rows($result) > 0) {
                echo "<table class = 'view_enquiries'>
                        <tr>
                          <th>First name</th>
                          <th>Last name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Product</th>
                          <th class='subject'>Subject</th>
                          <th class='comment'>Comment:</th>
                        <tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>
                          <td>" . $row['fname'] . "</td>
                          <td>" . $row['lname'] . "</td>
                          <td>" . $row['email'] . "</td>
                          <td>" . $row['phone'] . "</td>
                          <td>" . $row['product_name'] . "</td>
                          <td class = 'subject'>" . $row['subject'] . "</td>
                          <td class = 'comment'>" . $row['comment'] . "</td>";

													if ($_SESSION["role"] == "admin"){
														echo "<td>
				                            <form action = 'view_enquiries.php' method = 'POST'>
				                              <input type='hidden' name='formaction' value='unview' />
				                              <input type='hidden' name='id' value='" . $row['id'] . "' />
				                              <button type='submit' title='Unview'>
				                                <img src = 'images/update_icon.png' alt = 'update_icon' />
				                              </button>
				                            </form>
				                          </td>
				                          <td>
				                            <form action = 'view_enquiries.php' method = 'POST'>
				                              <input type='hidden' name='formaction' value='delete' />
				                              <input type='hidden' name='id' value='" . $row['id'] . "' />
				                              <button type='submit' title='Delete row'>
				                                <img src = 'images/delete_icon.png' alt = 'delete_icon' />
				                              </button>
				                            </form>
				                          </td>
				                        </tr>";
												}
                }
                echo "</table>";
              } else {
                echo "<p class='note'>No viewed enquiry at the moment. Please check again later.</p>";
              }
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

						function delete_data($conn, $id) {
              $sql = mysqli_prepare($conn, "DELETE FROM enquiries WHERE id = ?;");
              mysqli_stmt_bind_param($sql, "s", $id);
							if (mysqli_stmt_execute($sql)) {
                // Debug
  							// echo "Record deleted successfully";
							} else {
                echo "Error deleting record: " . mysqli_error($conn);
							}
						}

						function viewed_data($conn, $id) {
              $sql = mysqli_prepare($conn, "UPDATE enquiries SET viewed = true WHERE id = ?;");
              mysqli_stmt_bind_param($sql, "s", $id);
							if (mysqli_stmt_execute($sql)) {
                // Debug
  							// echo "Record updated successfully";
							} else {
                echo "Error updated record: " . mysqli_error($conn);
							}
            }

            function unview_data($conn, $id) {
              $sql = mysqli_prepare($conn, "UPDATE enquiries SET viewed = false WHERE id = ?;");
              mysqli_stmt_bind_param($sql, "s", $id);
							if (mysqli_stmt_execute($sql)) {
                // Debug
  							// echo "Record updated successfully";
							} else {
                echo "Error updated record: " . mysqli_error($conn);
							}
						}
          ?>
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
