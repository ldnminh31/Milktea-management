<?php
echo '<table class="table table-bordered">';
echo '<tr>
<th>Tên sản phẩm</th>
<th class="text-center">Đơn giá</th>
<th width="40%">Mô tả</th>
<th width="5%">Số lượng</th>
</tr>';

class TableRows extends RecursiveIteratorIterator
{
    private $id = "";
    function __construct($it)
    {
        parent::__construct($it, self::LEAVES_ONLY);
    }
    function current()
    {
        $key = parent::key();
        $value = parent::current();
        if ($key=="idsanpham") $this->id = $value;
        setlocale(LC_MONETARY, "en_US");
        if (is_numeric($value))
            return '<td align="center" >' . number_format($value) . "</td>";
        else
            return '<td>' . $value . "</td>";
    }
    function beginChildren()
    {
        echo "<tr>";
    }

    function endChildren()
    {
        echo '<td><input name='.$this->id.' value="0" min="0" type="number"/></td>';
        echo "</tr>" . "\n";
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nlcs";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
