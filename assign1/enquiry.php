<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="Sim Mao Chen" />
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

	<body onload="enquiryPage()">
		<!-- header start -->
		<?php include "./nav.php"; ?>
		<!-- header end -->

		<!-- content start -->
		<article>
			<div class="product-hero product-hero--enquiry">
				<div class="product-hero__container container">
					<h1 class="product-hero__container__title">Enquiry</h1>
					<p class="product-hero__container__desc">
						We want to hear from you
					</p>
				</div>
			</div>

			<div class="container">
				<form name="enquiry" action="mailto:support@sebhardware.com" method="POST">
					<div class="eform-card">
						<div class="personal-info">
							<fieldset>
								<legend><h2>Personal Information*:</h2></legend>
								<table class="personal-info-table">
									<tr>
										<td>
											<label for="fname">First name:</label>
										</td>
										<td>
											<label for="lname">Last name:</label>
										</td>
									</tr>

									<tr>
										<td>
											<input type="text" name="fname" id="fname" />
										</td>
										<td>
											<input type="text" name="lname" id="lname" />
										</td>
									</tr>

									<tr>
										<td>
											<label for="email">E-mail Address:</label>
										</td>
										<td>
											<label for="phone">Phone number:</label>
										</td>
									</tr>

									<tr>
										<td>
											<input type="text" name="email" id="email" />
										</td>
										<td>
											<input
												type="text"
												name="phone"
												id="phone"
												placeholder="0132564987"
											/>
										</td>
									</tr>
								</table>
							</fieldset>

							<fieldset>
								<legend><h2>Address*:</h2></legend>
								<table class="address-table">
									<tr>
										<td>
											<label for="street-address">Street address:</label>
										</td>
									</tr>

									<tr>
										<td colspan="2">
											<input
												type="text"
												name="street-address"
												id="street-address"
											/>
										</td>
									</tr>

									<tr>
										<td>
											<label for="postcode">Postcode:</label>
										</td>

										<td>
											<label for="city">City/Town:</label>
										</td>
									</tr>

									<tr>
										<td>
											<input type="text" name="postcode" id="postcode" />
										</td>
										<td>
											<input type="text" name="city" id="city" />
										</td>
									</tr>

									<tr>
										<td>
											State:
										</td>
									</tr>

									<tr>
										<td>
											<select name="state" id="state">
												<option
													value=""
													selected="selected"
													disabled="disabled"
												>
													Select a state
												</option>
												<option value="johor">Johor</option>
												<option value="kedah">Kedah</option>
												<option value="kelantan">Kelantan</option>
												<option value="malacca">Malacca</option>
												<option value="negeri sembilan">Negeri Sembilan</option>
												<option value="pahang">Pahang</option>
												<option value="penang">Penang</option>
												<option value="perak">Perak</option>
												<option value="perlis">Perlis</option>
												<option value="sabah">Sabah</option>
												<option value="sarawak">Sarawak</option>
												<option value="selangor">Selangor</option>
												<option value="terengganu">Terengganu</option>
												<option value="KL">Kuala Lumpur</option>
												<option value="LB">Labuan</option>
												<option value="PJ">Putrajaya</option>
											</select>
										</td>
									</tr>
								</table>
							</fieldset>
						</div>

						<div class="enquiry">
							<fieldset>
								<legend><h2>Enquiry:</h2></legend>
								<table class="enquiry-table">
									<tr>
										<td>
											Product*:
										</td>
									</tr>

									<tr>
										<td>
											<select name="product" id="product">
												<option
													value=""
													selected="selected"
													disabled="disabled"
												>
													Select a product
												</option>
											</select>
										</td>
									</tr>

									<tr>
										<td>
											<label for="subject">Subject:</label>
										</td>
									</tr>
									<tr>
										<td>
											<input type="text" name="subject" id="subject" />
										</td>
									</tr>

									<tr>
										<td>
											<label for="comment">Comment:</label>
										</td>
									</tr>

									<tr>
										<td>
											<textarea
												name="comment"
												id="comment"
												cols="30"
												rows="10"
											></textarea>
										</td>
									</tr>
								</table>
							</fieldset>
							<div class="submit-reset-container">
								<input type="reset" value="Reset" />
								<input type="submit" value="Submit" />
							</div>
						</div>
					</div>
				</form>
			</div>
		</article>
		<!-- content end -->

		<!-- footer start -->
		<?php include "./footer.php" ?>
		<!-- footer end -->
	</body>
</html>
