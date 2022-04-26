<?php
include_once '../../database/connect.php';
include_once '../../utils.php';
// Check phone number customer
$sth = $conn->prepare("SELECT * FROM khachhang WHERE sdt=".$_POST['sdt']);
$sth->execute();
$data = $sth->fetch(PDO::FETCH_ASSOC);
if (!$data) {
    alert("Số điện thoại khách hàng chưa được tạo");
    go("/NLCS/invoice.php?page=create");
}
//
foreach ($_POST as $key => $item) {
    // echo (int) filter_var($key, FILTER_SANITIZE_NUMBER_INT);
}