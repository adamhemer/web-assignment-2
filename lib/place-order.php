<?php

require_once "dbconn.php";

$sql_calculate_total = ';';
$sql_invoice = 'INSERT INTO Invoice(holder_name, card_number, expiry, cvv, total) VALUES (?, ?, ?, ?, (SELECT SUM(c.quantity * p.price) FROM Cart c, Product p WHERE c.product_id = p.product_id));'
$sql_link_products = 'INSERT INTO ProductInvoice SELECT invoice_no, product_id, quantity FROM Cart c, Invoice i WHERE i.invoice_no = 1999;';
$sql_empty_cart = 'DELETE FROM Cart;'


$statement = mysqli_stmt_init($conn);


if (isset($_POST["name"], $_POST["number"], $_POST["expiry"], $_POST["cvv"])) {

    $prepare = mysqli_stmt_prepare($statement, $sql); 
    mysqli_stmt_bind_param($statement, 'ssss', htmlspecialchars($_POST["product_id"]), $_POST["product_quantity"], $_POST["product_quantity"]);
    $success = mysqli_stmt_execute($statement);
    if ($success) {
        header("location: ../cart.php");
    } else {
        echo mysqli_error($conn);
    }

}




mysqli_close($conn);