<?php
/**
 * Created by PhpStorm.
 * User: AllarVendla
 * Date: 07.05.2017
 * Time: 23:13
 */

function connect() {
    global $connection;
    $host="localhost";
    $user="root";
    $pass="";
    $db="test";
    $connection = new mysqli($host, $user, $pass, $db) or die("Ei saa andmebaasiga ühendust");
    mysqli_query($connection, "SET CHARACTER SET UTF8");
}

function getCondos() {
    connect();
    global $connection, $condos;
    $condos = array();
    if ($statement = $connection->prepare("SELECT c.id ,c.name, c.county, c.numberofapartments FROM test.`10162970_condos` c")) {
        $statement->execute();
        $queryResult = $statement->get_result();
        while ($condo = mysqli_fetch_assoc($queryResult)){
            $condos[] = $condo;
        }
        $statement->close();
    }
    $connection->close();

}

function checkPostedCondoInformation() {
    connect();
    global $connection, $area, $condo, $apartment, $condoId, $registerErrors;
    if ($statement = $connection->prepare("SELECT c.id, c.numberofapartments FROM test.`10162970_condos` c WHERE c.county = ? AND c.name = ?")){
        $statement->bind_param("ss", $area, $condo);
        $statement->execute();
        $queryResult = $statement->get_result();
        while ($condoQuery = mysqli_fetch_assoc($queryResult)){
            if ($apartment > 0 && $apartment <= check_input($condoQuery["numberofapartments"])){
                $condoId = check_input($condoQuery["id"]);
            } else {
                $registerErrors["apartment"] = "Sellist korterit valitud majas ei ole!";
            }
        }
        $statement->close();
    }
    $connection->close();
}

function checkPostedUser() {
    connect();
    global $connection, $username, $registerErrors;
    if ($statement = $connection->prepare("SELECT u.username FROM test.`10162970_users` u WHERE u.username = ?")){
        $statement->bind_param("s", $username);
        $statement->execute();
        $queryResult = $statement->get_result();
        $userQuery = mysqli_fetch_assoc($queryResult);
        if (!empty($userQuery["username"])){
            $registerErrors["username"] = "Selle nimega kasutaja on juba olemas!";
        }
        $statement->close();
    }
    $connection->close();
}

function registerUser() {
    connect();
    global $connection, $username, $password, $email, $apartment;
    if ($statement = $connection->prepare("INSERT INTO test.`10162970_users` (username, password, email, apartment) VALUES (?, ?, ?, ?)")){
        $statement->bind_param("ssss", $username, password_hash($password, PASSWORD_DEFAULT), $email, $apartment);
        $statement->execute();
        $statement->close();
    } else {
        die("probleem regamisega");
    }
    $connection->close();
}

function userLogin() {
    connect();
    global $connection, $username, $password, $userId, $loginError;
    if ($statement = $connection->prepare("SELECT u.id, u.password FROM test.`10162970_users` u WHERE u.username = ?")){
        $statement->bind_param("s", $username);
        $statement->execute();
        $queryResult = $statement->get_result();
        $userQuery = mysqli_fetch_assoc($queryResult);
        if (password_verify($password, $userQuery["password"])) {
            $userId = check_input($userQuery["id"]);
        } else {
            $loginError = "Kasutajanimi või parool on vale!";
        }
        $statement->close();
    }
    $connection->close();
}

function insertNewCounter() {
    connect();
    global $connection, $userId, $counter;
    if ($statement = $connection->prepare("INSERT INTO test.`10162970_counters` (counter, userid, date) VALUES (?, ?, now() )")){
        $statement->bind_param("ss", $counter, $userId);
        $statement->execute();
        $statement->close();
    } else {
        die("Probleem näidu edastamisega");
    }
    $connection->close();
}

function selectOldCounter() {
    connect();
    global $connection, $userId, $oldCounter, $counterDate, $getOldCounterError;
    if ($statement = $connection->prepare("SELECT c.counter, c.date FROM test.`10162970_counters` c WHERE c.userid = ? ORDER BY c.id DESC ")){
        $statement->bind_param("s", $userId);
        $statement->execute();
        $queryResult = $statement->get_result();
        $counterQuery = mysqli_fetch_assoc($queryResult);
        if (!empty($counterQuery)) {
            $oldCounter = check_input($counterQuery["counter"]);
            $counterDate = check_input($counterQuery["date"]);
        } else {
            $getOldCounterError = "Hetkel näit puudub!";
        }
        $statement->close();
    }
    $connection->close();
}