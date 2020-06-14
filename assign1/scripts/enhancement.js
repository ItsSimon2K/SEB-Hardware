/*
	Filename: enhancement.js
	Target html: all html file
	Purpose: Form Validation, Enhance web page
	Author: Emily, Bjorn, Sim Mao Chen
	Date written: 10/5/2020
*/

//#region Single product page

function onLoadProductEnhancement() {
	initProductPopup();
	attachPopupClickListener();
}

function attachPopupClickListener() {
	document.querySelectorAll(".product-grid__item").forEach((item) => {
		const name = item.querySelector(".product-grid__item__content__title").innerText;
		const img = item.querySelector(".product-grid__item__img").getAttribute("src");
		const price = item.querySelector(".product-grid__item__price").innerText;
		const desc = item.querySelector(".product-grid__item__desc").innerText;

		item.addEventListener("click", () => {
			openProductPopup({ name, img, price, desc });
		});
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
	popupPrice.innerText = product.price;
	popupDesc.innerText = product.desc;

	popupLink.onclick = () => {
		sessionStorage.setItem("Model", product.name);
	};

	popup.classList.add("show");
}

//#endregion
