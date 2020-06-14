<?php
// Create database and tables.
// Called only once to setup database

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "seb_hardware";

$conn = new mysqli($db_host, $db_user, $db_password);

if (!$conn) {
	echo "Error: Unable to connect to database.<br />";
	echo "Debugging errno: " . mysqli_connect_errno() . "<br />";
	echo "Debugging error: " . mysqli_connect_error() . "<br />";
	exit;
}

echo "Database connected.<br />";
echo "Checking if current database exists...<br />";

$database_exist = mysqli_select_db($conn, $db_name);

if ($database_exist) {
	echo "Database exist! Abort.<br />";
	exit;
}

// Create database for use
if (mysqli_query($conn, "CREATE DATABASE $db_name;") && mysqli_select_db($conn, $db_name)) {
	echo "New database created.<br />";
}

// Below will start creating all tables and seeding.
// Start a transaction in case things fail.

mysqli_begin_transaction($conn);

if (create_tables($conn) && seed_database($conn)) {
	mysqli_commit($conn);
	echo "Done! omg<br />";
} else {
	// Ahh! Error why
	$error = mysqli_error($conn);

	mysqli_rollback($conn);

	// Drop the database, so no one knows this database ever exist!
	mysqli_query($conn, "DROP DATABASE $db_name;");

	die("Error when creating database: $error");
}

