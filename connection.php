<?php
$servername = "p3nlmysql31plsk.secureserver.net:3306";
$username = "grandthum";
$password = "~x3xKp84";
$dbname = "bhutani_grandthum";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>