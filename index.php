<?php
//check login
if (isset($_COOKIE['user'])) {
  echo "<script>window.location.replace('/NLCS/admin.php');</script>";
}
echo "<script>window.history.forward()</script>";
?>
<!-- user interface -->
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css"/>
  <title>Login</title>
  <style>
    .login-box{
      display: block;
      margin: auto;
      margin-top: 100px;
      box-shadow: 0 0 6px 0;
      width: fit-content;
      padding: 40px;
      font-size: 18px;
    }
    input{
      margin-bottom: 10px;
      min-width: 200px;
      height: 30px;
      font-size: inherit;
    }
    button{
      width: 100%;
      margin-top: 5px;
      font-size: inherit;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <!-- Form đăng nhập -->
  <form class="login-box" method="post" action="login.php">
    <div>Tài khoản</div>
    <input name="username" /><br />
    <div>Mật khẩu</div>
    <input name="password" type="password" /><br />
    <button type="submit">Đăng nhập</button>
  </form>
</body>

</html>