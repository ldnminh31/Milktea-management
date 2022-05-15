<?php
echo '<table class="table table-bordered">';
echo '<tr>
<th>Product</th>
<th class="text-center">Price</th>
<th width="40%">Description</th>
<th width="5%">Amount</th>
</tr>';

class TableRows extends RecursiveIteratorIterator
{
    private $id = "";
    private $price = 0;
    function __construct($it)
    {
        parent::__construct($it, self::LEAVES_ONLY);
    }
    function current()
    {
        $key = parent::key();
        $value = parent::current();
        if ($key == "idsanpham") $this->id = $value;
        setlocale(LC_MONETARY, "en_US");
        if (is_numeric($value)) {
            $this->price = $value;
            return '<td align="center" >' . number_format($value) . "</td>";
        }
        else
            return '<td>' . $value . "</td>";
    }
    function beginChildren()
    {
        echo "<tr>";
    }

    function endChildren()
    {
        echo '<td><input price="'.$this->price.'" required name=' . $this->id . ' value="0" min="0" type="number"/></td>';
        echo "</tr>" . "\n";
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nlcs";
include_once './database/connect.php';
$stmt = $conn->prepare("SELECT * FROM sanpham");
$stmt->execute();

// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
    if ($k == "idsanpham") {

        continue;
    }
    echo $v;
}
echo "</table>";
