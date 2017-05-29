<?php
/**
 * Created by PhpStorm.
 * User: Allar
 * Date: 02.04.2017
 * Time: 23:20
 */


function register(){
    global $registerErrors, $username, $password, $email, $area, $condo, $apartment;
    $registerErrors = $username = $password = $passwordConfirm = $email = $area = $condo = $apartment = "";
    $registerErrors = array();
    if (isset($_POST["register"])) {
        foreach ($_POST as $key => $value) {
            if (!empty($value)) {
                switch ($key) {
                    case "username":
                        $username = check_input($value);
                        break;
                    case "password":
                        $password = check_input($value);
                        break;
                    case "passwordConfirm":
                        $passwordConfirm = check_input($value);
                        break;
                    case "email":
                        $email = check_input($value);
                        break;
                    case "area":
                        $area = check_input($value);
                        break;
                    case "condo":
                        $condo = check_input($value);
                        break;
                    case "apartment":
                        $apartment = check_input($value);
                        break;
                }
            } else {
                $registerErrors[$key] = "Väli täitmata!";
            }
        }
        checkPostedCondoInformation();
        checkPostedUser();
    } else {
        header("Location: ./index.php?view=register");
    }
    // Kui andmed on olemas ja andmed on korrektsed - vigu ei ole - siis registreeri kasutaja (kirje andmebaasi) ja
    // suuna Login lehele.
    if (empty($registerErrors)){
        registerUser();
        header("Location: ./index.php?view=login&action=registered");
    }
}

function check_input($input) {
    if (!empty($input)) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }
}

