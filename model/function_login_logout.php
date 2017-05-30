<?php
/**
 * Created by PhpStorm.
 * User: Allar
 * Date: 24.04.2017
 * Time: 0:12
 */

function login() {
    global $loginError, $username, $password, $userId;
    $loginError = $username = $password =  $userId = "";
    if (isset($_POST["login"])) {
        if (!empty($_POST["username"]) && !empty($_POST["password"])){
            $username = check_input($_POST["username"]);
            $password = check_input($_POST["password"]);
            userLogin();
            if (empty($loginError)) {
                $_SESSION["id"] = $userId;
                header("Location: .");
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