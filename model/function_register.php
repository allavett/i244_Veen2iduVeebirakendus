<?php
/**
 * Created by PhpStorm.
 * User: Allar
 * Date: 02.04.2017
 * Time: 23:20
 */


function register(){
    global $registerErrors, $username, $email, $area, $condo;
    $registerErrors = $username = $password = $passwordConfirm = $email = $area = $condo = "";
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
                }
            } else {
                $registerErrors[$key] = "Väli täitmata!";
            }
        }
    } else {
        header("Location: ./index.php?view=register");
    }
}

function check_input($input) {
    if (!empty($input)) {
        //echo "algne ".$input. "<br>";
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        //echo "uus ". $input. "<br>";
        return $input;
    }
}