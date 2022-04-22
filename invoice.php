<?php
// check cookie
if (!isset($_COOKIE['user']))
    header('Location: ./index.php')
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Invoice</title>
</head>

<body>
    <?php
    include_once('./components/sidebar.php')
    ?>
    <div class="px-5">
        <!-- Menu phụ -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="/NLCS/invoice.php">Xem hóa đơn</a></li>
                <li class="breadcrumb-item"><a href="/NLCS/invoice.php?page=create">Tạo hóa đơn</a></li>
            </ol>
        </nav>
        <!-- Các trang -->
        <?php
        if (!isset($_GET["page"]))
            require './components/invoice/invoice_list_page.php';
        else
            require './components/invoice/add_invoice_page.php';
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>