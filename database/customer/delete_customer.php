<?php
    include_once '../connect.php';
    try {
        $sql = "DELETE FROM khachhang WHERE tenkhachhang='".$_GET["tenkhachhang"]."'";
        echo $sql;
        $conn->query($sql);
        
    } catch (\Throwable $th) {
        echo "<script>alert('Lỗi hệ thống')</script>";
    }   
    echo "<script>window.location.replace('/NLCS/customer.php');</script>";
?>