<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="Emily" />
		<meta name="description" content="hardware_website" />
		<meta name="keywords" content="equipments,hardware" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<title>SEB Hardware - PHP Enhancements</title>
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
		<?php include "include/nav.php"; ?>
		<article class="enhancements container">
			<h1>PHP Enhancements</h1>
			<section>
				<h2>User Authentication and Authorization</h2>
				<p>
					Implemented on <a href="view_enquiries.php">view_enquiries.php</a>,
					<a href="login.php">login.php</a> and
					<a href="logout.php">logout.php</a>.
				</p>
				<p>
					Our team has implemented a simple user auth structure to allow or
					deny access to view_enquiries.php. This is to prevent unauthorized
					user to access the organization’s sensitive data.
				</p>
				<p>
					Whenever an unauthorized user tries to access the page, the server
					will check if the user is authenticated before proceeding to send
					back the enquiry data. If the user is authorized, the user can
					access the data and make modifications depending on his/her role.
				</p>
				<p>
					Once the user is ready to logout, the server will clear the user’s
					session and the user will then be unauthenticated.
				</p>
			</section>
			<section>
				<h2>Load Product Data from Database</h2>
				<p>
					Implemented on <a href="product1.php">product1.php</a>,
					<a href="product2.php">product2.php</a> and
					<a href="product3.php">product3.php</a>.
				</p>
				<p>
					Each product page obtains its products by querying the database before
					sending back the page to the user. The database has a table called
					‘products’ which contains information such as product name, description,
					and more, with also a ‘type’ column to identify the product type.
				</p>
				<p>
					For our website, we have 3 product types, which are earplug,
					respirator and glove, and are presented on product1.php, product2.php
					and product3.php respectively.
				</p>
			</section>
		</article>
		<?php include "include/footer.php" ?>
	</body>
</html>
