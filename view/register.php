<script>
    var condos = <?php echo json_encode($condos); ?>;
</script>
<script src="assets/script/register.js"></script>

<h1>Registreeri uus kasutaja.</h1>

<div class="register-form">
    <form action="index.php?view=register&action=register" method="POST">
        <table>
            <tr>
                <td colspan="3"><?php echo isset($registerErrors["general"]) ? "Viga: ".$registerErrors["general"] : ""; ?></td>
            </tr>
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
            <tr>
                <td><label for="area">Piirkond:</label></td>
                <td><select id="area" class="select-option" name="area">
                        <?php
                        if (!isset($area)) {
                            echo "<option value=\"" . 0 . "\" selected>Vali..</option>";
                        } else {
                            echo "<option value=\"" . 0 . "\">Vali..</option>";
                        }
                        foreach (array_unique(array_column($condos, "county")) as $areaName) {
                            if (isset($area) && $area == $areaName) {
                                echo "<option value=\"".$areaName."\" selected>".$areaName."</option>";
                            } else {
                                echo "<option value=\"".$areaName."\">".$areaName."</option>";
                            }
                        }
                        ?>
                </select></td>
                <td><?php if (isset($registerErrors["area"])) {echo $registerErrors["area"];} ?></td>
            </tr>
            <tr>
                <td><label for="condo">Korteriühistu:</label></td>
                <td><select id="condo" class="select-option" name="condo">
                    <?php
                    if (!isset($condo)) {
                        echo "<option value=\"" . 0 . "\" selected>Vali..</option>";
                    } else {
                        echo "<option value=\"" . 0 . "\">Vali..</option>";
                    }
                    foreach ($condos as $condoItem) {
                        if (isset($condo) && $condo == strtolower($condoItem["id"])) {
                            echo "<option value=\"".$condoItem["id"]."\" selected>".$condoItem["name"]."</option>";
                        } else {
                            echo "<option value=\"".$condoItem["id"]."\">".$condoItem["name"]."</option>";
                        }
                    }
                    ?>
                </select></td>
                <td><?php if (isset($registerErrors["condo"])) {echo $registerErrors["condo"];} ?></td>
            </tr>
            <tr>
                <td><label for="apartment">Korter:</label></td>
                <td><select id="apartment" class="select-option" name="apartment">
                        <?php
                        //echo "apartment = ".$apartment;
                        for ($i = 0; $i <= max(array_column($condos, "numberofapartments")); $i++) {
                            if ($i == 0 && !isset($apartment)){
                                echo "<option value=\"".$i."\" selected>Vali..</option>";
                            } elseif ($i== 0) {
                                echo "<option value=\"" . $i . "\">Vali..</option>";
                            } elseif ($i > 0) {
                                if (isset($apartment) && $apartment == $i) {
                                    echo "<option value=\"".$i."\" selected>".$i."</option>";
                                } else {
                                    echo "<option value=\"".$i."\">".$i."</option>";
                                }
                            }
                        }
                        ?>
                    </select></td>
                <td><?php if (isset($registerErrors["apartment"])) {echo $registerErrors["apartment"];} ?></td>
            </tr>
            <tr>
                <td colspan="3"><input id="register-button" class="button" type="submit" name="register" value="Registreeri"></td>
            </tr>

        </table>
    </form>
</div>