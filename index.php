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
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">


</head>

<body>

  <div class="wrapper">
    <div class="title">
      Login
    </div>

    <form action="./login.php" method="POST">
      <div class="field">
        <label>Username</label>
        <br>
        <input name="username" type="text" required>

      </div>
      <div class="field">
        <label>Password</label>
        <br>
        <input name="password" type="password" required>

      </div>
      <div class="field text-center">
        <button type="reset">Reset</button>
        <br>
        <button type="submit">Login</button>
      </div>

    </form>
  </div>


  <!-- <form class="login-box" method="post" action="login.php">
    <div>Tài khoản</div>
    <input name="username" /><br />
    <div>Mật khẩu</div>
    <input name="password" type="password" /><br />
    <button type="submit">Đăng nhập</button>

  </form> -->



  <!-- script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>