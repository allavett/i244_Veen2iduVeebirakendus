/**
 * Created by AllarVendla on 27.02.2017.
 */
var formInputFields, submitButton, usernameFilled, passwordFilled, emailFilled, areaFilled, condoFilled;

formInputFields = ["username", "password", "confirm-password", "email", "area", "condo", "register-button"];
usernameFilled = false;
passwordFilled = false;
emailFilled = false;
condoFilled = false;
areaFilled = false;

window.document.addEventListener("DOMContentLoaded", function () {
    submitButton = document.getElementById("register-button");
    formInputFields.forEach(function (inputFieldId) {
        var inputField;
        console.log(inputField);
        inputField = document.getElementById(inputFieldId);

        inputField.addEventListener("click", function(){
            checkInput(inputField)
        });
        if (inputField.id !== "register-button") {
            inputField.addEventListener("change", function(){
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
        case "register-button":
            /*alert("Ju stupiido!");
            event.preventDefault();*/
            break;
        default: console.log("blaa");
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
            return true;
        }
    }
    submitButton.disabled = !(usernameFilled && passwordFilled && emailFilled && condoFilled && areaFilled);
    /*
    if (usernameFilled && passwordFilled && emailFilled && condoFilled && areaFilled) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
    */
}