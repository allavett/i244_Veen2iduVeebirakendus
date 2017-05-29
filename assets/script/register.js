/**
 * Created by AllarVendla on 27.02.2017.
 */
var formInputFields, submitButton, usernameFilled, passwordFilled, passwordConfirmFilled, emailFilled, areaFilled, condoFilled, apartmentFilled;

formInputFields = ["username", "password", "confirm-password", "email", "area", "condo", "apartment", "register-button"];
usernameFilled = false;
passwordFilled = false;
passwordConfirmFilled = false;
emailFilled = false;
areaFilled = false;
condoFilled = false;
apartmentFilled = false;

window.document.addEventListener("DOMContentLoaded", function () {

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
            // Only allow for certain chars to be inserted
            inputField.onkeypress = function(e){
                var pressedKey = String.fromCharCode(e.which);
                if (!pressedKey.match(/[A-Za-z0-9@+\-_.]/)) {
                    return false;
                }

            }
            inputField.addEventListener("click", function(){
                checkInput(inputField)
            });
            inputField.addEventListener("keyup", function(){
                checkInput(inputField)
            });
        }
        checkInput(inputField); //Check input fields on refresh
    })
    responsiveCondoSelect();
});

function checkInput(inputField){
    switch (inputField.id) {
        case "username":
            usernameFilled = checkLength();
            break;
        case "password":
            passwordFilled = checkLength();
            document.getElementById("confirm-password").setAttribute("class", "field-incorrect");
            document.getElementById("confirm-password").value = "";
            passwordConfirmFilled = false;
            break;
        case "confirm-password":
            passwordConfirmFilled = checkLength();
            break;
        case "email":
            emailFilled = checkLength();
            break;
        case "area":
            areaFilled = checkSelection();
            break;
        case "condo":
            condoFilled = checkSelection();
            break;
        case "apartment":
            apartmentFilled = checkSelection();
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
            return checkValue();
        }
    }
    function checkValue() {
        switch (inputField.id) {
            case "username":
                var usernameForbiddenChars = /[!@#$%^&*()\=\[\]{};'`´:."\\|,<>\/?\s~]/;
                if (usernameForbiddenChars.test(inputField.value)){
                    inputField.setAttribute("class", "field-incorrect");
                    return false;
                } else {
                    inputField.setAttribute("class", "field-correct");
                    return inputField.value;
                }
                break;
            case "email":
                var emailForbiddenChars = /[!#$%^&*()\=\[\]{};'`´:"\\|,<>\/?\s~]/;
                var emailValid = /\S+@\S+\.\S+/;
                if (emailForbiddenChars.test(inputField.value) || !emailValid.test(inputField.value)){
                    inputField.setAttribute("class", "field-incorrect");
                    return false;
                } else {
                    inputField.setAttribute("class", "field-correct");
                    return inputField.value;
                }
                break;
            case "confirm-password":
                passwordConfirmFilled = inputField.value;
                if (passwordFilled === passwordConfirmFilled){
                    inputField.setAttribute("class", "field-correct");
                    return inputField.value;
                } else {
                    inputField.setAttribute("class", "field-incorrect");
                    return false;
                }
            default:
                inputField.setAttribute("class", "field-correct");
                return inputField.value;
        }

    }
    function checkSelection() {
        if (inputField.value === "0"){
            inputField.setAttribute("class", "field-incorrect");
            return false;
        } else {
            inputField.setAttribute("class", "field-correct");
            return inputField.value;
        }
    }
    submitButton.disabled = !(usernameFilled && passwordConfirmFilled && emailFilled && condoFilled && areaFilled && apartmentFilled);
}

// Function to make Condo selection responsive
function responsiveCondoSelect() {
    var area, condo, apartment;
    area = document.getElementById("area");
    condo = document.getElementById("condo");
    apartment = document.getElementById("apartment");
    // Disable/enable condo and apartment select
    condo.disabled = !areaFilled;
    apartment.disabled = !condoFilled;

    if (condos){
        // Pean kontrollima ühistuid, mille piirkond klapib valitud piirkonnaga, kui ei klapi, siis eemaldan valiku.
        // Fill condos selection with correct values and disable apartments

        if (areaFilled) {
            // Eemaldab üleliigsed valikud
            for (i = condo.options.length -1 ; i > 0; i--){
                var optionPresent = false;
                var option = condo.options.item(i);
                condos.forEach(function (item) {
                    if (item["county"] === areaFilled && item["id"] === parseInt(option.value)){
                        optionPresent = true;
                    }
                });
                if (optionPresent === false){
                    option.remove();
                    setIncorrect(condo);
                }
            }

            // Lisab puuduolevad
            condos.forEach(function (item) {
                if (item["county"] === areaFilled) {
                    var optionNeeded = true;
                    // Siin käin kõik optionid üle ja kontrollin, kas on sellise IDga olemas. Kui ei ole, lisan
                    for (i = 0; i < condo.options.length; i++){
                        var option =  condo.options.item(i);
                        if (item["id"] === parseInt(option.value)){
                            optionNeeded = false;
                        } else {
                            optionNeeded = optionNeeded * true;
                        }
                    }
                    if (optionNeeded){
                        var newCondoOption = new Option(item["name"], item["id"]);
                        condo.options.add(newCondoOption);
                        condoFilled = setIncorrect(condo);
                    }
                }
            });

        } else {
            condo.disabled = true;
            apartment.disabled = true;
            condoFilled = removeOptions(condo);
            apartmentFilled = removeOptions(apartment);
        }
        if (condoFilled) {
            condos.forEach( function (item) {
                if (item["id"] === parseInt(condoFilled)){
                    var apartmentOptionsCount = apartment.options.length;
                    var numberOfApartments = item["numberofapartments"];
                    if (apartmentOptionsCount > numberOfApartments) {
                        for (i = apartmentOptionsCount - 1; i > numberOfApartments; i--){
                            apartment.options.item(i).remove();
                            setIncorrect(apartment);
                        }
                    } else if (apartmentOptionsCount < numberOfApartments) {
                        for (i = apartmentOptionsCount; i <= numberOfApartments; i++) {
                            var newApartment = new Option(i, i);
                            apartment.options.add(newApartment);
                            setIncorrect(apartment);
                        }
                    }
                }
            });
        } else {
            apartmentFilled = removeOptions(apartment);
        }
    }
    function setIncorrect(selectItem) {
        if (parseInt(selectItem.value) === 0) {
            condo.setAttribute("class", "field-incorrect")
        }
        return false;
    }
    //Function for removing items from selection
    function removeOptions(selectItem){
        while (selectItem.options.length - 1) {
            selectItem.remove(1);
        }
        selectItem.setAttribute("class", "field-incorrect");
        return false;
    }
}