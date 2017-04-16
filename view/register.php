<link rel="stylesheet" type="text/css" href="assets/style/style.css"/>
<!--script src="assets/script/register.js"></script-->

<h1>Registreeri uus kasutaja.</h1>

<div class="register-form">
    <form action="index.php?view=register&action=register" method="POST">
        <table>
            <tr>
                <td><label for="username">Kasutaja:</label></td>
                <td><input id="username" name="username" type="text" placeholder="Sisesta kasutajanimi"
                           value="<?php echo isset($username) ? $username : ""; ?>"></td>
                <td><?php if (isset($registerErrors["username"])) {echo $registerErrors["username"];} ?></td>
            </tr>
            <tr>
                <td><label for="password">Parool:</label>
                <td><input id="password" name="password" type="password" placeholder="Sisesta parool"></td>
                <td><?php if (isset($registerErrors["password"])) {echo $registerErrors["password"];} ?></td>
            </tr>
            <tr>
                <td><label for="confirm-password">Kinnita parool:</label></td>
                <td><input id="confirm-password" name="passwordConfirm" type="password" placeholder="Kinnita parool"></td>
                <td><?php if (isset($registerErrors["passwordConfirm"])) {echo $registerErrors["passwordConfirm"];} ?></td>
            </tr>
            <tr>
                <td><label for="email">E-mail:</label></td>
                <td><input id="email" name="email" type="email" placeholder="Sisesta e-mail"
                           value="<?php echo isset($email) ? $email : ""; ?>"></td>
                <td><?php if (isset($registerErrors["email"])) {echo $registerErrors["email"];} ?></td>
            </tr>
            <!--
           Järgnev valik peaks sõltuma eelnevast.. Javascript/PHP - ilmselt natukene mõlemat.
           -->
            <tr>
                <td><label for="area">Piirkond:</label></td>
                <td><select id="area" class="select-option" name="area">
                    <option value="0" selected>Vali..</option>
                    <option value="1">Tartu</option>
                    <option value="2">Tallinn</option>
                    <option value="3">Võru</option>
                </select></td>
                <td><?php if (isset($registerErrors["area"])) {echo $registerErrors["area"];} ?></td>
            </tr>
            <tr>
                <td><label for="condo">Korteriühistu:</label></td>
                <td><select id="condo" class="select-option" name="condo">
                    <option value="0" selected>Vali..</option>
                    <option value="1">Sinilille</option>
                    <option value="2">Varblase</option>
                    <option value="3">Kanarbiku</option>
                </select></td>
                <td><?php if (isset($registerErrors["condo"])) {echo $registerErrors["condo"];} ?></td>
            </tr>
            <tr>
                <td colspan="2"><input id="register-button" type="submit" name="register" value="Registreeri"> <!--disabled--></td>
            </tr>

        </table>
    </form>
</div>