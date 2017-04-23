<?php
/**
 * Created by PhpStorm.
 * User: Allar
 * Date: 24.04.2017
 * Time: 0:13
 */

function startSession() {
    session_set_cookie_params(5*60);
    session_start();
}

function endSession() {
    $_SESSION = array();
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), "", time()-24*60*60);
    }
    session_destroy();
}