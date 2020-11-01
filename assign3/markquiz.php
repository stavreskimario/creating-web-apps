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

<body>
<?php include ("header.inc"); ?>

<?php
  
    require_once "settings.php";

    $conn = @mysqli_connect($host,
    $user,
    $pwd,
    $sql_db
    );

    $stuid = $_POST['stuid'];
    $attempt = 0;

    //database connection and creates table
    if (!$conn) {
        echo "<h1> Database Connection Failed</h1>";
    } else {
        echo "<h1> Database connection success</h1>";

        $query = "CREATE TABLE IF NOT EXISTS attempts ( 
            attemptID INT AUTO_INCREMENT PRIMARY KEY,
            date DATE,
            time TIME(6),
            firstName VARCHAR(20),
            lastName VARCHAR(20),
            snumber VARCHAR(8),
            attemptNo INT,
            score INT
            );";

        $sql = "SELECT Attempt FROM attempts WHERE StudentID='$stuid'";
        $results = mysqli_query($conn, $sql);

        if (mysqli_num_rows($results) > 0) { //gets no of attempts from DB
        // output data of each row
        while($row = mysqli_fetch_assoc($results)) {
        echo "Attempt number: " . $row["Attempt"] . "\n";
        $value = $row["Attempt"];
        $attempt = $value + 1;
        echo $attempt;
        }

        } else {
        echo "This was your first attempt";
        }
            
    }
    //declared variables
    $err_msg= "";
    $err_attempt = "";
    $result = 0;

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $firstnamevalid = false;
    $lastnamevalid = false;
    $idvalid = false;

    $submissionvalid = true;

    if(preg_match("/^([0-9]){7}|([0-9]){10}$/",$stuid)) {// student id validation
        $idvalid = true;
        
    }

    if (preg_match("/^[a-zA-Z]+$/", $firstname)) { //firstname validation

        $firstnamevalid = true;
    }

    if (preg_match("/^[a-zA-Z]+$/", $lastname)) { //lastname validation

        $lastnamevalid = true;
    }

    if($attempt >= 3) { //attempts validation
        $submissionvalid = false;
        $err_attempt .= "<h3>You have exceeded your attempts </h3>";
        }

    if ($idvalid) { 

        if ($firstnamevalid and $lastnamevalid) {
        
    //question one validation and marking
    $questionone = $_POST['q-one']; 
    if ($questionone == "") {
        $err_msg .= "You havent answered question one <br/>";
        $submissionvalid = false;

    } 
    
    if ($questionone == "javascript object notation") { //marks q1
        $result = $result + 1; 
    }

    //question two validation and marking
    $questiontwo = $_POST['q-two'];

    if($questiontwo == "{ “sports” : [ “football” , “cricket” , “hockey” ] }") { //marks q2 radio
        $result = $result + 1;
    }

    if ($questiontwo == null) {
        $submissionvalid = false;
        $err_msg .= "You havent answered question two<br/>";
    }
    //question three validation and marking
    $questionthree = $_POST['q-three'];
    
    if ($questionthree == "BigDecimal") {
        $result = $result + 1;
    }

    if ($questionthree == null) {
        $submissionvalid = false;
        $err_msg .= "You havent answered question three<br/>";
    }
    //question four validation and marking
    $questionfour = $_POST['q-four'];

    if ($questionfour == 'Object') {
        $result = $result + 1;
        
    }

    //question five validation and marking
    $questionfive = $_POST['q-five'];

    if ($questionfive == '6') {
        $result = $result + 1;
    } 

    if ($questionfour == "") {
        $submissionvalid = false;
        $err_msg .= "You havent answered question four<br/>";

    }

    if ($questionfive == "") {
        $submissionvalid = false;
        $err_msg .= "You havent answered question five<br/>";

    }
    echo "<p> Total Marks: $result </p>"; //total marks

    if ($result == "0") {
        $submissionvalid = false;
        $err_msg .= "You got 0. Please try again<br/>";
    }

    if($submissionvalid) { //submits data to database
        $insert_query = "INSERT INTO attempts (DateTime, FirstName, LastName, StudentID, Attempt, Score) 
                        VALUES ( NOW(), '$firstname', '$lastname', '$stuid', $attempt, $result)";
    
        $insert_result = mysqli_query ($conn, $insert_query);
        
        if ($insert_result) {
        echo "<h3> Insert was successful. </h3>"; 
        } else {
            echo "<h3> Insert unsuccessful. <br/>$err_msg</h3>";
            echo "$err_attempt";
        }
    }


        } else {
            $err_msg .= "Entered name is invalid";
            $submissionvalid = false;
            echo "<h3> Insert unsuccessful. <br/> $err_msg</h3>";
        }   
    }   else {
            $err_msg .= "The entered ID is invalid\n";
            if ($firstnamevalid and $lastnamevalid) {

            } else {
                $err_msg .= "The name you have entered is also invalid";
                $submissionvalid = false;
                echo "<h3> Insert unsuccessful. <br/> $err_msg</h3>";
            }
    }
    //prints error messages if any
    echo $err_msg;
    echo $err_attempt;


?>

</body>

</html>