<h1 align="center">Tạo hóa đơn</h1>
<form action="/NLCS/database/invoice/add_invoice.php" method="POST">
    <label>SĐT khách hàng</label>
    <input name="sdt" class="mb-3" required/>
    <?php
    include_once './components/invoice/get_product_for_invoice.php';
    ?>
    <b >Tổng tiền: </b>
    <button type="submit" class="btn btn-primary d-flex mx-auto px-5 mt-3">Tạo</button>
</form>