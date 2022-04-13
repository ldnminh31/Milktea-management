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
    <link rel="stylesheet" href="./style.css" />
    <title>Product</title>
    <style>
    </style>
</head>

<body>
    <?php
    include_once('./components/sidebar.php');
    include_once("./database/connect.php");

    ?>

    <!-- table -->
    <div class="d-flex align-items-center flex-column">
        <h2 align="center">Quản lý sản phẩm</h2>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm sản phẩm</button>
        <table class="table table-striped w-75">
            <thead>
                <tr>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Đơn giá</th>
                    <th width="30%" scope="col">Mô tả</th>
                    <th class="text-center" scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // get san pham
                $data = [];
                $sql = "SELECT * FROM sanpham";
                $res = $conn->query($sql);
                foreach ($res as $row) {
                    array_push($data, $row);
                    echo '
             <tr id='.$row['idsanpham'].'>
                    <td scope="row">' . $row['tensanpham'] . '</td>
                    <td data-label="Đơn giá">' . $row['dongia'] . '</td>
                    <td data-label="Mô tả">' . $row['mota'] . '</td>
                    <td class="d-flex" data-label="Hành động">
                        <button id="'.$row['idsanpham'].'" type="button" class="btn btn-primary flex-fill mx-1" data-bs-toggle="modal" data-bs-target="#updateModal">Sửa</button>
                        <a href="./database/product/delete_product.php?tensanpham=' . $row['tensanpham'] . '"><button type="button" class="btn btn-danger flex-fill mx-1">Xóa</button></a>
                    </td>
                </tr>
        ';
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- modal thêm-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- form -->
                    <form method="post" action="/NLCS/database/product/add_product.php">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                            <input name="tensanpham" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Đơn giá</label>
                            <input name="dongia" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                            <textarea name="mota" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal sửa-->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cập nhật sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- form -->
                    <form method="post" action="/NLCS/database/product/update_product.php">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                            <input name="tensanpham" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Đơn giá</label>
                            <input name="dongia" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                            <textarea name="mota" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const btnList = document.getElementsByTagName("button");
        for (btn of btnList)
                if (btn.outerText==='Sửa') {
                    // lấy dữ liệu
                    const id = btn.id
                    const row = document.querySelectorAll(`tr[id="${btn.id}"] td`)
                    const data=[];
                    for (let index = 0; index < 3 ; index++) {
                        data.push(row[index].innerText)
                    }
                    // điền vào input
                    btn.addEventListener('click',() => { 
                        document.querySelector("#updateModal form").action=`/NLCS/database/product/update_product.php?id=${id}`;
                        const inputList = document.querySelectorAll("#updateModal form .form-control")
                        inputList.forEach((value, key) => { value.defaultValue = data[key] })
                    })
                }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>