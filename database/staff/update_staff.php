<?php
try{
    include_once('../connect.php');
    $sql = "UPDATE nhanvien SET hoten=:hoten, ngaythangnamsinh=:ngaythangnamsinh, sdt=:sdt, diachi=:diachi, vitri=:vitri, luong=:luong WHERE idnhanvien=".$_GET["id"];
    $sth = $conn->prepare($sql);
    $sth->bindParam('hoten', $_POST['hoten'], PDO::PARAM_STR);
    $sth->bindParam('ngaythangnamsinh', $_POST['ngaythangnamsinh'], PDO::PARAM_STR);
    $sth->bindParam('sdt', $_POST['sdt'], PDO::PARAM_INT);
    $sth->bindParam('diachi', $_POST['diachi'], PDO::PARAM_STR);
    $sth->bindParam('vitri', $_POST['vitri'], PDO::PARAM_STR);
    $sth->bindParam('luong', $_POST['luong'], PDO::PARAM_STR);

    $sth->execute();
} catch (Exception $e){
    echo "<script>alert('Lỗi hệ thống')</script>";
}
echo "<script>window.location.replace('/NLCS/staff.php');</script>";