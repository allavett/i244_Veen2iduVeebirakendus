<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/serial.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/themes/light.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="assets/script/chart.js" type="text/javascript"></script>
<script>var chartData = <?php echo isset($counters) ? $counters : "" ; ?></script>

<h1>Näidud</h1>

<!-- Chart -->
<div id="chartdiv"></div>

<div class="submitCounter-form">
    <form action="index.php?view=counters&action=submitCounter" method="POST">
        <table>
            <tr>
                <td><label for="counterOld">Viimati sisestatud kogus:</label>
                <td><p><?php if (isset($oldCounter)) {echo $oldCounter;} else {echo "0";} ?></p></td>
                <td><?php if (isset($selectOldCountersError)) {echo  $selectOldCountersError;} elseif (isset($counterDate)) {echo $counterDate;
                    }else {echo "-";} ?></td>
            </tr>
            <tr>
                <td><label for="counter">Tarbitud kogus:</label>
                <td><input id="counter" name="counter" type="number" placeholder="Sisesta tarbitud kogus"></td>
                <td><?php if (isset($submitCounterError)) {echo $submitCounterError;} ?></td>
            </tr>
            <tr>
                <td colspan="3"><input id="submtiCounter-button" class="button" type="submit" name="submitCounter" value="Saada"></td>
            </tr>
        </table>
    </form>
</div>