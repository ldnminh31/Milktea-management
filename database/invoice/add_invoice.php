<?php
include_once '../../database/connect.php';
include_once '../../utils.php';
// class invoice
class Invoice
{
    public $ngaylap;
    public $chitiet = [];
}
class InvoiceItem
{
    public $tensanpham;
    public $dongia;
    public $soluong;
    function __construct($v1, $v2, $v3)
    {
        $this->tensanpham = $v1;
        $this->dongia = $v2;
        $this->soluong = $v3;
    }
}
$invoice = new Invoice();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$invoice->ngaylap = date('H:i:s d/m/Y');
$is_valid = false;
foreach ($_POST as $key => $value) {
    if ($value === '0')
        continue;
    $is_valid = true;
    $sql = "SELECT * FROM sanpham WHERE idsanpham='$key'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sanpham = $stmt->fetch(PDO::FETCH_ASSOC);
    $sanpham = new InvoiceItem($sanpham['tensanpham'], intval($sanpham['dongia']), intval($value));
    array_push($invoice->chitiet, $sanpham);
}
$invoice = json_encode($invoice);
if (!$is_valid) {
    alert("Invalid invoice");
    go("/NLCS/invoice.php?page=create");
}
// Update vào database
$sql = 'INSERT INTO hoadon (data) VALUES(\'' . $invoice . '\')';
$stmt = $conn->prepare($sql);
$stmt->execute();
go("/NLCS/invoice.php?page=create");
