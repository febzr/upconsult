<?php
$servername = "localhost";
$dbname = "upconsult";
$username = "upconsult";
$password = "cnsdf_01";

// Criando a coenxão
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>