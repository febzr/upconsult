<?php
$servername = "44.234.244.93";
$dbname = "mvpjgteducom_upconsult";
$username = "mvpjgteducom_upconsult";
$password = "cnsdf_01";

// Criando a coenx達o
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>