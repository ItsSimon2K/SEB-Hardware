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
	allvalidate();
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

//#region Form Validation

var errormsg = "";

function allvalidate() {
	const form = document.querySelector("form");
	form.addEventListener("submit", validateForm);
}

function validateForm(event) {
	var allok = false;
	var fnameok = chkname("fname");
	var lnameok = chkname("lname");
	var emailok = chkemail();
	var phoneok = chkphone();
	var addressok = chkaddress();
	var postcodeok = chkpostcode();
	var cityok = chkcity();
	var stateok = chkselection("state");
	var productok = chkselection("product");
	var subjectok = chksubject();
	var commentok = chkcomment();
	if (
		fnameok &&
		lnameok &&
		emailok &&
		phoneok &&
		addressok &&
		postcodeok &&
		cityok &&
		stateok &&
		productok &&
		subjectok &&
		commentok
	) {
		allok = true;
	} else {
		alert(errormsg);
		allok = false;
	}
	if (allok == false) {
		event.preventDefault();
	}
}

function chkname(nametype) {
	var nameok = false;
	const pattern = /[a-zA-z]+$/;
	const name = document.getElementById(nametype).value;
	if (name.length == 0) {
		if (nametype == "fname") {
			errormsg = errormsg + "First name cannot be empty.\n";
			nameok = false;
		} else if (nametype == "lname") {
			errormsg = errormsg + "Last name cannot be empty.\n";
			nameok = false;
		}
	} else if (name.length > 25) {
		errormsg = errormsg + "Field name can have a maximum of 25 characters.\n";
		nameok = false;
	} else if (pattern.test(name)) {
		nameok = true;
	} else {
		if (nametype == "fname") {
			errormsg = errormsg + "Invalid first name.\n";
			nameok = false;
		} else if (nametype == "lname") {
			errormsg = errormsg + "Invalid last name.\n";
			nameok = false;
		}
	}
	return nameok;
}

function chkemail() {
	var emailok = false;
	const pattern = /[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-za-zA-Z0-9.-]{1,4}$/;
	const email = document.getElementById("email").value;
	if (email.length == 0) {
		errormsg = errormsg + "Email cannot be empty.\n";
		emailok = false;
	} else if (pattern.test(email)) {
		emailok = true;
	} else {
		errormsg = errormsg + "Invalid email.\n";
		emailok = false;
	}
	return emailok;
}

function chkphone() {
	var phoneok = false;
	const pattern = /^[0-9]+$/;
	const phone = document.getElementById("phone").value;
	if (phone.length == 0) {
		errormsg = errormsg + "Phone number cannot be empty.\n";
		phoneok = false;
	} else if (pattern.test(phone) && phone.length == 10) {
		phoneok = true;
	} else {
		errormsg = errormsg + "Invalid phone number.\n";
		phoneok = false;
	}
	return phoneok;
}

function chkaddress() {
	var addressok = false;
	const address = document.getElementById("street-address").value;
	if (address.length == 0) {
		errormsg = errormsg + "Street address cannot be empty.\n";
		addressok = false;
	} else if (address.length > 40) {
		errormsg =
			errormsg + "Street address can have a maximum of 40 characters.\n";
		addressok = false;
	} else {
		addressok = true;
	}
	return addressok;
}

function chkpostcode() {
	var postcodeok = false;
	const pattern = /^[0-9]+$/;
	const postcode = document.getElementById("postcode").value;
	if (postcode.length == 0) {
		errormsg = errormsg + "Postcode field cannot be empty.\n";
		postcodeok = false;
	} else if (postcode.length > 5) {
		errormsg = errormsg + "Postcode can have a maximum of 5 numbers only.\n";
		postcodeok = false;
	} else if (pattern.test(postcode) && postcode.length == 5) {
		postcodeok = true;
	} else {
		errormsg = errormsg + "Postcode should be numeric with 5 digits.\n";
		postcodeok = false;
	}
	return postcodeok;
}

function chkcity() {
	var cityok = false;
	const pattern = /^[a-zA-z]+$/;
	const city = document.getElementById("city").value;
	if (city.length == 0) {
		errormsg = errormsg + "City name cannot be empty.\n";
		cityok = false;
	} else if (city.length > 16) {
		errormsg = "City name can have a maximum of 16 characters.\n";
		cityok = false;
	} else if (pattern.test(city)) {
		cityok = true;
	} else {
		errormsg = errormsg + "Invalid city name.\n";
		cityok = false;
	}
	return cityok;
}

function chkselection(selection_id) {
	var selectionok = false;
	var element = document.getElementById(selection_id).value;
	if (element !== "") {
		selectionok = true;
	} else {
		if (selection_id == "state") {
			errormsg = errormsg + "Please select a state.\n";
			selectionok = false;
		} else if (selection_id == "product") {
			errormsg = errormsg + "Please select a product.\n";
			selectionok = false;
		}
	}
	return selectionok;
}

function chksubject() {
	var subjectok = false;
	const subject = document.getElementById("subject").value;
	if (subject !== "") {
		subjectok = true;
	} else {
		errormsg = errormsg + "Please enter a subject.\n";
		subjectok = false;
	}
	return subjectok;
}

function chkcomment() {
	var commentok = false;
	const comment = document.getElementById("comment").value;
	if (comment !== "") {
		commentok = true;
	} else {
		errormsg = errormsg + "Please write your comments.\n";
		commentok = false;
	}
	return commentok;
}
