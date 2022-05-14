<?php
try {
    include_once('../connect.php');
    $sql = "UPDATE khachhang SET tenkhachhang=:tenkhachhang, sdt=:sdt, diem=:diem, ngaysinh=:ngaysinh WHERE sdt=" ."'". $_GET["id"]."'";
    $sth = $conn->prepare($sql);
    $sth->bindParam('tenkhachhang', $_POST['tenkhachhang'], PDO::PARAM_STR);
    $sth->bindParam('sdt', $_POST['sdt'], PDO::PARAM_INT);
    $sth->bindParam('diem', $_POST['diem'], PDO::PARAM_INT);
    $sth->bindParam('ngaysinh', $_POST['ngaysinh'], PDO::PARAM_STR);

    $sth->execute();
} catch (Exception $e) {
    echo "<script>alert('Error')</script>";
}
echo "<script>window.location.replace('/NLCS/customer.php');</script>";
