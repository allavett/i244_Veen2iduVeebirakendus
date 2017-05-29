<link rel="stylesheet" type="text/css" href="assets/style/style.css"/>
<script src="assets/script/timer.js"></script>

<div id="header">
    <h1 id="title">Veenäidu teatamise rakendus</h1>
    <div id="menu">
        <ul>
            <li><a href="index.php">Avaleht</a></li>
            <li><?php echo isset($_SESSION["id"]) ? '<a href="index.php?view=counters">Näidud</a>' :
                    '<a href="index.php?view=register">Registreeri</a>';?></li></li>
            <li><?php echo isset($_SESSION["id"]) ? '<a href="index.php?action=logout">Logi välja</a>' :
                    '<a href="index.php?view=login">Logi sisse</a>';?></li>
        </ul>
    </div>
    <div id="date">
        Tänane kuupäev: <span id="current-date"></span>.
        <br>
        Näidu teatamiseni jäänud: <span id="days-remaining"></span>.
    </div>
</div>