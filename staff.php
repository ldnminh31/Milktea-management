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
    <title>Staff</title>
    <style>
    </style>
</head>

<body>
    <?php
    include_once('./components/sidebar.php');
    ?>
    <div>
        <h2 align="center">Quản lý nhân viên</h2>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin: auto; display: block">Thêm nhân viên</button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Tên nhân viên</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Vị trí công việc</th>
                    <th scope="col">Lương</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // get nhan vien
                include_once './database/connect.php';
                $data = [];
                $sql = "SELECT * FROM nhanvien";
                $res = $conn->query($sql);
                foreach ($res as $row) {
                    array_push($data, $row);
                    echo '
             <tr id=' . $row['idnhanvien'] . '>
                    <td scope="row">' . $row['hoten'] . '</td>
                    <td data-label="Đơn giá">' . $row['ngaythangnamsinh'] . '</td>
                    <td data-label="Mô tả">' . $row['sdt'] . '</td>
                    <td data-label="Mô tả">' . $row['diachi'] . '</td>
                    <td data-label="Mô tả">' . $row['vitri'] . '</td>
                    <td data-label="Mô tả">' . $row['luong'] . '</td>
                    <td class="d-flex" data-label="Hành động">
                        <button id="' . $row['idnhanvien'] . '" type="button" 
                        class="btn btn-primary flex-fill mx-1" 
                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Edit
                        </button>
                        <a href="./database/staff/delete_staff.php?idnhanvien=' . $row['idnhanvien'] . '"><button type="button" class="btn btn-danger flex-fill mx-1">Delete</button></a>
                    </td>
                </tr>
        ';
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm nhân viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- form -->
                    <form method="POST" action="/NLCS/database/staff/add_staff.php">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên nhân viên</label>
                            <input name="hoten" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Ngày sinh</label>
                            <input name="ngaythangnamsinh" type="date" class="form-control" id="exampleFormControlTextarea1"></input>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Số điện thoại</label>
                            <input name="sdt" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Địa chỉ</label>
                            <input name="diachi" class="form-control" id="exampleFormControlTextarea1"></input>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Vị trí công việc</label>
                            <input name="vitri" class="form-control" id="exampleFormControlTextarea1"></input>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Lương</label>
                            <input name="luong" class="form-control" id="exampleFormControlTextarea1"></input>
                        </div>
                        <button id="submit-btn" type="submit" class="btn btn-primary">Thêm</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Cập nhật nhân viên </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- form -->
                    <form method="POST" action="/NLCS/database/staff/update_staff.php">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên nhân viên</label>
                            <input name="hoten" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Ngày sinh</label>
                            <input name="ngaythangnamsinh" type="date" class="form-control" id="exampleFormControlTextarea1"></input>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Số điện thoại</label>
                            <input name="sdt" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Địa chỉ</label>
                            <input name="diachi" class="form-control" id="exampleFormControlTextarea1"></input>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Vị trí công việc</label>
                            <input name="vitri" class="form-control" id="exampleFormControlTextarea1"></input>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Lương</label>
                            <input name="luong" class="form-control" id="exampleFormControlTextarea1"></input>
                        </div>
                        <button id="submit-btn" type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <script>
        const btnList = document.getElementsByTagName("button");
        for (btn of btnList) {

            if (btn.outerText === 'Edit') {
                // lấy dữ liệu
                const id = btn.id
                const row = document.querySelectorAll(`tr[id="${btn.id}"] td`)
                const data = [];
                for (let index = 0; index < 6; index++) {
                    data.push(row[index].innerText)
                }
                // điền vào input
                btn.addEventListener('click', () => {
                    document.querySelector("form").action = `/NLCS/database/staff/update_staff.php?id=${id}`;
                    const inputList = document.querySelectorAll("form .form-control")
                    inputList.forEach((value, key) => {
                        value.defaultValue = data[key]
                    })
                    document.querySelector(".modal-title").innerText = "Cập nhật thông tin";
                    document.getElementById("submit-btn").innerText = "Cập nhật";
                })
            }
            if (btn.outerText === "Thêm nhân viên") {
                btn.addEventListener('click', () => {
                    document.querySelector("form").action = `/NLCS/database/staff/add_staff.php`;
                    const inputList = document.querySelectorAll("form .form-control")
                    inputList.forEach((value, key) => {
                        value.defaultValue = ""
                    })
                    document.querySelector(".modal-title").innerText = "Thêm nhân viên";
                    document.getElementById("submit-btn").innerText = "Thêm";
                })
            }
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>