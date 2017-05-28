/**
 * Created by AllarVendla on 27.02.2017.
 */
var formInputFields, submitButton, usernameFilled, passwordFilled, emailFilled, areaFilled, condoFilled, apartmentFilled;

formInputFields = ["username", "password", "confirm-password", "email", "area", "condo", "apartment", "register-button"];
usernameFilled = false;
passwordFilled = false;
emailFilled = false;
areaFilled = false;
condoFilled = false;
apartmentFilled = false;

window.document.addEventListener("DOMContentLoaded", function () {
    responsiveCondoSelect();
    submitButton = document.getElementById("register-button");

    checkInput(submitButton); // Disable register button when page is loaded
    formInputFields.forEach(function (inputFieldId) {
        var inputField;
        inputField = document.getElementById(inputFieldId);
        if (inputField.id !== "register-button"){
            inputField.setAttribute("class", "field-incorrect");
        }
        inputField.addEventListener("change", function(){
            checkInput(inputField);
            responsiveCondoSelect();
        });
        if (inputField.id !== "area" || inputField.id !== "condo" || inputField.id !== "apartment") {
            inputField.addEventListener("click", function(){
                checkInput(inputField)
            });
            inputField.addEventListener("keyup", function(){
                checkInput(inputField)
            });
        }
    })
});

function checkInput(inputField){
    switch (inputField.id) {
        case "username":
            usernameFilled = checkLength();
            break;
        case "password":
            checkLength();
            break;
        case "confirm-password":
            passwordFilled = checkLength();
            break;
        case "email":
            emailFilled = checkLength();
            break;
        case "area":
            areaFilled = checkValue();
            break;
        case "condo":
            condoFilled = checkValue();
            break;
        case "apartment":
            apartmentFilled = checkValue();
            break;
        case "register-button":
            /*alert("Ju stupiido!");
            event.preventDefault();*/
            break;
        default: console.log("Something went blaa");
    }
    function checkLength() {
        if (inputField.value.length < 6){
            inputField.setAttribute("class", "field-incorrect");
            return false;
        } else {
            inputField.setAttribute("class", "field-correct");
            return true;
        }
    }
    function checkValue() {
        if (inputField.value === "0"){
            inputField.setAttribute("class", "field-incorrect");
            return false;
        } else {
            inputField.setAttribute("class", "field-correct");
            return inputField.value;
        }
    }
    submitButton.disabled = !(usernameFilled && passwordFilled && emailFilled && condoFilled && areaFilled && apartmentFilled);
}

function responsiveCondoSelect() {
    var area, condo, apartment;
    area = document.getElementById("area");
    condo = document.getElementById("condo");
    apartment = document.getElementById("apartment");
    // Disable/enable condo and apartment select
    condo.disabled = !areaFilled;
    apartment.disabled = !condoFilled;

    if (condos){
        // Fill condos selection with correct values and disable apartments
        if (areaFilled) {
            if (document.activeElement == area) {
                // remove all options from condo and apartment
                removeOptions(condo);
                condoFilled = false;
                removeOptions(apartment);
                apartmentFilled = false;
                condos.forEach(function (item) {
                    if (item["county"].toLowerCase() == areaFilled) {
                        var newCondoOption = new Option(item["name"], item["id"]);
                        condo.options.add(newCondoOption);
                    }
                })
            }
        } else {
            condo.disabled = true;
            apartment.disabled = true;
            removeOptions(condo);
            removeOptions(apartment);
            condoFilled = false;
            apartmentFilled = false;
        }
        if (condoFilled && document.activeElement == condo) {
            // remove all options from apartment
            removeOptions(apartment);
            apartmentFilled = false;
            condos.forEach( function (item) {
                if (item["id"] == condoFilled){
                    for (i = 1; i <= item["numberofapartments"]; i++){
                        var newapArtmentOption = new Option(i, item["id"]);
                        apartment.options.add(newapArtmentOption);
                    }
                }
            })
        }
    }

    //Function for removing items from selection
    function removeOptions(selectItem){
        while (selectItem.options.length - 1) {
            selectItem.remove(1);
        }
        selectItem.setAttribute("class", "field-incorrect");
    }
}