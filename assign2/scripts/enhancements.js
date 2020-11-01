/* Filename: quiz.js
   Target html: quiz.html
   Purpose : 
   Author: Mario Stavreski ID: 103055993
   Date written: 20/09/2001
   Revisions:  v1.0
*/

"use strict";

function countdown() {
    var time = 179; //Time in seconds for the countdown
    setInterval(function() {
        var minutes = Math.floor(time / 60); //Calculates minutes
        var seconds = time % 60; //Calculates seconds
        document.getElementById("timer").textContent = "You have " + minutes + ":" + seconds + " left to finish your quiz";
        time--;
        if (time <= 0) { //If time is up
            clearStorage() //Then run clearStorage function 
        }
    }, 1000); //Function updates every second
}

function clearStorage() {
    sessionStorage.clear();
    location.href = "index.html";
}

function enhancements_init() {
    countdown();
}

window.addEventListener("load", enhancements_init);