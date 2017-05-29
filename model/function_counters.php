<?php
/**
 * Created by PhpStorm.
 * User: Allar
 * Date: 30.05.2017
 * Time: 1:07
 */
function submitCounter() {
    global $submitCounterError, $counter, $userId;
    $submitCounterError = $counter = $userId = "";
    if (isset($_POST["submitCounter"])) {
        if (!empty($_POST["counter"]) && !empty($_SESSION["id"])){
            $counter = check_input($_POST["counter"]);
            $userId = check_input($_SESSION["id"]);
            insertNewCounter();
            if (empty($submitCounterError)) {
                header("Location: ./index.php?view=counters&action=counterSubmitted");
            }
        } else {
            $submitCounterError = "Midagi läks valesti (näit sisestamata?)";
        }
    }
}

function getOldCounter() {
    global $userId;
    $userId = check_input($_SESSION["id"]);
    selectOldCounter();
}