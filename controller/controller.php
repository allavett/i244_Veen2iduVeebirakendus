<?php
/**
 * Created by PhpStorm.
 * User: AllarVendla
 * Date: 16.04.2017
 * Time: 23:02
 */

require_once ('./model/function_register.php');
require_once ('./model/function_login_logout.php');
require_once ('./model/function_session.php');
require_once ('./model/function_database.php');

$view = $action = "";


if (!empty($_GET['view'])){
    $view = $_GET['view'];
}
if (!empty($_GET['action'])){
    $action = $_GET['action'];
}
startSession();

switch ($action) {
    case 'register':
        register();
        break;
    case 'login':
        login();
        break;
    case 'logout':
        logout();
        break;
}

// Load Page
include_once('./view/head.php');
echo '<div id="content">';

switch ($view) {
    case 'register':
        include_once ('./view/register.php');
        break;
    case 'login':
        include_once ('./view/login.php');
        break;
    default: include_once ('./view/main.html');
}

echo '</div>';
include_once('./view/foot.html');