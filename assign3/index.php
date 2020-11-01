<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="JavaScript Object Notation" />
    <meta name="keywords" content="HTML5, CSS, JavaScript Object Notation, JSON, JS, JavaScript" />
    <meta name="author" content="Mario Stavreski" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/main.css" rel="stylesheet" />
    <!--<script src="scripts/quiz.js"></script>-->
    <title>JSON - JavaScript Object Notation</title>

    <link rel="icon" type="image/png" href="images/json-logo.png">
</head>

<body>

    <?php include ("header.inc"); ?>

    <article>
        <div class="section">
            <div>
                <div id="wrapper">
                    <div id="first">
                        <h2>What is JSON?</h2>
                        <p>JSON (JavaScript Object Notation) is a text-based data format following JavaScript object syntax, which was popularized by Douglas Crockford. Even though it closely resembles JavaScript object literal syntax, it can be used independently
                            from JavaScript, and many programming environments feature the ability to read (parse) and generate JSON JSON exists as a string — useful when you want to transmit data across a network. It needs to be converted to a native
                            JavaScript object when you want to access the data. This is not a big issue — JavaScript provides a global JSON object that has methods available for converting between the two.
                        </p>
                        <p>A JSON object can be stored in its own file, which is basically just a text file with an extension of .json, and a MIME type of application/json. </p>
                    </div>
                    <div id="second">
                        <h2>JSON Structure</h2>
                        <p>As described above, a JSON is a string whose format very much resembles JavaScript object literal format. You can include the same basic data types inside JSON as you can in a standard JavaScript object — strings, numbers, arrays,
                            booleans, and other object literals. This allows you to construct a data hierarchy.
                        </p>
                    </div>
                </div>
                <h3>Some facts about JSON</h3>
                <ol>
                    <li>JSON is purely a data format — it contains only properties, no methods.</li>
                    <li>JSON requires double quotes to be used around strings and property names. Single quotes are not valid.</li>
                    <li>Even a single misplaced comma or colon can cause a JSON file to go wrong, and not work. You should be careful to validate any data you are attempting to use (although computer-generated JSON is less likely to include errors, as long
                        as the generator program is working correctly). You can validate JSON using an application like JSONLint.</li>
                    <li>JSON can actually take the form of any data type that is valid for inclusion inside JSON, not just arrays or objects. So for example, a single string or number would be a valid JSON object.</li>
                    <li>Unlike in JavaScript code in which object properties may be unquoted, in JSON only quoted strings may be used as properties.</li>


                </ol>
            </div>

        </div>

    </article>

 <?php include "footer.inc"; ?>

</body>

</html>