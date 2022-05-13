<h1 align="center">Create invoice</h1>
<form action="/NLCS/database/invoice/add_invoice.php" method="POST">
    <?php
    include_once './components/invoice/get_product_for_invoice.php';
    ?>
    <b>Total: </b>
    <button type="submit" class="btn btn-primary d-flex mx-auto px-5 mt-3">Create</button>
</form>