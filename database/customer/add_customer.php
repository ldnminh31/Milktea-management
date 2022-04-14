<?php
try {
    include_once('../connect.php');
    $sql = "INSERT INTO khachhang (tenkhachhang, sdt, ngaysinh, diem) VALUES (:tenkhachhang, :sdt,:ngaysinh ,:diem);";
    $sth = $conn->prepare($sql);
    $sth->bindParam('tenkhachhang', $_POST['tenkhachhang'], PDO::PARAM_STR);
    $sth->bindParam('sdt', $_POST['sdt'], PDO::PARAM_INT);
    $sth->bindParam('ngaysinh', $_POST['ngaysinh'], PDO::PARAM_STR);
    $sth->bindParam('diem', $_POST['diem'], PDO::PARAM_INT);
    $sth->execute();
} catch (Exception $e) {
    echo "<script>alert('Lỗi hệ thống')</script>";
}
echo "<script>window.location.replace('/NLCS/customer.php');</script>";
