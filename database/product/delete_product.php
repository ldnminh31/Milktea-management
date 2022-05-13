<?php
    include_once '../connect.php';
    try {
        $sql = "DELETE FROM sanpham WHERE tensanpham='".$_GET["tensanpham"]."'";
        echo $sql;
        $conn->query($sql);
        
    } catch (\Throwable $th) {
        echo "<script>alert('Error')</script>";
    }   
    echo "<script>window.location.replace('/NLCS/product.php');</script>";
