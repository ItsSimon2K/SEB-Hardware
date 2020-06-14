<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="description" content="hardware_website" />
		<meta name="author" content="Emily" />
		<meta name="keywords" content="equipments,hardware" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<title>SEB Hardware - Login</title>
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
		<!-- header end -->
		<!--Content start-->
		<article class="container">
			<div class="login-container">
				<form name="login" action="view_enquiries.php" method="POST">
					<h1>Login</h1>
					<table>
						<tr>
							<td>
								<input type="text" name="username" placeholder="Username" />
							</td>
						</tr>
						<tr>
							<td>
								<input type="password" name="password" placeholder="Password" />
							</td>
						</tr>
						<tr>
							<td>
							<input type="submit" value="Login" />
							</td>
						</tr>
					</table>
				</form>
			</div>
		</article>
		<!--Content end-->

		<!-- footer start -->
		<?php include "include/footer.php" ?>
		<!-- footer end -->
	</body>
</html>
