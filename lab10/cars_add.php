<html lang="en">
<head>
<title>Retrieving records to HTML</title>

<meta charset="utf-8"/>
<meta name="description" content="lab 10"/>
<meta name="keywords" content="php, file, input, output"/>

</head>

<body>
<h1>CWA - Lab 10</h1>
<?php
  $make = trim($_POST["carmake"]);
  $model = trim($_POST["carmodel"]);
  $price = trim($_POST["price"]);
  $yom = trim($_POST["yom"]);

  require_once("settings.php");

  $conn = @mysqli_connect($host,$user,$pwd,$sql_db);

  if(!$conn) {
      echo "<p>Database connection failure</p>"
  } else { 

    $make = htmlspecialcharts($make);
    $make = mysqli_escape_string($conn,$make);

    $query = "insert into $sql_table (make,model,price,yom) values('$make','$model','$price','$yom')";

    $result = mysqli_query($conn,$query);
    if (!$result) {
        echo "<p class\"wrong\">Something is wrong with ", $query, "</p>";
    } else {
        echo "<p class=\"ok\">Successfully added new car record</p>";
    }
}

  mysqli_close($conn);
?>
</body>
</html>