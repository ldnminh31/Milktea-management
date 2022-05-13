<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoie's detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <h3 align="center">INVOICE'S DETAIL</h3>
    <!-- <a class="d-block mx-auto text-center" href="./invoice.php">Back</a> -->
    <table class="table w-50 mx-auto">
        <thead>
            <tr>
                <th scope="col">Product's name</th>
                <th scope="col">Price</th>
                <th scope="col">Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once './database/get.php';
            include_once './database/connect.php';
            $idhoadon = $_GET["id"];
            $data = get("SELECT * FROM hoadon WHERE idhoadon=$idhoadon", $conn);
            $data = json_decode($data[0]['data']);
            $data = $data->chitiet;
            foreach ($data as $key => $value) {
                echo "<tr>";
                echo "<td>$value->tensanpham</td>";
                echo "<td>".number_format($value->dongia)."</td>";
                echo "<td>$value->soluong</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>