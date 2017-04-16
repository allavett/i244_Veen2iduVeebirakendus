<?php
/**
 * Created by PhpStorm.
 * User: AllarVendla
 * Date: 16.04.2017
 * Time: 23:02
 */

require_once ('./model/function_register.php');

$view = $action = "";


if (!empty($_GET['view'])){
    $view = $_GET['view'];
}
if (!empty($_GET['action'])){
    $action = $_GET['action'];
}

switch ($action) {
    case 'register':
        register();
    break;
}

switch ($view) {
    case 'register':
        include_once ('./view/register.php');
    break;
    default: include_once ('./view/main.html');
}

