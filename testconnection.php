<?php
echo "jj";
include('connect.php');
$res = $con->query('show tables');
print_r($res->fetch_all());
?>