<?php
include_once '../connect.php';
try {
$sql = "DELETE from hoadon WHERE idhoadon=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$_GET["id"]]);
} catch (\Throwable $th) {
    echo "<script>alert('Lỗi hệ thống')</script>";
}
header("Location: /NLCS/invoice.php");