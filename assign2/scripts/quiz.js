/* Filename: quiz.js
   Target html: quiz.html
   Purpose : 
   Author: Mario Stavreski ID: 103055993
   Date written: 20/09/2001
   Revisions:  v1.0
*/

"use strict";

//this function validates all andwers and adds 1 mark if answer is correct
function validate() {
    var errMsg = ""; // stores the error message
    var result = true; //assumes there are no errors
    var totalScore = 0; // the total score

    var stuid = document.getElementById("stuid").value; //retrieves the value from the stuid text box
    var firstname = document.getElementById("firstname").value; //retrieves the value from the firstname text box
    var lastname = document.getElementById("lastname").value; //retrieves the value from the lastname text box

    if (!stuid.match(/^([0-9]{7})|([0-9]{10})$/)) { //last name validation
        errMsg = errMsg + "Your Student ID must only contain 7 or 10 numeric characters.\n"
        result = false;
    }
    if (!firstname.match(/^[a-zA-Z]+$/)) { // last name validation
        errMsg = errMsg + "Your first name must only contain alpha characters.\n"
        result = false;
    }

    if (!lastname.match(/^[a-zA-Z]+$/)) { // last name validation
        errMsg = errMsg + "Your last name must only contain alpha characters.\n"
        result = false;
    }

    var questionOne = document.getElementById("q-one").value.toLowerCase();
    if (questionOne == "") { // question 1 marked and validated
        errMsg = errMsg + "You haven't answered question one\n"
        result = false;
    } else if (questionOne == "javascript object notation") {
        totalScore = totalScore + 1;
    }


    var qTwoAnswerOne = document.getElementById("q2a1").checked;
    var qTwoAnswerTwo = document.getElementById("q2a2").checked;
    var qTwoAnswerThree = document.getElementById("q2a3").checked;
    var qTwoAnswerFour = document.getElementById("q2a4").checked;
    if (!(qTwoAnswerOne || qTwoAnswerTwo || qTwoAnswerThree || qTwoAnswerFour)) { // validates question 2
        errMsg = errMsg + "No answer selected for question two.\n"
        result = false;
    }

    if (qTwoAnswerThree) { // marks question 2
        totalScore = totalScore + 1;
    }


    var qThreeAnswerOne = document.getElementById("q3a1").checked;
    var qThreeAnswerTwo = document.getElementById("q3a2").checked;
    var qThreeAnswerThree = document.getElementById("q3a3").checked;
    var qThreeAnswerFour = document.getElementById("q3a4").checked;
    var qThreeAnswerFive = document.getElementById("q3a5").checked;
    if (!(qThreeAnswerOne || qThreeAnswerTwo || qThreeAnswerThree || qThreeAnswerFour || qThreeAnswerFive)) { // validates question 3
        errMsg = errMsg + "No answer selected for question three.\n"
        result = false;
    }

    if (qThreeAnswerThree) { //marks question 3
        totalScore = totalScore + 1;

    }

    var questionFour = document.getElementById("q-four").value;

    if (questionFour == "") { // validates question 4
        errMsg = errMsg + "No answer selected for question four.\n"
        result = false;
    }

    if (questionFour == "Object") { //marks question 4
        totalScore = totalScore + 1;
    }

    var questionFive = document.getElementById("q-five").value;

    if (questionFive == "") { //validates question 5
        errMsg = errMsg + "No answer selected for question four.\n"
        result = false;
    }

    if (questionFive == 6) { //marks question 5
        totalScore = totalScore + 1;
    }

    if (totalScore == 0) { //prevents user from submitting for if their score is 0
        result = false;
        alert("All your question are incorrect please retry and submit again");
    }

    if (result) { //submits quiz if result = true
        attempts += 1;
        storeAnswers(stuid, firstname, lastname, totalScore);
    }

    if (errMsg != "") {
        alert(errMsg);
    }

    return result; //if false the information will not be sent to the server

}

// this function counts the number of submission and prevents the user from having more that thre during a session.
function submissionCount() {
    if (sessionStorage.attempt == null) {
        document.getElementById('totalAttempts').innerHTML = "Attempt 1 of 3";

        if (attempts == 1) {
            document.getElementById('totalAttempts').innerHTML = "Attempt 2 of 3";
        }
        if (attempts == 2) {
            document.getElementById('totalAttempts').innerHTML = "Attempt 3 of 3";
        }
        if (attempts >= 3) {
            document.getElementById('totalAttempts').innerHTML = "You are only allowed 3 attempts"
            document.getElementById('submit').disabled = true;
        }
    } else if (attempts == 2) {
        document.getElementById('totalAttempts').innerHTML = "Atempts 3 of 3";
    } else if (attempts == 3) {
        document.getElementById('totalAttempts').innerHTML = "You are only allowed 3 attempts";
        document.getElementById('submit').disabled = true;
    } else if (sessionStorage.attempt == 1) {
        document.getElementById('totalAttempts').innerHTML = "Attempt 2 of 3";
        attempts = 1;
    } else if (sessionStorage.attempt == 2) {
        document.getElementById('totalAttempts').innerHTML = "Attempt 3 of 3";
        attempts = 2;
    } else if (attempts == 3) {
        document.getElementById('totalAttempts').innerHTML = "Atempt 3 of 3";
    }

    if (sessionStorage.attempt == 3) {
        document.getElementById('totalAttempts').innerHTML = "You've had 3 attempt, you have no attempts left.";
        document.getElementById('submit').disabled = true;

    }


}


function storeAnswers(stuid, firstname, lastname, totalScore) {
    //get values and assign them to a sessionStorage attribute.
    sessionStorage.stuid = stuid;
    sessionStorage.firstname = firstname;
    sessionStorage.lastname = lastname;
    sessionStorage.totalScore = totalScore;
    sessionStorage.attempt = attempts;
}
var attempts = 0;

function init() {
    submissionCount();
    var regForm = document.getElementById("form1"); // get ref to the HTML element
    regForm.onsubmit = validate; // register the event listener

}


window.onload = init;