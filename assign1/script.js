const products = [
	"Classic JKJ EP18",
	"Foam Earplug",
	"Jazz Band",
	"Max Earplug",
	"Reusable Earplug",
	"Rockets Reusable",
	"3M 9000 Series Respirator",
	"3M Ultimate FX Full Face Respirator",
	"3M 6080 Full Face Respirator",
	"3M 7000 Series Respirator",
	"3M 7500 Series Respirator",
	"3M 3200 Half Face Respirator",
	"Ansell PU Gloves",
	"Ansell Easy Flex Gloves",
	"Ansell Hyflex Gloves",
	"Ansell Thermaprene Gloves",
	"Ansell Cut Resistant Gloves",
	"Nitron Gloves",
];

window.addEventListener("load", () => {
	const currentPage = window.location.pathname
		.replace(/.*assign1\//, "")
		.replace(".html", "");

	switch (currentPage) {
		case "product1":
		case "product2":
		case "product3":
			allProductsPage();
			break;
		case "enquiry":
			enquiryPage();
			break;
	}
});

//#region All products page

function allProductsPage() {
	initProductItems();
}

function initProductItems() {
	document.querySelectorAll(".product-grid__item").forEach((item) => {
		const enquiryLink = item.querySelector(".product-grid__item__price a");
		const model = item.querySelector(".product-grid__item__content__title")
			.innerText;

		enquiryLink.addEventListener("click", () => {
			sessionStorage.setItem("Model", model);
		});
	});
}

//#endregion

//#region Enquiry page

function enquiryPage() {
	initProductInput();
	autofillSelectedModel();
	autofillSubject();
}

function initProductInput() {
	const productInput = document.getElementById("product");

	for (let i = 0; i < products.length; i++) {
		const opt = document.createElement("option");
		const node = document.createTextNode(products[i]);
		opt.appendChild(node);
		opt.value = products[i];
		opt.selected = false;
		productInput.appendChild(opt);
	}

	productInput.value = "";
	productInput.addEventListener("change", autofillSubject);
}

function autofillSelectedModel() {
	const model = sessionStorage.getItem("Model");

	if (model) {
		const productOptions = document.getElementById("product").options;

		for (let i = 0; i < productOptions.length; i++) {
			const option = productOptions[i];
			option.selected = option.text === model;
		}

		sessionStorage.removeItem("Model");
	}
}

function autofillSubject() {
	const subject = document.getElementById("subject");
	const model = document.getElementById("product").value;

	if (model.length !== 0) {
		subject.value = "RE: Enquiry on " + model;
	} else {
		subject.value = "";
	}
}

//#endregion
