<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="Emily" />
		<meta name="description" content="hardware_website" />
		<meta name="keywords" content="equipments,hardware" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<title>SEB Hardware - Enhancements 2</title>
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
			<h1>Enhancements 2</h1>
			<section>
				<h2>Enquiry Icon for every Product</h2>
				<p>
					Implemented on <a href="product1.php">product1.php</a>,
					<a href="product2.php">product2.php</a> and
					<a href="product3.php">product3.php</a>. An enquiry icon is added
					beside the price of every product. It functions as a button that
					redirects the user to the enquiry page which allows users to make
					enquiry when needed. When the user clicks on the enquiry icon, a
					session object will be created with a key of ‘Model’ to store the data
					related to the product model. This session object is required to fill
					the subject input automatically when the user is redirected to the
					enquiry page.
				</p>
			</section>
			<section>
				<h2>Fill Subject Input based on Product Selected</h2>
				<p>
					For <a href="enquiry.php">enquiry page</a>, when the user selects the
					product in the product input field, the subject input field will be
					filled automatically based on the product selected by the user. The value
					of session storage with the key 'Model' is obtained to fill the product input field.
				</p>
			</section>
			<section>
				<h2>Navbar List Animation</h2>
				<p>
					Implemented on <a href="product1.php">product1.php</a>,
					<a href="product2.php">product2.php</a> and
					<a href="product3.php">product3.php</a>. A list of product items is
					kept in script.js and are used to populate the 3 pages listed above on
					load. Each page has a popup layout near the end on the markup that
					will be updated by the script whenever a product is being clicked.
				</p>
			</section>
			<section>
				<h2>Red Border When Invalid Form Input</h2>
				<p>
					This is implemented on <a href="enquiry.php">enquiry page</a>. The
					form inputs in enquiry are validated when the submit button is
					clicked. When there are invalid inputs, an alert message would pop out
					and all the invalid input fields will have a red border around it. If
					the user submits another time with the correct input, the red border
					will not be shown anymore.
				</p>
			</section>
			<section>
				<h2>Dynamically Create Products</h2>
				<p>
					Implemented on <a href="product1.php">product1.php</a>,
					<a href="product2.php">product2.php</a> and
					<a href="product3.php">product3.php</a>. The product data exist in
					shared.js and is used to programmatically create the DOM nodes for
					each product.
				</p>
			</section>
		</article>
		<?php include "include/footer.php" ?>
	</body>
</html>
