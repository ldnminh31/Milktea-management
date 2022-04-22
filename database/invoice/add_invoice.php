<?php
include_once '../../database/connect.php';
$sth = $conn->prepare("SELECT * FROM khachhang WHERE sdt=".$_POST['sdt']);
$sth->execute();
$data = $sth->fetch(PDO::FETCH_ASSOC);
foreach ($_POST as $key => $item) {
    // echo (int) filter_var($key, FILTER_SANITIZE_NUMBER_INT);
}