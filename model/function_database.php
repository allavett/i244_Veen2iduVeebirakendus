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
    $connection = new mysqli($host, $user, $pass, $db) or die("Ei saa andmebaasiga ühendust - ".mysqli_error());
    mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
    echo "ühendus loodud?";
}

function registerUser() {
    connect();
    global $connection, $username, $password, $email, $apartment;
    $statement = $connection->prepare("INSERT INTO users (username, password, email, apartment) VALUES (?, ?, ?, ?)");
    $statement->bind_param("ssss", $username, $password, $email, $apartment);
    $statement->execute();
    $statement->close();
    $connection->close();
}