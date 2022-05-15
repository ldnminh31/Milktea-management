<h1 align="center">Create invoice</h1>
<form action="/NLCS/database/invoice/add_invoice.php" method="POST">
    <?php
    include_once './components/invoice/get_product_for_invoice.php';
    ?>
    <div class="text-center"><b >Total: <span id="total">0</span></b></div>
    <button type="submit" class="btn btn-primary d-flex mx-auto px-5 mt-3">Create</button>
</form>
<!-- Count total -->
<script>
    let total = 0;
    let obj = {}
    $("input").change(function() {
        const name = $(this).attr('name')
        const price = parseInt($(this).attr('price'))
        const val = parseInt($(this).val())
        if (!obj[name]){
            obj[name] = val
            total += price
        } else {
            total -= price*obj[name];
            obj[name] = val;
            total += price*obj[name];
        }
        $("#total").html(total)
    })
</script>