<?php
$servername = "45.171.124.80";
$dbname = "upconsult";
$username = "upconsult";
$password = "Upcon!2109";

// Criando a coenxão
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>