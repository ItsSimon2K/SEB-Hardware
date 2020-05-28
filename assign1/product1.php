<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="Bjorn Lu" />
		<meta name="description" content="hardware_website" />
		<meta name="keywords" content="equipments,hardware" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<title>SEB Hardware - Earplugs</title>
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

	<body onload="onLoadProduct1Page();allProductsPage();">
		<?php include "./nav.php"; ?>
		<article>
			<div class="product-hero product-hero--earplug">
				<div class="product-hero__container container">
					<h1 class="product-hero__container__title">Earplugs</h1>
					<p class="product-hero__container__desc">
						Protect your ears from all kinds of noise
					</p>
				</div>
			</div>
			<div class="container">
				<div class="product-grid">
					<template id="product-grid__item">
						<div class="product-grid__item">
							<div>
								<img class="product-grid__item__img" />
							</div>
							<div class="product-grid__item__content">
								<div class="product-grid__item__content__title"></div>
								<ul class="product-grid__item__content__desc"></ul>
							</div>
							<div class="product-grid__item__price">
								<span></span>
								<a href="enquiry.php">
									<img src="images/enquiry.png" alt="enquiry icon" />
								</a>
							</div>
						</div>
					</template>
				</div>
				<div class="product-popup">
					<div class="product-popup__card">
						<div>
							<img class="product-popup__card__img" />
						</div>
						<div>
							<div class="product-popup__card__content">
								<div class="product-popup__card__content__title">
									<div class="product-popup__card__content__title__text"></div>
									<button
										class="product-popup__card__content__title__close"
									></button>
								</div>
								<p class="product-popup__card__content__desc"></p>
							</div>
							<div class="product-popup__card__price">
								<span></span>
								<a href="enquiry.php">
									<img src="images/enquiry.png" alt="enquiry icon" />
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
		<?php include "./footer.php" ?>
	</body>
</html>
