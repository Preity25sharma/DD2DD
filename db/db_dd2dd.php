<?php
$servername = "localhost";
$username = "d2dDev";
$password = "d2dDBUser";
$db="DD2DDlive";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>