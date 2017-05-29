<?php
if (!empty($_GET["action"]) && $_GET["action"] == "registered") {
    echo "<p>Kasutaja registreeritud!</p>";
}
?>
<h1>Logi sisse:</h1>

<div class="login-form">
    <form action="index.php?view=login&action=login" method="POST">
        <table>
            <tr>
                <td><label for="username">Kasutaja:</label></td>
                <td><input id="username" name="username" type="text" placeholder="Sisesta kasutajanimi"
                           value="<?php echo isset($username) ? $username : ""; ?>"></td>
                <td><?php if (isset($loginError)) {echo $loginError;} ?></td>
            </tr>
            <tr>
                <td><label for="password">Parool:</label>
                <td><input id="password" name="password" type="password" placeholder="Sisesta parool"></td>
                <td><?php if (isset($loginError)) {echo $loginError;} ?></td>
            </tr>
            <tr>
                <td colspan="3"><input id="login-button" class="button" type="submit" name="login" value="Logi sisse"></td>
            </tr>

        </table>
    </form>
</div>