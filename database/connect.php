<?php
// ket noi database
$servername = "localhost";
$username = "root";
$password = "";
try {
  $conn = new PDO("mysql:host=$servername;dbname=nlcs", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  exit ("<script>alert('Kết nối CSDL thất bại')</script>");
}