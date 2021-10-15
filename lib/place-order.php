<?php

require_once "dbconn.php";

$sql_invoice = 'INSERT INTO Invoice(holder_name, card_number, expiry, cvv, total) VALUES (?, ?, ?, ?, ?);'
$sql_link_products = 'INSERT INTO ProductInvoice SELECT invoice_no, product_id, quantity FROM Cart c, Invoice i WHERE i.invoice_no = 1999;';
$sql_empty_cart = 'DELETE FROM Cart;'

$statement = mysqli_stmt_init($conn);

if (isset($_POST["product_id"])) {
    $prepare = mysqli_stmt_prepare($statement, $sql); 
    mysqli_stmt_bind_param($statement, 'sii', htmlspecialchars($_POST["product_id"]), $_POST["product_quantity"], $_POST["product_quantity"]);
    $success = mysqli_stmt_execute($statement);
    if ($success) {
        header("location: ../cart.php");
    } else {
        echo mysqli_error($conn);
    }
}

mysqli_close($conn);