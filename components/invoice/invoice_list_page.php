<table class="table" style="max-width: 500px; margin: auto">
  <thead>
    <tr>
      <th style="text-align: left" scope="col">Invoice date</th>
      <th style="text-align: right" scope="col">Total</th>
      <th style="text-align: center" scope="col">Action</th>
      <th style="text-align: center" scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
    //count total
    function countTotal($chitiet)
    {
      $res = 0;
      foreach ($chitiet as $product) {
        $res += $product->soluong * $product->dongia;
      }
      return $res;
    }
    //
    include_once './database/get.php';
    include_once './database/connect.php';
    $data = get("SELECT * FROM hoadon", $conn);
    // var_dump($data);
    foreach ($data as $item) {
      $invoice = json_decode($item['data']);
      echo "<tr>";
      echo "<td>" . $invoice->ngaylap . "</td>";
      echo '<td align="right">' . number_format(countTotal($invoice->chitiet)) . '</td>';
      echo '<td align="center"><a style="margin-right: 5px" target="_blank" href="./invoice_detail.php?id=' . $item['idhoadon'] . '">Detail</a><a href="./database/invoice/delete_invoice.php?id='.$item['idhoadon'].'">Delete</a></td>';
      echo "</tr>";
    }
    // modal detail
    include_once './components/invoice/invoice_detail_modal.php';
    ?>
  </tbody>
</table>