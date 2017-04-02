<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>IT Kolledž - i244: Allar Vendla - Veenäidu teatamise (veebi)rakendus</title>
    <link rel="stylesheet" type="text/css" href="assets/style/style.css"/>
    <script src="assets/script/timer.js"></script>
</head>
<body>

<?php
include_once('view/head.html');

echo '<div id="content">';

if(!empty($_GET['view'])){
    switch ($_GET['view']) {
        case 'register': include ('view/register.html');
        break;
        default: include ('view/main.html');
    }
} else {
    include ('view/main.html');
}
echo '</div>';
include_once('view/foot.html');
?>
</body>
</html>