// Return true if all queries successful
function create_tables($conn) {
	echo "Creating tables...<br />";

	return (
		mysqli_query($conn,"
			CREATE TABLE products (
				id INTEGER AUTO_INCREMENT PRIMARY KEY,
				type TEXT NOT NULL,
				name TEXT NOT NULL,
				img TEXT NOT NULL,
				price DECIMAL(10,2) NOT NULL,
				features TEXT NOT NULL,
				description TEXT NOT NULL
			);
		") &&
		mysqli_query($conn, "
			CREATE TABLE enquiries (
				id INTEGER AUTO_INCREMENT PRIMARY KEY,
				fname TEXT NOT NULL,
				lname TEXT NOT NULL,
				email TEXT NOT NULL,
				phone TEXT NOT NULL,
				street_address TEXT NOT NULL,
				postcode TEXT NOT NULL,
				city TEXT NOT NULL,
				state TEXT NOT NULL,
				subject TEXT NOT NULL,
				comment TEXT NOT NULL,
				product_id INTEGER NOT NULL,
				FOREIGN KEY (product_id) REFERENCES products(id)
			);
		") &&
		mysqli_query($conn, "
			CREATE TABLE users (
				id INTEGER AUTO_INCREMENT PRIMARY KEY,
				username TEXT NOT NULL UNIQUE,
				hash TEXT NOT NULL,
				role TEXT NOT NULL
			);
		")
	);
}

// Return true if all queries successful
function seed_database($conn) {
	echo "Seeding database...<br />";
	return seed_users($conn) && seed_products($conn);
}

// Return true if all queries successful
function seed_users($conn) {
	echo "Seeding users...<br />";

	$users = array(
		array(
			"username" => "admin",
			"password" => "admin",
			"role" => "admin"
		),
		array(
			"username" => "viewer",
			"password" => "hack3r",
			"role" => "viewer"
		)
	);

	// Prepare sql for sanitization, in case we sql inject ourself for some reason.
	$sql = mysqli_prepare($conn, "INSERT INTO users (username, hash, role) VALUES " . implode(",", array_fill(0, count($users), "(?, ?, ?)")));

	// Generate all the types in a single string, as per `mysqli_stmt_bind_param` requirement
	$sql_types = str_repeat("sss", count($users));

	// Flatten values from products into a single array. Sequentially according to column order.
	$sql_values = array_reduce(
		$users,
		function ($acc, $user) {
			$username = $user["username"];
			$hash = password_hash($user["password"], PASSWORD_BCRYPT);
			$role = $user["role"];

			array_push($acc, $username, $hash, $role);

			return $acc;
		},
		array()
	);

	// Sanitize
	mysqli_stmt_bind_param($sql, $sql_types, ...$sql_values);

	return mysqli_stmt_execute($sql);
}

// Return true if all queries successful
function seed_products($conn) {
	echo "Seeding products...<br />";

	$products = array(
		array(
			"type" => "earplug",
			"name" => "Classic JKJ EP18",
			"img" => "images/earplugs/classic_jkj_ep18.png",
			"price" => 25,
			"features" => array("Moisture-resistant", "Flame-resistant"),
			"desc" =>
				"Classic JKJ EP18 has a noise reduction rating (NRR)* of 29 dB. It is constructed from slow-recovery foam and conforms to the shape of the ear canal.",
		),
		array(
			"type" => "earplug",
			"name" => "Foam Earplug",
			"img" => "images/earplugs/foam_earplug.png",
			"price" => 12,
			"features" => array("Dirt resistant", "Soft polyurethane foam"),
			"desc" =>
				"Foam Earplugs are easy to roll down for quick and easy fitting. It has a tapered design to fit comfortably in earcanals and is made of soft polyurethane foam which is hypoallergenic. It has noise reduction rating (NRR) of 29 dB.",
		),
		array(
			"type" => "earplug",
			"name" => "Jazz Band",
			"img" => "images/earplugs/jazz_band.png",
			"price" => 48,
			"features" => array("Soft tapered foam", "Hangs around neck"),
			"desc" =>
				"Jazz Band is the ideal choice for intermittent usage. It hangs easily down around the user's neck with optional breakaway neck cord and provides greater comfort and fit for increased compliance and convenience. Jazz Band does not interfere with eyewear.",
		),
		array(
			"type" => "earplug",
			"name" => "Max Earplug",
			"img" => "images/earplugs/max.png",
			"price" => 30,
			"features" => array("Bell-shaped", "Polyurethane foam"),
			"desc" =>
				"Max Earplug has contoured design easier to insert, resists tendency to back-out of ear canal. It is made of polyurethane foam which enhances comfort, especially for long-term wear. It has noise reduction rating (NRR) of 33 dB.",
		),
		array(
			"type" => "earplug",
			"name" => "Reusable Earplug",
			"img" => "images/earplugs/reusable_earplug.png",
			"price" => 60,
			"features" => array("Washable & reusable", "Portable container"),
			"desc" =>
				"Reusable Earplug is washable, reusable earplugs with 25dB of noise reduction and a neck band, which helps keep them clean and close at hand. Triple flange design offers a comfortable, snug fit. It includes a handy storage container to keep the plugs clean when not in use.",
		),
		array(
			"type" => "earplug",
			"name" => "Rockets Reusable",
			"img" => "images/earplugs/rockets_reusable.jpg",
			"price" => 50,
			"features" => array("Detectable plug & cord", "Easy grip handle"),
			"desc" =>
				"Rocket Reusable Earplug has air bubble in tip provides cushioned comfort. It can be washed and reused. It is available in corded, uncorded, corded metal detectable and camo Special Ops models.",
		),
		array(
			"type" => "respirator",
			"name" => "3M 9000 Series Respirator",
			"img" => "images/respirators/9000_Series.jpg",
			"price" => 450,
			"features" => array("Streamlined design", "Exclusive over-molded lens"),
			"desc" =>
				"3M 9000 Series Respirator has exclusive over-molded lens offers greater field of vision. It has lighter weight for superior all-day comfort and stand-away head harness for easy donning and doffing. Lens stays away from flat surface when laid down to avoid scratching.",
		),
		array(
			"type" => "respirator",
			"name" => "3M Ultimate FX Full Face Respirator",
			"img" => "images/respirators/ultimate_fx.jpg",
			"price" => 850,
			"features" => array("Stain resistant lens", "Passive speaking diaphragm"),
			"desc" =>
				"3M Ultimate FX Full Face Respirator has scotchgard protection paint and stain resistant lens causing some liquids to bead up so they can be wiped off easily. Large lens provides a wide field of view for excellent visibility. Silicone full facepiece design offers comfort, durability and ease of cleaning. It has 3M Cool Flow Valve makes breathing easier to provide cool, dry comfort. Passive speaking diaphragm enhances communications.",
		),
		array(
			"type" => "respirator",
			"name" => "3M 6080 Full Face Respirator",
			"img" => "images/respirators/6080_fullface.jpg",
			"price" => 550,
			"features" => array("Lightweight, well-balanced design", "Air purifying respirator"),
			"desc" =>
				"This reusable full face mask offers lightweight comfort and ease of use. Unique center adapter to direct exhaled breath and moisture downward, helps reduce debris from depositing in the valve, and allows for quick and easy cleaning. Large lens for wide field of view and excellent visibility. Combine with appropriate 3M™ Particulate Filters or Cartridges, to help provide respiratory protection against particulates and/or a variety of gases and vapours.",
		),
		array(
			"type" => "respirator",
			"name" => "3M 7000 Series Respirator",
			"img" => "images/respirators/7000_Series.jpg",
			"price" => 54.9,
			"features" => array("Advance silicone material", "Color coded to indicate size"),
			"desc" =>
				"3M 7000 Series Respirator has a light weight design plus extra-wide sealing area provides all-day comfort. Low profile, compact design fits well under welding helmets and with safety glasses. Mask drops down for convenient storage around the neck or locks down for custom fit. Adjustable head cradle and curved neck buckles for extra comfort.",
		),
		array(
			"type" => "respirator",
			"name" => "3M 7500 Series Respirator",
			"img" => "images/respirators/7500_Series.jpg",
			"price" => 110,
			"features" => array("Dual-mode head harness", "Cool Flow Valve"),
			"desc" =>
				"3M 7500 Series Respirator is made of advance silicone material for increased comfort and greater durability. Proprietary 3M™ CoolFlow™ valve helps makes breathing easier.	Dual-mode head harness adjusts easily for either standard or drop-down mode.Exhalation valve cover directs exhaled breath and moisture downward to reduce fogging.",
		),
		array(
			"type" => "respirator",
			"name" => "3M 3200 Half Face Respirator",
			"img" => "images/respirators/3200.jpg",
			"price" => 35,
			"features" => array("Elastomeric face seal", "Lightweight"),
			"desc" =>
				"3M 3200 Half Face Respirator has low profile design allows a wide field of vision. Lightweight makes long period of wear bearable. Soft, elastomeric face-fit secures a lasting comfort. Unique easy to don/doff strap system.",
		),
		array(
			"type" => "glove",
			"name" => "Ansell PU Gloves",
			"img" => "images/gloves/ansell_edge_PU_gloves.jpg",
			"price" => 28,
			"features" => array(
				"Good level of abrasion and tear resistance",
				"Seamless structure, ensure comfort",
			),
			"desc" =>
				"Ansell PU Gloves has EN level 4 of abrasion and good tear resistance, good grip, improved productivity. The 48-125 Ansell gloves shows dirt contamination more quickly. Seamless structure ensures comfort and encourages safety and glove usage.",
		),
		array(
			"type" => "glove",
			"name" => "Ansell Easy Flex Gloves",
			"img" => "images/gloves/ansell_easyflex.jpg",
			"price" => 30,
			"features" => array(
				"Much better resistance to snags, puncture and abrasion",
				"High durability",
			),
			"desc" =>
				"Ansell Easy Flex Gloves has better resistance to snags, punctures, abrasions and cuts when compared to ordinary 8-ounce cotton and string-knit gloves. It is ergonomically designed to be extremely cool, comfortable, light and flexible. Has superior dry grip.",
		),
		array(
			"type" => "glove",
			"name" => "Ansell Hyflex Gloves",
			"img" => "images/gloves/ansell_hyflex.jpg",
			"price" => 35,
			"features" => array(
				"Higher flexibility in high-stress areas",
				"Balanced between comfort, dexterity and protection",
			),
			"desc" =>
				"Ansell Hyflex Gloves has improved coating offers improved grip in dry and slightly oily environments along with an extended durability compared to its previous formulation. Benefits from proprietary washing process that efficiently extracts impurities to deliver a cleaner, more comfortable glove.",
		),
		array(
			"type" => "glove",
			"name" => "Ansell Thermaprene Gloves",
			"img" => "images/gloves/ansell_thermaprene.jpg",
			"price" => 32,
			"features" => array(
				"Excellent mechanical and chemical properties",
				"Comfortable insulating double liner",
			),
			"desc" =>
				"Ansell Thermaprene Gloves is designed to protect the users in applications where thermal and chemical risks are present. Excellent mechanical and chemical properties. Unaffected by detergents and cleaning solutions. Excellent protection against greases and oils. Comfortable insulating double liner. Provides protection from intermittent contact with hot surfaces up to 180°C.",
		),
		array(
			"type" => "glove",
			"name" => "Ansell Cut Resistant Gloves",
			"img" => "images/gloves/ansell_cutresistant.jpg",
			"price" => 30,
			"features" => array(
				"Good dexterity and flexibility",
				"High cut protection and abrasion level",
			),
			"desc" =>
				"Ansell Cut Resistant Gloves is an ultralight weight glove that offers unparalleled dexterity and refined mobility. ZONZ knitting technology uses selected yarns and varying stitch designs to tailor overall glove fit to enhance hand movement for higher dexterity and reduced fatigue.",
		),
		array(
			"type" => "glove",
			"name" => "Nitron Gloves",
			"img" => "images/gloves/nitron.jpg",
			"price" => 25,
			"features" => array(
				"Chemical resistant",
				"Proven durability against solvents, oil, fats and bleaching chemical agents.",
			),
			"desc" =>
				"Nitron Gloves has granular dip finish provides safe handling in wet and dry conditions. Hard wearing and resistant to abrasion. Flexible nitrile coating on a cotton interlock liner. Extra long for added protection. Chemical resistant to a wide range of detergents and solvents.",
		),
	);

	// Prepare sql for sanitization, in case we sql inject ourself for some reason.
	$sql = mysqli_prepare($conn, "INSERT INTO products (type, name, img, price, features, description) VALUES " . implode(",", array_fill(0, count($products), "(?, ?, ?, ?, ?, ?)")));

	// Generate all the types in a single string, as per `mysqli_stmt_bind_param` requirement
	$sql_types = str_repeat("sssdss", count($products));

	// Flatten values from products into a single array. Sequentially according to column order.
	$sql_values = array_reduce(
		$products,
		function ($acc, $product) {
			$type = $product["type"];
			$name = $product["name"];
			$img = $product["img"];
			$price = $product["price"];
			// Serialize features array because we don't need to index it in the database
			$features = serialize($product["features"]);
			$description = $product["desc"];

			array_push($acc, $type, $name, $img, $price, $features, $description);

			return $acc;
		},
		array()
	);

	// Sanitize
	mysqli_stmt_bind_param($sql, $sql_types, ...$sql_values);

	return mysqli_stmt_execute($sql);
}
?>
