/*
	Filename: shared.js
	Target html: all html file
	Purpose: Form Validation, Enhance web page
	Author: Emily, Bjorn, Sim Mao Chen
	Date written: 10/5/2020
*/

/* All information and description taken from https://www.3m.com.my and https://www.innovestengineering.com */

const products = [
	{
		type: "earplug",
		name: "Classic JKJ EP18",
		img: "images/earplugs/classic_jkj_ep18.png",
		price: 25,
		features: ["Moisture-resistant", "Flame-resistant"],
		desc:
			"Classic JKJ EP18 has a noise reduction rating (NRR)* of 29 dB. It is constructed from slow-recovery foam and conforms to the shape of the ear canal.",
	},
	{
		type: "earplug",
		name: "Foam Earplug",
		img: "images/earplugs/foam_earplug.png",
		price: 12,
		features: ["Dirt resistant", "Soft polyurethane foam"],
		desc:
			"Foam Earplugs are easy to roll down for quick and easy fitting. It has a tapered design to fit comfortably in earcanals and is made of soft polyurethane foam which is hypoallergenic. It has noise reduction rating (NRR) of 29 dB.",
	},
	{
		type: "earplug",
		name: "Jazz Band",
		img: "images/earplugs/jazz_band.png",
		price: 48,
		features: ["Soft tapered foam", "Hangs around neck"],
		desc:
			"Jazz Band is the ideal choice for intermittent usage. It hangs easily down around the user's neck with optional breakaway neck cord and provides greater comfort and fit for increased compliance and convenience. Jazz Band does not interfere with eyewear.",
	},
	{
		type: "earplug",
		name: "Max Earplug",
		img: "images/earplugs/max.png",
		price: 30,
		features: ["Bell-shaped", "Polyurethane foam"],
		desc:
			"Max Earplug has contoured design easier to insert, resists tendency to back-out of ear canal. It is made of polyurethane foam which enhances comfort, especially for long-term wear. It has noise reduction rating (NRR) of 33 dB.",
	},
	{
		type: "earplug",
		name: "Reusable Earplug",
		img: "images/earplugs/reusable_earplug.png",
		price: 60,
		features: ["Washable & reusable", "Portable container"],
		desc:
			"Reusable Earplug is washable, reusable earplugs with 25dB of noise reduction and a neck band, which helps keep them clean and close at hand. Triple flange design offers a comfortable, snug fit. It includes a handy storage container to keep the plugs clean when not in use.",
	},
	{
		type: "earplug",
		name: "Rockets Reusable",
		img: "images/earplugs/rockets_reusable.jpg",
		price: 50,
		features: ["Detectable plug & cord", "Easy grip handle"],
		desc:
			"Rocket Reusable Earplug has air bubble in tip provides cushioned comfort. It can be washed and reused. It is available in corded, uncorded, corded metal detectable and camo Special Ops models.",
	},
	{
		type: "respirator",
		name: "3M 9000 Series Respirator",
		img: "images/respirators/9000_Series.jpg",
		price: 450,
		features: ["Streamlined design", "Exclusive over-molded lens"],
		desc:
			"3M 9000 Series Respirator has exclusive over-molded lens offers greater field of vision. It has lighter weight for superior all-day comfort and stand-away head harness for easy donning and doffing. Lens stays away from flat surface when laid down to avoid scratching.",
	},
	{
		type: "respirator",
		name: "3M Ultimate FX Full Face Respirator",
		img: "images/respirators/ultimate_fx.jpg",
		price: 850,
		features: ["Stain resistant lens", "Passive speaking diaphragm"],
		desc:
			"3M Ultimate FX Full Face Respirator has scotchgard protection paint and stain resistant lens causing some liquids to bead up so they can be wiped off easily. Large lens provides a wide field of view for excellent visibility. Silicone full facepiece design offers comfort, durability and ease of cleaning. It has 3M Cool Flow Valve makes breathing easier to provide cool, dry comfort. Passive speaking diaphragm enhances communications.",
	},
	{
		type: "respirator",
		name: "3M 6080 Full Face Respirator",
		img: "images/respirators/6080_fullface.jpg",
		price: 550,
		features: ["Lightweight, well-balanced design", "Air purifying respirator"],
		desc:
			"This reusable full face mask offers lightweight comfort and ease of use. Unique center adapter to direct exhaled breath and moisture downward, helps reduce debris from depositing in the valve, and allows for quick and easy cleaning. Large lens for wide field of view and excellent visibility. Combine with appropriate 3M™ Particulate Filters or Cartridges, to help provide respiratory protection against particulates and/or a variety of gases and vapours.",
	},
	{
		type: "respirator",
		name: "3M 7000 Series Respirator",
		img: "images/respirators/7000_Series.jpg",
		price: 54.9,
		features: ["Advance silicone material", "Color coded to indicate size"],
		desc:
			"3M 7000 Series Respirator has a light weight design plus extra-wide sealing area provides all-day comfort. Low profile, compact design fits well under welding helmets and with safety glasses. Mask drops down for convenient storage around the neck or locks down for custom fit. Adjustable head cradle and curved neck buckles for extra comfort.",
	},
	{
		type: "respirator",
		name: "3M 7500 Series Respirator",
		img: "images/respirators/7500_Series.jpg",
		price: 110,
		features: ["Dual-mode head harness", "Cool Flow Valve"],
		desc:
			"3M 7500 Series Respirator is made of advance silicone material for increased comfort and greater durability. Proprietary 3M™ CoolFlow™ valve helps makes breathing easier.	Dual-mode head harness adjusts easily for either standard or drop-down mode.Exhalation valve cover directs exhaled breath and moisture downward to reduce fogging.",
	},
	{
		type: "respirator",
		name: "3M 3200 Half Face Respirator",
		img: "images/respirators/3200.jpg",
		price: 35,
		features: ["Elastomeric face seal", "Lightweight"],
		desc:
			"3M 3200 Half Face Respirator has low profile design allows a wide field of vision. Lightweight makes long period of wear bearable. Soft, elastomeric face-fit secures a lasting comfort. Unique easy to don/doff strap system.",
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
		desc:
			"Ansell PU Gloves has EN level 4 of abrasion and good tear resistance, good grip, improved productivity. The 48-125 Ansell gloves shows dirt contamination more quickly. Seamless structure ensures comfort and encourages safety and glove usage.",
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
		desc:
			"Ansell Easy Flex Gloves has better resistance to snags, punctures, abrasions and cuts when compared to ordinary 8-ounce cotton and string-knit gloves. It is ergonomically designed to be extremely cool, comfortable, light and flexible. Has superior dry grip.",
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
		desc:
			"Ansell Hyflex Gloves has improved coating offers improved grip in dry and slightly oily environments along with an extended durability compared to its previous formulation. Benefits from proprietary washing process that efficiently extracts impurities to deliver a cleaner, more comfortable glove.",
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
		desc:
			"Ansell Thermaprene Gloves is designed to protect the users in applications where thermal and chemical risks are present. Excellent mechanical and chemical properties. Unaffected by detergents and cleaning solutions. Excellent protection against greases and oils. Comfortable insulating double liner. Provides protection from intermittent contact with hot surfaces up to 180°C.",
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
		desc:
			"Ansell Cut Resistant Gloves is an ultralight weight glove that offers unparalleled dexterity and refined mobility. ZONZ knitting technology uses selected yarns and varying stitch designs to tailor overall glove fit to enhance hand movement for higher dexterity and reduced fatigue.",
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
		desc:
			"Nitron Gloves has granular dip finish provides safe handling in wet and dry conditions. Hard wearing and resistant to abrasion. Flexible nitrile coating on a cotton interlock liner. Extra long for added protection. Chemical resistant to a wide range of detergents and solvents.",
	},
];

const navProducts = ["Earplugs", "Respirators", "Gloves"];

const navAbouts = ["Bjorn", "Simon", "Emily"];
