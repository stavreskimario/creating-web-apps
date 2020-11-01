<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="JavaScript Object Notation" />
    <meta name="keywords" content="HTML5, CSS, JavaScript Object Notation, JSON, JS, JavaScript" />
    <meta name="author" content="Mario Stavreski" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/main.css" rel="stylesheet" />


    <title>JSON Quiz</title>

    <link rel="icon" type="image/png" href="images/json-logo.png">

</head>

<body>
    <?php include ("header.inc"); ?>

    <article>
        <h2>JSON Quiz</h2>
        <h3 id="totalAttempts"></h3>
        <form method="post" action="markquiz.php" id="form1" novalidate="novalidate">
            <fieldset class="fieldset" id="main-fieldset">
                <fieldset>
                    <legend>Student Details</legend>
                    <p><label for="stuid">Student ID:</label>
                        <input type="text" name="stuid" id="stuid" required="required" pattern="^(\d{7}|\d{10})$">
                    </p>
                    <p><label for="firstname">First Name</label>
                        <input type="text" name="firstname" id="firstname" required="required" maxlength="25" pattern="[A-Za-z]{0,}" />
                    </p>
                    <p><label for="lastname">Last Name</label>
                        <input type="text" name="lastname" id="lastname" required="required" maxlength="25" pattern="[A-Za-z]{0,}" />
                    </p>
                </fieldset>

                <fieldset class="fieldset">
                    <legend>What is JSON?</legend>
                    <textarea id="q-one" name="q-one" rows="5" cols="50" placeholder="Write your answer here..." required="required"></textarea>
                </fieldset>

                <fieldset class="fieldset">
                    <legend>Which of the following example is a correct way to represent a JSON object?</legend>
                    <p><label for="q2a1">[ “sports” : { “football” , “cricket” , “hockey” } ]</label>
                        <input type="radio" id="q2a1" name="q-two" value="[ “sports” : { “football” , “cricket” , “hockey” } ]" required="required" />
                    </p>
                    <p><label for="q2a2">{[ “sports” : [ “football” , “cricket” , “hockey” ] }]</label>
                        <input type="radio" id="q2a2" name="q-two" value="{[ “sports” : [ “football” , “cricket” , “hockey” ] }]" required="required" />
                    </p>
                    <p><label for="q2a3">{ “sports” : [ “football” , “cricket” , “hockey” ] }</label>
                        <input type="radio" id="q2a3" name="q-two" value="{ “sports” : [ “football” , “cricket” , “hockey” ] }" required="required" />
                    </p>
                    <p><label for="q2a3">{ “sports” - [ “football” : “cricket” : “hockey” ] }</label>
                        <input type="radio" id="q2a4" name="q-two" value="{ “sports” - [ “football” : “cricket” : “hockey” ] }" required="required" />
                    </p>
                </fieldset>

                <fieldset class="fieldset">
                    <legend>Which of the following is a data type that is NOT supported by JSON spec?</legend>
                    <p><label for="q3a1">Array</label>
                        <input type="checkbox" id="q3a1" name="q-three" value="Array" />
                    </p>
                    <p><label for="q3a2">Object</label>
                        <input type="checkbox" id="q3a2" name="q-three" value="Object" />
                    </p>
                    <p><label for="q3a3">BigDecimal</label>
                        <input type="checkbox" id="q3a3" name="q-three" value="BigDecimal" />
                    </p>
                    <p><label for="q3a4">String</label>
                        <input type="checkbox" id="q3a4" name="q-three" value="String" />
                    </p>
                    <p><label for="q3a5">Boolean</label>
                        <input type="checkbox" id="q3a5" name="q-three" value="Boolean" />
                    </p>
                </fieldset>

                <fieldset class="fieldset">
                    <legend>When JSON data is assigned to JavaScript variable, it becomes a JavaScript _________?</legend>
                    <p><label for="q-four">Select your answer</label>
                        <select name="q-four" id="q-four" required="required">
                        <option></option>			
                        <option value="Callback-function">Callback function</option>
                        <option value="Object">Object</option>
                        <option value="function">function</option>
                        <option value="alert">alert</option>
                    </select>
                    </p>
                </fieldset>

                <fieldset class="fieldset">
                    <legend>How many data dypes are there in JSON?</legend>
                    <label for="quantity">Select your answer: </label>
                    <input type="number" id="q-five" name="q-five" min="1" max="10">
                </fieldset>

            </fieldset>

            <input type="submit" value="Submit" id="submit">
            <input type="reset" id="reset">
        </form>
    </article>

    <?php include "footer.inc"; ?>

</body>

</html>