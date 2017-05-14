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
    $db="water_counter";
    $connection = new mysqli($host, $user, $pass, $db) or die("Ei saa andmebaasiga ühendust - ".mysqli_error($connection));
    mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
    echo "ühendus loodud?";
}

function getCondos() {
    connect();
    global $connection, $condos;
    $condos = array();
    $statement = $connection->prepare("SELECT c.name, c.county, c.numberofapartments FROM water_counter.condos c");
    $statement->execute();
    $queryResult = $statement->get_result();
    while ($condo = mysqli_fetch_assoc($queryResult)){
        $condos[] = $condo;
    }
    $statement->close();
    $connection->close();

}

function checkPostedCondoInformation() {
    connect();
    global $connection, $area, $condo, $apartment, $condoId, $registerErrors;
    $statement = $connection->prepare("SELECT c.id, c.numberofapartments FROM water_counter.condos c WHERE c.county = ? AND c.name = ?");
    $statement->bind_param("ss", $area, $condo);
    $statement->execute();
    $queryResult = $statement->get_result();
    while ($condoQuery = mysqli_fetch_assoc($queryResult)){
        if ($apartment > 0 && $apartment <= $condoQuery["numberofapartments"]){
            $condoId = $condoQuery["id"];
        } else {
            $registerErrors["apartment"] = "Sellist korterit valitud majas ei ole!";
        }
    }
    $statement->close();
    $connection->close();
}

function registerUser() {
    connect();
    global $connection, $username, $password, $email, $apartment;
    $statement = $connection->prepare("INSERT INTO water_counter.users (username, password, email, apartment) VALUES (?, ?, ?, ?)");
    $statement->bind_param("ssss", $username, $password, $email, $apartment);
    $statement->execute();
    $statement->close();
    $connection->close();
}