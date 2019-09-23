<?php

session_start();
include('../connect.php');
//$a = $_POST['code'];
$product_name = $_POST['name'];
$expiry_date = $_POST['exdate'];
$price = $_POST['price'];
$supplier = $_POST['supplier'];
$qty = $_POST['qty'];
$o_price = $_POST['o_price'];
$profit = $_POST['profit'];
$gen_name = $_POST['gen'];
$date_arrival = $_POST['date_arrival'];
$qty_sold = $_POST['qty_sold'];
// query
$sql = "INSERT INTO products (product_name,expiry_date,price,supplier,qty,o_price,profit,gen_name,date_arrival,qty_sold)"
        . " VALUES (:product_name,:expiry_date,:price,:supplier,:qty,:o_price,:profit,:gen_name,:date_arrival,:qty_sold)";
$q = $db->prepare($sql);
$q->execute(array(':product_name' => $product_name, ':expiry_date' => $expiry_date, ':price' => $price, ':supplier' => $supplier,
    ':qty' => $qty, ':o_price' => $o_price, ':profit' => $profit, ':gen_name' => $gen_name, ':date_arrival' => $date_arrival, ':qty_sold' => $qty_sold));
header("location: products.php");
?>