/*
 * Author: Mario Stavreski; ID: 103055993
 * Target: clickme.html
 * Purpose: click button
 * Created: 08/09/2020
 * Last updated: 09/09/2020
 * Credits:
 */
//test comment
"use strict";

function promptName() {
    var sName = prompt("Enter your name.\nThis prompt should show up whn the \nClick Me button is clicked.", "Your name ");
    alert("Hi there " + sName + ". Alert boxes are a quick way to check the state \nof your variables when you are developing code.");
    rewriteParagraph(sName);
}

function rewriteParagraph(userName) {
    var message = document.getElementById("message");
    message.innerHTML = "Hi, " + userName + ". If you can see this you have successfully overwritten the contents of this paragraph. Cognratulations!!";
}

function writenewMessage() {
    var x = document.getElementById("span").textContent = 'You have now finished Task 1';
    document.getElementById("span").innerHTML = x;
}

function init() {
    var clickMe = document.getElementById('clickme');
    clickMe.onclick = promptName;
    var hClick = document.getElementById("h1");
    hClick.onclick = writenewMessage;
}

window.onload = init;