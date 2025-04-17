<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$server = "localhost";
$user = "username";
$pass = "password";
$db = "database_name";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Zorgt voor betere foutmeldingen

try {
    $mysqli = new mysqli($server, $user, $pass, $db);
    $mysqli->set_charset("utf8"); // Zorg voor correcte tekencodering
} catch (mysqli_sql_exception $e) {
    die("Databasefout: " . $e->getMessage()); // Geeft duidelijkere foutmelding
}


