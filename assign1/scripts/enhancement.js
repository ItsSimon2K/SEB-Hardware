/*
	Filename: enhancement.js
	Target html: all html file
	Purpose: Form Validation, Enhance web page
	Author: Emily, Bjorn, Sim Mao Chen
	Date written: 10/5/2020
*/

//#region Single product page

function onLoadProduct1Page() {
	fillProductItems("earplug");
	initProductPopup();
}

function onLoadProduct2Page() {
	fillProductItems("respirator");
	initProductPopup();
}

function onLoadProduct3Page() {
	fillProductItems("glove");
	initProductPopup();
}

function fillProductItems(type) {
	const template = document.getElementById("product-grid__item");
	const productGrid = document.querySelector(".product-grid");

	products
		.filter((v) => v.type === type)
		.forEach((product) => {
			const newItem = template.content.cloneNode(true);

			const main = newItem.querySelector(".product-grid__item");
			const img = newItem.querySelector(".product-grid__item__img");
			const title = newItem.querySelector(
				".product-grid__item__content__title"
			);
			const desc = newItem.querySelector(".product-grid__item__content__desc");
			const price = newItem.querySelector(".product-grid__item__price span");

			// Set img
			img.setAttribute("src", product.img);
			img.setAttribute("alt", product.name);

			// Set title
			title.innerText = product.name;

			// Set features
			product.features.forEach((feature) => {
				const featureItem = document.createElement("li");
				featureItem.innerText = feature;
				desc.appendChild(featureItem);
			});

			// Set price
			price.innerText = `RM ${product.price.toFixed(2)}`;

			// Open popup
			main.addEventListener("click", () => {
				openProductPopup(product);
			});

			// Add child to grid
			productGrid.appendChild(newItem);
		});
}

function initProductPopup() {
	const popup = document.querySelector(".product-popup");
	const popupCard = document.querySelector(".product-popup__card");
	const popupCardCloseButton = document.querySelector(
		".product-popup__card__content__title__close"
	);

	popup.addEventListener("click", () => {
		popup.classList.remove("show");
	});

	popupCardCloseButton.addEventListener("click", () => {
		popup.classList.remove("show");
	});

	popupCard.addEventListener("click", (e) => {
		// Prevent event bubble
		e.stopPropagation();
	});
}

function openProductPopup(product) {
	const popup = document.querySelector(".product-popup");
	const popupImg = document.querySelector(".product-popup__card__img");
	const popupTitle = document.querySelector(
		".product-popup__card__content__title__text"
	);
	const popupDesc = document.querySelector(
		".product-popup__card__content__desc"
	);
	const popupPrice = document.querySelector(".product-popup__card__price span");
	const popupLink = document.querySelector(".product-popup__card__price a");

	popupImg.setAttribute("src", product.img);
	popupImg.setAttribute("alt", product.name);

	popupTitle.innerText = product.name;
	popupPrice.innerText = `RM ${product.price.toFixed(2)}`;
	popupDesc.innerText = product.desc;

	popupLink.onclick = () => {
		sessionStorage.setItem("Model", product.name);
	};

	popup.classList.add("show");
}

//#endregion
