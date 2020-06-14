<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="Bjorn Lu" />
		<meta name="description" content="hardware_website" />
		<meta name="keywords" content="equipments,hardware" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<title>SEB Hardware - Products</title>
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
		<article class="container">
			<div class="products-hero">
				<h1 class="products-hero__header">Products</h1>
				<p class="products-hero__check">
					We sell earplugs, respirator and gloves with all kinds of brands.
				</p>
			</div>
			<div class="products-box">
				<a class="products-box__item" href="product1.php">
					<div>
						<img
							class="products-box__item__img"
							src="images/earplug_icon.jpg"
							alt="earplug_icon"
						/>
					</div>
					<div class="products-box__item__content">
						<div class="products-box__item__content__title">
							Earplugs
						</div>
						<span class="products-box__item__content__desc">
							High quality earplugs
						</span>
					</div>
				</a>
				<a class="products-box__item" href="product2.php">
					<div>
						<img
							class="products-box__item__img"
							src="images/respirator_icon.jpg"
							alt="respirator_icon"
						/>
					</div>
					<div class="products-box__item__content">
						<div class="products-box__item__content__title">
							Respirators
						</div>
						<span class="products-box__item__content__desc">
							High quality respirators
						</span>
					</div>
				</a>
				<a class="products-box__item" href="product3.php">
					<div>
						<img
							class="products-box__item__img"
							src="images/glove_icon.jpg"
							alt="glove_icon"
						/>
					</div>
					<div class="products-box__item__content">
						<div class="products-box__item__content__title">
							Gloves
						</div>
						<span class="products-box__item__content__desc">
							High quality gloves
						</span>
					</div>
				</a>
			</div>
		</article>
		<?php include "include/footer.php" ?>
	</body>
</html>
