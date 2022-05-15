<?php
// check cookie
if (!isset($_COOKIE['user']))
    echo "<script>window.location.replace('/NLCS/index.php');</script>";
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="./style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <?php include_once('./components/sidebar.php') ?>
    <h1 class="animate__animated animate__bounce " style="text-align: center">Welcome admin!</h1>
</body>

</html>