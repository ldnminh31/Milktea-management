<?php
try{
    include_once('../connect.php');
    $sql = "INSERT INTO sanpham (tensanpham, dongia, mota) VALUES (:tensanpham, :dongia, :mota);";
    $sth = $conn->prepare($sql);
    $sth->bindParam('tensanpham', $_POST['tensanpham'], PDO::PARAM_STR);
    $sth->bindParam('dongia', $_POST['dongia'], PDO::PARAM_INT);
    $sth->bindParam('mota', $_POST['mota'], PDO::PARAM_STR);
    $sth->execute();
} catch (Exception $e){
    echo "<script>alert('Lỗi hệ thống')</script>";
}
echo "<script>window.location.replace('/NLCS/product.php');</script>";