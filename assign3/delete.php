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
 $stuid = $_POST['stuid'];
 
 require_once "settings.php"; //conncects to database
         $conn = @mysqli_connect($host,
         $user,
         $pwd,
         $sql_db
         );
 
     $sql = "DELETE FROM attempts WHERE StudentID='$stuid'"; //deletes
     $result = mysqli_query($conn, $sql); 
     
     if($result) {
     
     echo 'Deleted'; //confirmation
     }
     else {
     echo 'Deletion Unsuccessful';
     }
?>

</body>

</html>