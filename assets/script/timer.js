/**
 * Created by AllarVendla on 12.02.2017.
 */

var date, lastDayOfTheMonth, interval;
interval = 0;
date = new Date;
window.document.addEventListener("DOMContentLoaded", function () {
    var currentDateElement = document.getElementById("current-date");
    var daysRemainingElement = document.getElementById("days-remaining");
    setInterval(function(){updateTime(currentDateElement, daysRemainingElement)}, interval);
    interval = 1000;
});

function updateTime(dateElement, daysRemainingElement) {
    date.setTime(Date.now());
    dateElement.innerHTML = date.toLocaleString('et-ET', {day: "numeric" ,month: 'long', year: 'numeric'});
    daysRemainingElement.innerHTML = daysRemainingToLastDayOfTheMonth();
}

function daysRemainingToLastDayOfTheMonth(){
    var daysLeft, hoursLeft, minutesLeft, secondsLeft, daysPlural, hoursPlural, minutesPlural, secondsPlural;
    lastDayOfTheMonth = (lastDayOfTheMonth == undefined || lastDayOfTheMonth <= date) ? new Date(date.getFullYear(),
            date.getMonth() + 1, 0) : lastDayOfTheMonth;
    daysLeft = lastDayOfTheMonth.getDate() - date.getDate();
    hoursLeft = Math.abs(date.getHours() - 23);
    minutesLeft = Math.abs(date.getMinutes() - 59);
    secondsLeft = Math.abs(date.getSeconds() - 59);
    daysPlural = (daysLeft > 1) ? " päeva" : " päev";
    hoursPlural = (hoursLeft !== 1) ? " tundi": " tund";
    minutesPlural = (minutesLeft > 1) ? " minutit" : " minut";
    secondsPlural = (secondsLeft > 1) ? " sekundit" : " sekund";
    if (daysLeft > 0) {return daysLeft + daysPlural + " ja " + hoursLeft + hoursPlural}
    else if (hoursLeft > 0) {return hoursLeft + hoursPlural + " ja " + minutesLeft + minutesPlural}
    else if (minutesLeft > 0) {return minutesLeft + minutesPlural + " ja " + secondsLeft + secondsPlural}
    else {"Aeg näidu teatamiseks!"} // <-- Hetkel ei tohiks siia jõuda, kuna algab uus kuu ja siis arvutatakse kuulõpp uuesti
}