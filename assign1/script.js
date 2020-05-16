const products = [
	{
		type: "earplug",
		name: "Classic JKJ EP18",
		img: "images/earplugs/classic_jkj_ep18.png",
		price: 25,
		features: ["Moisture-resistant", "Flame-resistant"],
		desc: "Classic JKJ EP18 has a noise reduction rating (NRR)* of 29 dB. It is constructed from slow-recovery foam and conforms to the shape of the ear canal."

	},
	{
		type: "earplug",
		name: "Foam Earplug",
		img: "images/earplugs/foam_earplug.png",
		price: 12,
		features: ["Dirt resistant", "Soft polyurethane foam"],
		desc: "Foam Earplugs are easy to roll down for quick and easy fitting. It has a tapered design to fit comfortably in earcanals and is made of soft polyurethane foam which is hypoallergenic. It has noise reduction rating (NRR) of 29 dB."
	},
	{
		type: "earplug",
		name: "Jazz Band",
		img: "images/earplugs/jazz_band.png",
		price: 48,
		features: ["Soft tapered foam", "Hangs around neck"],
		desc: "Jazz Band is the ideal choice for intermittent usage. It hangs easily down around the user's neck with optional breakaway neck cord and provides greater comfort and fit for increased compliance and convenience. Jazz Band does not interfere with eyewear."
	},
	{
		type: "earplug",
		name: "Max Earplug",
		img: "images/earplugs/max.png",
		price: 30,
		features: ["Bell-shaped", "Polyurethane foam"],
		desc: "Max Earplug has contoured design easier to insert, resists tendency to back-out of ear canal. It is made of polyurethane foam which enhances comfort, especially for long-term wear. It has noise reduction rating (NRR) of 33 dB."
	},
	{
		type: "earplug",
		name: "Reusable Earplug",
		img: "images/earplugs/reusable_earplug.png",
		price: 60,
		features: ["Washable & reusable", "Portable container"],
		desc: "Reusable Earplug is washable, reusable earplugs with 25dB of noise reduction and a neck band, which helps keep them clean and close at hand. Triple flange design offers a comfortable, snug fit. It includes a handy storage container to keep the plugs clean when not in use."
	},
	{
		type: "earplug",
		name: "Rockets Reusable",
		img: "images/earplugs/rockets_reusable.jpg",
		price: 50,
		features: ["Detectable plug & cord", "Easy grip handle"],
		desc: "Rocket Reusable Earplug has air bubble in tip provides cushioned comfort. It can be washed and reused. It is available in corded, uncorded, corded metal detectable and camo Special Ops models."
	},
	{
		type: "respirator",
		name: "3M 9000 Series Respirator",
		img: "images/respirators/9000_Series.jpg",
		price: 450,
		features: ["Streamlined design", "Exclusive over-molded lens"],
		desc: "3M 9000 Series Respirator has exclusive over-molded lens offers greater field of vision. It has lighter weight for superior all-day comfort and stand-away head harness for easy donning and doffing. Lens stays away from flat surface when laid down to avoid scratching."
	},
	{
		type: "respirator",
		name: "3M Ultimate FX Full Face Respirator",
		img: "images/respirators/ultimate_fx.jpg",
		price: 850,
		features: ["Stain resistant lens", "Passive speaking diaphragm"],
		desc: "3M Ultimate FX Full Face Respirator has scotchgard protection paint and stain resistant lens causing some liquids to bead up so they can be wiped off easily. Large lens provides a wide field of view for excellent visibility. Silicone full facepiece design offers comfort, durability and ease of cleaning. It has 3M Cool Flow Valve makes breathing easier to provide cool, dry comfort. Passive speaking diaphragm enhances communications."
	},
	{
		type: "respirator",
		name: "3M 6080 Full Face Respirator",
		img: "images/respirators/6080_fullface.jpg",
		price: 550,
		features: ["Lightweight, well-balanced design", "Air purifying respirator"],
		desc: "This reusable full face mask offers lightweight comfort and ease of use. Unique center adapter to direct exhaled breath and moisture downward, helps reduce debris from depositing in the valve, and allows for quick and easy cleaning. Large lens for wide field of view and excellent visibility. Combine with appropriate 3M™ Particulate Filters or Cartridges, to help provide respiratory protection against particulates and/or a variety of gases and vapours."
	},
	{
		type: "respirator",
		name: "3M 7000 Series Respirator",
		img: "images/respirators/7000_Series.jpg",
		price: 54.9,
		features: ["Advance silicone material", "Color coded to indicate size"],
		desc: "3M 7000 Series Respirator has a light weight design plus extra-wide sealing area provides all-day comfort. Low profile, compact design fits well under welding helmets and with safety glasses. Mask drops down for convenient storage around the neck or locks down for custom fit. Adjustable head cradle and curved neck buckles for extra comfort."

	},
	{
		type: "respirator",
		name: "3M 7500 Series Respirator",
		img: "images/respirators/7500_Series.jpg",
		price: 110,
		features: ["Dual-mode head harness", "Cool Flow Valve"],
		desc: "3M 7500 Series Respirator is made of advance silicone material for increased comfort and greater durability. Proprietary 3M™ CoolFlow™ valve helps makes breathing easier.	Dual-mode head harness adjusts easily for either standard or drop-down mode.Exhalation valve cover directs exhaled breath and moisture downward to reduce fogging."

	},
	{
		type: "respirator",
		name: "3M 3200 Half Face Respirator",
		img: "images/respirators/3200.jpg",
		price: 35,
		features: ["Elastomeric face seal", "Lightweight"],
		desc: "3M 3200 Half Face Respirator has low profile design allows a wide field of vision. Lightweight makes long period of wear bearable. Soft, elastomeric face-fit secures a lasting comfort. Unique easy to don/doff strap system."
	},
	{
		type: "glove",
		name: "Ansell PU Gloves",
		img: "images/gloves/ansell_edge_PU_gloves.jpg",
		price: 28,
		features: [
			"Good level of abrasion and tear resistance",
			"Seamless structure, ensure comfort",
		],
		desc: "Ansell PU Gloves has EN level 4 of abrasion and good tear resistance, good grip, improved productivity. The 48-125 Ansell gloves shows dirt contamination more quickly. Seamless structure ensures comfort and encourages safety and glove usage."
	},
	{
		type: "glove",
		name: "Ansell Easy Flex Gloves",
		img: "images/gloves/ansell_easyflex.jpg",
		price: 30,
		features: [
			"Much better resistance to snags, puncture and abrasion",
			"High durability",
		],
		desc: "Ansell Easy Flex Gloves has better resistance to snags, punctures, abrasions and cuts when compared to ordinary 8-ounce cotton and string-knit gloves. It is ergonomically designed to be extremely cool, comfortable, light and flexible. Has superior dry grip."
	},
	{
		type: "glove",
		name: "Ansell Hyflex Gloves",
		img: "images/gloves/ansell_hyflex.jpg",
		price: 35,
		features: [
			"Higher flexibility in high-stress areas",
			"Balanced between comfort, dexterity and protection",
		],
		desc:"Ansell Hyflex Gloves has improved coating offers improved grip in dry and slightly oily environments along with an extended durability compared to its previous formulation. Benefits from proprietary washing process that efficiently extracts impurities to deliver a cleaner, more comfortable glove."
	},
	{
		type: "glove",
		name: "Ansell Thermaprene Gloves",
		img: "images/gloves/ansell_thermaprene.jpg",
		price: 32,
		features: [
			"Excellent mechanical and chemical properties",
			"Comfortable insulating double liner",
		],
		desc: "Ansell Thermaprene Gloves is designed to protect the users in applications where thermal and chemical risks are present. Excellent mechanical and chemical properties. Unaffected by detergents and cleaning solutions. Excellent protection against greases and oils. Comfortable insulating double liner. Provides protection from intermittent contact with hot surfaces up to 180°C."
	},
	{
		type: "glove",
		name: "Ansell Cut Resistant Gloves",
		img: "images/gloves/ansell_cutresistant.jpg",
		price: 30,
		features: [
			"Good dexterity and flexibility",
			"High cut protection and abrasion level",
		],
		desc: "Ansell Cut Resistant Gloves is an ultralight weight glove that offers unparalleled dexterity and refined mobility. ZONZ knitting technology uses selected yarns and varying stitch designs to tailor overall glove fit to enhance hand movement for higher dexterity and reduced fatigue."
	},
	{
		type: "glove",
		name: "Nitron Gloves",
		img: "images/gloves/nitron.jpg",
		price: 25,
		features: [
			"Chemical resistant",
			"Proven durability against solvents, oil, fats and bleaching chemical agents.",
		],
		desc:"Nitron Gloves has granular dip finish provides safe handling in wet and dry conditions. Hard wearing and resistant to abrasion. Flexible nitrile coating on a cotton interlock liner. Extra long for added protection. Chemical resistant to a wide range of detergents and solvents."
	},
];

