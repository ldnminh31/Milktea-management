<?php
// Admin account
const ADMIN_USERNAME = "admin";
const ADMIN_PSW = "123456";
// check
$username =  $_POST['username'];
$password = $_POST['password'];
if ($username!=ADMIN_USERNAME || $password!=ADMIN_PSW){
    echo "<script type='text/javascript'>alert('Login failed'); window.location = '/'</script>";
}
else{
    setcookie('user','admin',time()+60*60*24*30);
    echo "<script>window.location.replace('admin.php');</script>";
}