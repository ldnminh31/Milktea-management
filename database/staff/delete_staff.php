<?php
    include_once '../connect.php';
    try {
        $sql = "DELETE FROM nhanvien WHERE idnhanvien='".$_GET["idnhanvien"]."'";
        echo $sql;
        $conn->query($sql);
        
    } catch (\Throwable $th) {
        echo "<script>alert('Error')</script>";
    }   
    echo "<script>window.location.replace('/NLCS/staff.php');</script>";
