<!DOCTYPE html>
<html lang="en">
<head>
	<title>Rohirrim Booking</title>
	<meta charset="utf-8"/>
	<meta name="description" content="Rohirrim Process Booking" />
	<meta name="author"    content="MAaio Stavreski" />
</head>

<body>
    <h1>Rohirrim Tour Booking Confirmation</h1>

<!-- Begin Processing -->
<?php
    function sanitise_input($data) {
        $data = trim($data);
        $data = stripSlashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Checks if the process was triggered by a form submit, if not then display an error
    if (isset($_POST["firstname"])) {
        $firstname = $_POST["firstname"];
    }
    else {
        //Redirect to form, if process is not triggered by a form submit
        header ("location: register.html");
    }

    if (isset($_POST["lastname"])) {
        $lastname = $_POST["lastname"];
    }

    if (isset($_POST["age"])) {
        $age = $_POST["age"];
    }

    if (isset($_POST["food"])) {
        $food = $_POST["food"];
    }
    else {
        $food = "Unknown food";
    }

    if (isset($_POST["partySize"])) {
        $partySize = $_POST["partySize"];
    }

    if (isset($_POST["species"])) {
        $species = $_POST["species"];
    }
    else {
        $species = "Unknown species";
    }

    $tour = "";
    if (isset($_POST["1day"])) $tour = $tour. "One-Day tour ";
    if (isset($_POST["4day"])) $tour = $tour. "Four-Day tour ";
    if (isset($_POST["10day"])) $tour = $tour. "Ten-Day tour ";

    $firstname = sanitise_input($firstname);
    $lastname = sanitise_input($lastname);
    $species = sanitise_input($species);
    $age = sanitise_input($age);
    $food = sanitise_input($food);
    $partySize = sanitise_input($partySize);

    $errMsg = "";
    if ($firstname==="") {
        $errMsg = "<p>You must enter your first name</p>";
    }
    else if (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
        $errMsg .= "<p>Only alpha letters allowed in your first name.</p>";
    }
    if ($lastname==="") {
        $errMsg = "<p>You must enter your last name</p>";
    }
    else if (!preg_match("/^[a-zA-Z]*$/", $lastname)) {
        $errMsg .= "<p>Only alpha letters allowed in your last name.</p>";
    }
    if (is_numeric($age) === "0") {
        $errMsg = "<p>Your age must be numeric.</p>";
    }
    else if ($age < 10) {
        $errMsg = "<p>Your age must be above 10.</p>";
    }
    else if ($age > 10000) {
        $errMsg = "<p>Your age must be below 10,000.</p>";
    }
    if ($errMsg != "") {
        echo "<p>$errMsg</p>";
    }
    else {
    echo "<p>
    Welcome $firstname $lastname! <br />
    You are now booked on the $tour <br />
    Species: $species <br />
    Age: $age <br />
    Meal Preference: $food <br />
    Number of travellers: $partySize <br />
    </p>";
    }
    ?>    

</body>
</html>