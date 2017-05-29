<h1>Näidud</h1>

<div class="submitCounter-form">
    <form action="index.php?view=counters&action=submitCounter" method="POST">
        <table>
            <tr>
                <td><label for="counterOld">Eelmine näit:</label>
                <td><p><?php if (isset($oldCounter)) {echo $oldCounter;} else {echo "0";} ?></p></td>
                <td><?php if (isset($getOldCounterError)) {echo  $getOldCounterError;} elseif (isset($counterDate)) {echo $counterDate;
                    }else {echo "-";} ?></td>
            </tr>
            <tr>
                <td><label for="counter">Uus näit:</label>
                <td><input id="counter" name="counter" type="number" placeholder="Sisesta värske näit"></td>
                <td><?php if (isset($submitCounterError)) {echo $submitCounterError;} ?></td>
            </tr>
            <tr>
                <td colspan="3"><input id="submtiCounter-button" class="button" type="submit" name="submitCounter" value="Saada"></td>
            </tr>
        </table>
    </form>
</div>