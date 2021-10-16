<?php

require_once "dbconn.php";

$sql_calculate_total = ';';
$sql_create_invoice = 'INSERT INTO Invoice(holder_name, card_number, expiry, cvv, total) VALUES (?, ?, ?, ?, (SELECT SUM(c.quantity * p.price) FROM Cart c, Product p WHERE c.product_id = p.product_id));';
$sql_invoice_number = 'SELECT MAX(invoice_no) AS "invoice_no" FROM Invoice;';
$sql_link_products = 'INSERT INTO ProductInvoice SELECT invoice_no, product_id, quantity FROM Cart c, Invoice i WHERE i.invoice_no = ?;';
$sql_empty_cart = 'DELETE FROM Cart;';

$invoice_no = 0;

if (isset($_POST["name"], $_POST["number"], $_POST["expiry"], $_POST["cvv"])) {

    $statement = mysqli_stmt_init($conn);
    $prepare = mysqli_stmt_prepare($statement, $sql_create_invoice); 
    mysqli_stmt_bind_param($statement, 'ssss', htmlspecialchars($_POST["name"]), htmlspecialchars($_POST["number"]), htmlspecialchars($_POST["expiry"]),  htmlspecialchars($_POST["cvv"]));
    $success = mysqli_stmt_execute($statement);
    if ($success) {
        echo "Invoice created";
        // header("location: ../cart.php");
    } else {
        echo mysqli_error($conn);
    }

    if ($result = mysqli_query($conn, $sql_invoice_number)) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $invoice_no = $row["invoice_no"];
            echo "Invoice number: " . $invoice_no;
        }
        mysqli_free_result($result);
    }

    $statement = mysqli_stmt_init($conn);
    $prepare = mysqli_stmt_prepare($statement, $sql_link_products); 
    mysqli_stmt_bind_param($statement, 'i', $invoice_no);
    $success = mysqli_stmt_execute($statement);
    if ($success) {
        echo "Products linked created";
        // header("location: ../cart.php");
    } else {
        echo mysqli_error($conn);
    }

    mysqli_query($conn, $sql_empty_cart);
    echo "Cart emptied";

    header("location: ../complete.php?invoice_no=" . $invoice_no);
}




mysqli_close($conn);