/* Filename: results.js
   Target html: quiz.html
   Purpose : 
   Author: Mario Stavreski ID: 103055993
   Date written: 20/09/2001
   Revisions:  v1.0
*/

"use strict";

function getResults() {

    var attemptsRemaining = 3 - Number(sessionStorage.attempt); // calculates number of attempts the user has left

    //this part of the function gets the all the required data from quiz.html and displays it.
    document.getElementById("fullname").textContent = sessionStorage.firstname + " " + sessionStorage.lastname;
    document.getElementById("studentid").textContent = sessionStorage.stuid;
    document.getElementById("studentScore").textContent = sessionStorage.totalScore;
    document.getElementById("attempt").textContent = Number(sessionStorage.attempt);

    if (attemptsRemaining == 0) { // displays error message if the user has had three attempts at the quiz
        document.getElementById("error").innerHTML = "You have no attempts left";
    }

}

function init() {
    getResults;
}

window.onload = getResults;