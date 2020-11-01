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

<form method="post" action="list.php">
<input type="submit" name="test" id="test" value="List all Attempts" /><br/>
</form>

<form method="post" action="search.php">
<p><label for="firstname">First Name</label> 
<input type="text" name= "firstname" id="firstname" pattern="[A-Za-z]{1,25}" required="required"/>

<p><label for="stuid">Student ID</label> 
<input type="text" name= "stuid" id="stuid" pattern="^(\d{7}|\d{10})$" minlength="7" maxlength="10" size="10" required="required"/>
<input type="submit" name="search" id="search" value="Search for attempts" /><br/>
</form>

<form method="post" action="success.php" novalidate="novalidate">
    <input type="submit" name="test" id="test1" value="List 100% tests" /><br/>
</form>

<form method="post" action="lessthan50.php" novalidate="novalidate">
    <input type="submit" name="test" id="test2" value="List less than 50% on third Attempt" /><br/>
</form>

<form method="post" action="delete.php" novalidate="novalidate">
	<label for="stuid">Student ID</label> 
	<input type="text" name= "stuid" id="stuid1" pattern="^(\d{7}|\d{10})$" minlength="7" maxlength="10" size="10" required="required"/>
    <input type="submit" name="test" id="test3" value="Delete Attempts" /><br/>
</form>

<form method="post" action="changeresult.php" novalidate="novalidate">
	<label for="stuid">Student ID</label> 
	<input type="text" name= "stuid" id="stuid2" pattern="^(\d{7}|\d{10})$" minlength="7" maxlength="10" size="10" required="required"/>
	<label for="stuid">Enter desired mark</label> 
	<input type="text" name= "enteredResult" id="enteredResult" pattern="^(\d{7}|\d{10})$" minlength="7" maxlength="10" size="10" required="required"/>
    <input type="submit" name="test" id="test4" value="Change Score" /><br/>
</form>
</body>

</html>