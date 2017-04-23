<?php
/**
 * Created by PhpStorm.
 * User: Allar
 * Date: 24.04.2017
 * Time: 0:12
 */

function login() {
    global $loginError, $username;
    $loginError = $username = $password = "";
    if (isset($_POST["login"])) {
        if (!empty($_POST["username"]) && !empty($_POST["password"])){
            $username = check_input($_POST["username"]);
            $password = check_input($_POST["password"]);
            if ($username == "kasutaja" && $password == "parool") {
                $_SESSION["user"] = $username;
                header("Location: ./index.php");
            } else {
                $loginError = "Kasutajanimi või parool on vale!";
            }
        } else {
            $loginError = "Mõlemad väljad peavad olema täidetud";
        }
    }
}

function logout() {
    endSession();
    startSession();
}