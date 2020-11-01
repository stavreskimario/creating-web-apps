/**
 * Author: Mario Stavreski ID: 103055993
 * Target: register.html
 * Purpose: Validate HTML form submission
 */
"use strict";

function validate() {

    var errMsg = ""; // stores the error message
    var result = true; //assumes no errors

    var firstname = document.getElementById("firstname").value;
    var age = document.getElementById("age").value;
    var partySize = document.getElementById("partySize").value;

    if (!firstname.match(/^[a-zA-Z]+$/)) {
        errMsg = errMsg + "Your first name must only contain alpha characters\n"
        result = false;
    }
    if (isNaN(age)) {
        errMsg = errMsg + "Your age must be number\n"
        result = false;
    } else if (age < 18) {
        errMsg = errMsg + "Your age must be 18 or older\n"
        result = false;
    } else if (age >= 10000) {
        errMsg = errMsg + "Your age must be 10000 or younger\n"
        result = false;
    } else {
        var tempMsg = checkSpeciesAge(age);
        if (tempMsg != "") {
            errMsg += errMsg + tempMsg;
            result = false;
        };
    }
    if (isNaN(partySize)) {
        errMsg = errMsg + "Number of travellers must be number\n"
        result = false;
    } else if (partySize < 1) {
        errMsg = errMsg + "Number of travellers more than 1\n"
        result = false;
    } else if (partySize >= 100) {
        errMsg = errMsg + "Number of travellers must be 100 or less\n"
        result = false;
    }
    if (document.getElementById("food").value == "none") {
        errMsg = errMsg + "Your must select a food preference";
        result = false;
    }

    var is1day = document.getElementById("1day").checked;
    var is4day = document.getElementById("4day").checked;
    var is10day = document.getElementById("10day").checked;
    if (!(is1day || is4day || is10day)) {
        errMsg += "Please select at least one trip.\n";
        result = false;
    }

    var human = document.getElementById("human").checked;
    var dwarf = document.getElementById("dwarf").checked;
    var elf = document.getElementById("elf").checked;
    var hobbit = document.getElementById("hobbit").checked;
    if (!(human || dwarf || elf || hobbit)) {
        errMsg += "Please select at least one species.\n";
        result = false;
    }

    if (result) {
        storeBooking(firstname, lastname, age, species, is1day, is4day, is10day)
    }

    if (errMsg != "") {
        alert(errMsg);
    }
    return result; //if false the information will not be sent to the server

}

function getSpecies() {
    var speciesName = "Unknown";
    var speciesArray = document.getElementById("species").getElementsByTagName("input");
    for (var i = 0; i < speciesArray.length; i++) {
        if (speciesArray[i].checked)
            speciesName = speciesArray[i].value;

    }
    return speciesName;
}

function getBeard() {
    var beardLength = document.getElementById("beard").value;
    return beardLength;
}

function checkSpeciesAge(age) {
    var errMsg = "";
    var species = getSpecies();
    var beard = getBeard();
    switch (species) {
        case "Human":
            if (age > 120) {
                errMsg = "You cannot be a Human and over 120.\n";
            }
            break
        case "Dwarf":
            if (age > 30 && beard <= 11) {
                errMsg = "You cannot be a " + species + " and have a beard less than 12 inches. \n";
            }
            break
        case "Hobbit":
            if (age > 150) {
                errMsg = "You cannot be a " + species + " and over 150. \n";
            } else if (beard >= 1) {
                errMsg = "You cannot be a " + species + " and have a beard. \n";
            }
            break
        case "Elf":
            if (beard >= 1) {
                errMsg = "You cannot be an " + species + " and have a beard. \n";
            }
            break
        default:
            errMsg = "We don't allow your kind on our tours.\n";
    }
    return errMsg;
}

function storeBooking(firstname, lastname, age, species, is1day, is4day, is10day) {
    //get values and assign them to a sessionStorage attribute.
    //we use the same name for the attribute and th eelement id to avoid confusion
    var trip = "";
    if (is1day) trip = "1day";
    if (is4day) trp += ", 4day";
    if (is10day) trip += ", 10day";
    sessionStorage.trip = trip;
    sessionStorage.firstname = firstname;

    //add other elements here
    sessionStorage.lastname = lastname;
    sessionStorage.age = age;
    sessionStorage.species = species;
    alert("Trip stored: " + sessionStorage.firstname); //added for testing
}

function init() {
    var regForm = document.getElementById("regform"); // get ref to the HTML element
    regForm.onsubmit = validate; // register the event listener
}

window.onload = init;