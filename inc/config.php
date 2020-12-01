<?php
session_start();

$servername = "localhost";
$username = "groupproject";
$password = "password";
$database = "groupproject";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "MySQL Connection FAILED: " . $e->getMessage();
}
?>