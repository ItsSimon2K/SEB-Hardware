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

            if (isset($_POST['formaction']) && $_POST['formaction'] == 'delete') {
              delete_data($conn, $_POST['id']);
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
                        <td>
                          <form action = 'view_enquiries.php' method = 'POST'>
                            <input type='hidden' name='formaction' value='delete' />
                            <input type='hidden' name='id' value='" . $row['id'] . "' />
                            <button type='submit'>
                              <img src = 'images/delete_icon.png' alt = 'delete_icon' />
                            </button>
                          </form>
                        </td>
												<td>
                          <form action = 'view_enquiries.php' method = 'POST'>
                            <input type='hidden' name='formaction' value='update' />
                            <input type='hidden' name='id' value='" . $row['id'] . "' />
                            <button type='submit'>
                              <img src = 'images/update_icon.png' alt = 'update_icon' />
                            </button>
                          </form>
                        </td>
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

						function delete_data($conn, $id){
							$sql = "DELETE FROM enquiries WHERE id = '$id'";
							if (mysqli_query($conn, $sql)) {
  							echo "Record deleted successfully";
							} else {
                echo "Error deleting record: " . mysqli_error($conn);
							}
						}
          ?>
        </table>
			</div>

			<?php

				if(isset($_POST['formaction']) && $_POST['formaction'] == 'update'){
						$id = $_POST['id'];
						$sql = "SELECT * FROM enquiries WHERE id = '$id'";
						$result = mysqli_query($conn,$sql);
						while ($row = mysqli_fetch_assoc($result)){
							$fname = $row['fname'];
							$lname = $row['lname'];
							$email = $row['email'];
							$phone = $row['phone'];
							$streetadd = $row['street_address'];
							$postcode = $row['postcode'];
							$city = $row['city'];
							$state = $row['state'];
							$comment = $row['comment'];
							$subject = $row['subject'];
							$product_id = $row['product_id'];
						}

						$sql = "SELECT name from products WHERE id = '$product_id'";
						$result = mysqli_query($conn,$sql);
						while ($row = mysqli_fetch_assoc($result)){
							$product_name = $row['name'];
						}


						echo "<div class='container'>
										<form name='enquiry' method='POST'>
											<div class='eform-card'>
												<div class='personal-info'>
													<fieldset>
														<legend><h2>Personal Information*:</h2></legend>
														<table class='personal-info-table'>
															<tr>
																<td>
																	<label for='fname'>First name:</label>
																</td>
																<td>
																	<label for='lname'>Last name:</label>
																</td>
															</tr>

															<tr>
																<td>
																	<input type='text' name='fname' id='fname' value = '" . $fname . "'/>
																</td>
																<td>
																	<input type='text' name='lname' id='lname' value = '" .$lname . "'/>
																</td>
															</tr>

															<tr>
																<td>
																	<label for='email'>E-mail Address:</label>
																</td>
																<td>
																	<label for='phone'>Phone number:</label>
																</td>
															</tr>

															<tr>
																<td>
																	<input type='text' name='email' id='email' value = '" . $email . "'/>
																</td>
																<td>
																	<input
																		type='text'
																		name='phone'
																		id='phone'
																		placeholder='0132564987'
																		vlaue = '" . $phone . "'
																	/>
																</td>
															</tr>
														</table>
													</fieldset>

													<fieldset>
														<legend><h2>Address*:</h2></legend>
														<table class='address-table'>
															<tr>
																<td>
																	<label for='street-address'>Street address:</label>
																</td>
															</tr>

															<tr>
																<td colspan='2'>
																	<input
																		type='text'
																		name='street-address'
																		id='street-address'
																		value = '" . $streetadd . "'
																	/>
																</td>
															</tr>

															<tr>
																<td>
																	<label for='postcode'>Postcode:</label>
																</td>

																<td>
																	<label for='city'>City/Town:</label>
																</td>
															</tr>

															<tr>
																<td>
																	<input type='text' name='postcode' id='postcode' value = '" . $postcode . "'/>
																</td>
																<td>
																	<input type='text' name='city' id='city' value = '" . $city . "'/>
																</td>
															</tr>

															<tr>
																<td>
																	State:
																</td>
															</tr>

															<tr>
																<td>
																	<select name='state' id='state'>
																		<option
																			value=''
																			selected='selected'
																			disabled='disabled'
																		>
																			Select a state
																		</option>
																		<option value='johor'>Johor</option>
																		<option value='kedah'>Kedah</option>
																		<option value='kelantan'>Kelantan</option>
																		<option value='malacca'>Malacca</option>
																		<option value='negeri sembilan'>Negeri Sembilan</option>
																		<option value='pahang'>Pahang</option>
																		<option value='penang'>Penang</option>
																		<option value='perak'>Perak</option>
																		<option value='perlis'>Perlis</option>
																		<option value='sabah'>Sabah</option>
																		<option value='sarawak'>Sarawak</option>
																		<option value='selangor'>Selangor</option>
																		<option value='terengganu'>Terengganu</option>
																		<option value='KL'>Kuala Lumpur</option>
																		<option value='LB'>Labuan</option>
																		<option value='PJ'>Putrajaya</option>
																	</select>
																</td>
															</tr>
														</table>
													</fieldset>
												</div>

												<div class='enquiry'>
													<fieldset>
														<legend><h2>Enquiry:</h2></legend>
														<table class='enquiry-table'>
															<tr>
																<td>
																	Product*:
																</td>
															</tr>

															<tr>
																<td>
																	<select name='product' id='product'>
																		<option
																			value=''
																			selected='selected'
																			disabled='disabled'
																		>
																			Select a product
																		</option>";



				$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

				$select_data = "SELECT name FROM products";

				$result = mysqli_query($conn,$select_data);

				while ($row = mysqli_fetch_assoc($result)){
					$productName = $row['name'];
					if ($productName == $product_name){
						echo "<option value='$productName' selected = 'selected'>$productName</option>";
					}else{
						echo "<option value='$productName'>$productName</option>";
					}
				}

				echo "
								<tr>
									<td>
										<label for='subject'>Subject:</label>
									</td>
								</tr>
								<tr>
									<td>
										<input type='text' name='subject' id='subject' value = '" . $subject . "' />
									</td>
								</tr>

								<tr>
									<td>
										<label for='comment'>Comment:</label>
									</td>
								</tr>

								<tr>
									<td>
										<textarea
											name='comment'
											id='comment'
											cols='30'
											rows='10'
										>" . $comment . "</textarea>
									</td>
								</tr>
							</table>
						</fieldset>
						<div class='submit-reset-container'>
							<input type='reset' value='Reset' />
							<input type='submit' value='Submit' />
						</div>
					</div>
				</div>
			</form>
		</div>";
		}
			?>



      <div class="logout">
        <form name="logout" action="logout.php" method="post">
          <input type="submit" value="Logout" />
        </form>
      </div>
    </article>

    <?php include "include/footer.php" ?>
  </body>
</html>
