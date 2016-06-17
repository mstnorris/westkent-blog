<?php

$servername = "localhost";
$username = "westkent";
$password = "westkent";
$dbname = "westkent";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Connection was successful
} catch(PDOException $e) {
    // Connection failed
}
