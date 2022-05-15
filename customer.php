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
    <title>Customer</title>

</head>

<body>
    <?php
    include_once('./components/sidebar.php');
    include_once("./database/connect.php");

    ?>
    <div class="d-flex align-items-center flex-column">
        <h2 align="center">MANAGE CUSTOMER</h2>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin: auto; display: block">Add customer</button>
        <table class="table table-striped w-75">
            <thead>
                <tr>
                    <th scope="col">Customer's name</th>
                    <th scope="col">Phone number</th>
                    <th scope="col">Point</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // get khachhang
                $data = [];
                $sql = "SELECT * FROM khachhang";
                $res = $conn->query($sql);
                foreach ($res as $row) {
                    array_push($data, $row);
                    echo '
             <tr id=' . $row['sdt'] . '>
                    <td scope="row">' . $row['tenkhachhang'] . '</td>
                    <td data-label="Số điện thoại">' . $row['sdt'] . '</td>
                    <td data-label="Điểm">' . $row['diem'] . '</td>
                    <td data-label="Ngày sinh">' . $row['ngaysinh'] . '</td>
                    
                    
                    <td class="d-flex" data-label="Hành động">
                        <button id="' . $row['sdt'] . '" type="button" class="btn btn-primary flex-fill mx-1" data-bs-toggle="modal" data-bs-target="#updateModal">Edit</button>
                        <a href="./database/customer/delete_customer.php?tenkhachhang=' . $row['tenkhachhang'] . '"><button type="button" class="btn btn-danger flex-fill mx-1">Delete</button></a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Customer's name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- form -->
                    <form method="post" action="/NLCS/database/customer/add_customer.php">
                        <div class="mb-3">
                            <label for="exampleinput requiredEmail1" class="form-label">Customer's name</label>
                            <input required name="tenkhachhang" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleinput requiredPassword1" class="form-label">Phone number</label>
                            <input required name="sdt" type="text" class="form-control" id="exampleinput requiredPassword1">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Birthday</label>
                            <input required name="ngaysinh" type="date" class="form-control" id="exampleFormControlTextarea1"></input required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleinput requiredPassword1" class="form-label">Point</label>
                            <input required name="diem" type="text" class="form-control" id="exampleinput requiredPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- form -->
                    <form method="post" action="/NLCS/database/customer/update_customer.php">
                        <div class="mb-3">
                            <label for="exampleinput requiredEmail1" class="form-label">Staff's name</label>
                            <input required name="tenkhachhang" class="form-control" id="exampleinput requiredEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleinput requiredPassword1" class="form-label">Phone number</label>
                            <input required name="sdt" class="form-control" id="exampleinput requiredPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleinput requiredPassword1" class="form-label">Point</label>
                            <input required name="diem" type="text" class="form-control" id="exampleinput requiredPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Birthday</label>
                            <input required name="ngaysinh" type="date" class="form-control" id="exampleFormControlTextarea1"></input required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        const btnList = document.getElementsByTagName("button");
        for (btn of btnList)
            if (btn.outerText === 'Edit') {
                // lấy dữ liệu
                const id = btn.id
                const row = document.querySelectorAll(`tr[id="${btn.id}"] td`)
                const data = [];
                for (let index = 0; index < 4; index++) {
                    data.push(row[index].innerText)
                }
                // điền vào input required
                btn.addEventListener('click', () => {
                    document.querySelector("#updateModal form").action = `/NLCS/database/customer/update_customer.php?id=${id}`;
                    const inputList = document.querySelectorAll("#updateModal form .form-control")
                    inputList.forEach((value, key) => {
                        value.defaultValue = data[key]
                    })
                    document.querySelector(".modal-title").innerText = "Update thông tin";
                    document.getElementById("submit-btn").innerText = "Update";
                })

            }
        if (btn.outerText === "Add customer") {
            btn.addEventListener('click', () => {
                document.querySelector("form").action = `/NLCS/database/customer/add_customer.php`;
                const inputList = document.querySelectorAll("form .form-control")
                inputList.forEach((value, key) => {
                    value.defaultValue = ""
                })
                document.querySelector(".modal-title").innerText = "Add customer";
                document.getElementById("submit-btn").innerText = "Add";
            })
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>