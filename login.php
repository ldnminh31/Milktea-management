<?php
// Admin account
const ADMIN_USERNAME = "admin";
const ADMIN_PSW = "123456";
// check
$input_username =  $_POST['username'];
$input_password = $_POST['password'];
if ($input_username!=ADMIN_USERNAME || $input_password!=ADMIN_PSW){
    echo "<script type='text/javascript'>alert('Đăng nhập thất bại'); window.location = '/NLCS'</script>";
}
else{
    setcookie('user','admin',time()+60*60*24*30);
    echo "<script>window.location.replace('/NLCS/admin.php');</script>";
}