<body>
<?php
    include ("mathfunctions.php");      //makes the functions in the included file available
?>
    <h1>Creating Web Applications - Lab 8</h1>
<?php
    if(isset($_GET["number"])) {        // check if the form data exists
        $num = $_GET["number"];         // obtain the form data
    if (isPositiveInteger($num)) {      // call the function
        echo "<p>", $num, "! is ", factorial ($num), ".</p>";
    } else {        //if number is not an integer
        echo "<p>Please enter a positive integer.</p>";
    }
    }
    echo "<p><a href='factorial.html'>Return to the Entry Page</a></p>"
?>
</body>