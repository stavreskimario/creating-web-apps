<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="JavaScript Object Notation" />
    <meta name="keywords" content="HTML5, CSS, JavaScript Object Notation, JSON, JS, JavaScript" />
    <meta name="author" content="Mario Stavreski" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/main.css" rel="stylesheet" />
    <script src="scripts/quiz.js"></script>
    <script src="scripts/enhancements.js"></script>


    <title>JSON Quiz</title>

    <link rel="icon" type="image/png" href="images/json-logo.png">

</head>
<?php include ("header.inc"); ?>

<?php 
require_once "settings.php";
$conn = @mysqli_connect($host,
$user,
$pwd,
$sql_db
);

$sql = "SELECT StudentID, firstname, lastname FROM attempts WHERE Score < '3' AND Attempt='2'";
$result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function

echo "<br>";
echo "<table border='1'>";

while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
echo "<tr>";

foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
}
echo "</tr>";
}
echo "</table>";
?>

</body>

</html>