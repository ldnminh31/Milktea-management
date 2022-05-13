<?php
function get($sql, $conn)
{
    $res = [];
    $stmt = $conn->query($sql);
    while ($data = $stmt->fetch()) {
        array_push($res,$data);
    }
    return $res;
}