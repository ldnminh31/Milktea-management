<?php
// ket noi database
$servername = "sql6.freemysqlhosting.net";
$username = "sql6492085";
$password = "N4N8eZ32yd";
try {
  $conn = new PDO("mysql:host=$servername;dbname=sql6492085", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  exit ("<script>alert('Kết nối CSDL thất bại')</script>");
}