const navProducts = ["Earplugs", "Respirators", "Gloves"];

const navAbouts = ["Bjorn", "Simon", "Emily"];

window.addEventListener("load", () => {
	const currentPage = window.location.pathname
		.replace(/.*assign1\//, "")
		.replace(".html", "");

	navBarList();

	switch (currentPage) {
		case "product1":
			fillProductItems("earplug");
			initProductPopup();
			allProductsPage();
			break;
		case "product2":
			fillProductItems("respirator");
			initProductPopup();
			allProductsPage();
			break;
		case "product3":
			fillProductItems("glove");
			initProductPopup();
			allProductsPage();
			break;
		case "enquiry":
			enquiryPage();
			break;
	}
});

//#region Nav bar
function navBarList() {
	initNavProduct();
	initNavAbout();
}

function initNavProduct() {
	const navProductsList = document.getElementById("navProducts");
	const uList = document.createElement("ul");
	for (let i = 0; i < navProducts.length; i++) {
		const listItem = document.createElement("li");
		const anchor = document.createElement("a");
		const node = document.createTextNode(navProducts[i]);
		anchor.appendChild(node);
		anchor.href = `product${i + 1}.html`;
		listItem.appendChild(anchor);
		uList.appendChild(listItem);
	}
	navProductsList.appendChild(uList);
}

function initNavAbout() {
	const navAboutsList = document.getElementById("navAbouts");
	const uList = document.createElement("ul");
	for (let i = 0; i < navAbouts.length; i++) {
		const listItem = document.createElement("li");
		const anchor = document.createElement("a");
		const node = document.createTextNode(navAbouts[i]);
		anchor.appendChild(node);
		anchor.href = `aboutme${i + 1}.html`;
		listItem.appendChild(anchor);
		uList.appendChild(listItem);
	}
	navAboutsList.appendChild(uList);
}

//#endregion

//#region Single product page

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

	popup.addEventListener("click", () => {
		popup.classList.remove("show");
	});

	popupCard.addEventListener("click", (e) => {
		// Prevent event bubble
		e.stopPropagation()
	});
}

function openProductPopup(product) {
	const popup = document.querySelector(".product-popup");
	const popupImg = document.querySelector(".product-popup__card__img");
	const popupTitle = document.querySelector(
		".product-popup__card__content__title"
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
	const productNames = products.map((v) => v.name);

	for (let i = 0; i < productNames.length; i++) {
		const opt = document.createElement("option");
		const node = document.createTextNode(productNames[i]);
		opt.appendChild(node);
		opt.value = productNames[i];
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

	var elements = [fnameok.toString(),
									lnameok.toString(),
									emailok.toString(),
									phoneok.toString(),
									addressok.toString(),
									postcodeok.toString(),
									cityok.toString(),
									stateok.toString(),
									productok.toString(),
									subjectok.toString(),
									commentok.toString()];


	var elements_id = ["fname",
										 "lname",
										 "email",
										 "phone",
										 "street-address",
										 "postcode",
										 "city",
										 "state",
										 "product",
										 "subject",
										 "comment"];

	for(let i = 0; i<elements.length;i++){
		if (elements[i]== "false"){
			document.getElementById(elements_id[i]).style.border = "thin solid red";
		}else{
			document.getElementById(elements_id[i]).style.border = "none";
		}
	}


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
		errormsg = "";
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
