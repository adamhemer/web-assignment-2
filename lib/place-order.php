<?php

require_once "dbconn.php";

// Create an invoice and calculate the total server side, this prevents tampering with the total
$sql_create_invoice = 'INSERT INTO Invoice(holder_name, card_number, expiry, cvv, total) VALUES (?, ?, ?, ?, (SELECT SUM(c.quantity * p.price) FROM Cart c, Product p WHERE c.product_id = p.product_id));';
// Get the latest invoice number by finding the most recent invoice created
$sql_invoice_number = 'SELECT MAX(invoice_no) AS "invoice_no" FROM Invoice;';
// Join the Cart to the Products table and insert that into the ProductInvoice table to link the Invoice with its Products
$sql_link_products = 'INSERT INTO ProductInvoice SELECT invoice_no, product_id, quantity FROM Cart c, Invoice i WHERE i.invoice_no = ?;';
// Empty the cart
$sql_empty_cart = 'DELETE FROM Cart;';

$invoice_no = 0;

// Check all the details were prodvided
if (isset($_POST["name"], $_POST["number"], $_POST["expiry"], $_POST["cvv"])) {

    // Create the invoice
    $statement = mysqli_stmt_init($conn);
    $prepare = mysqli_stmt_prepare($statement, $sql_create_invoice); 
    mysqli_stmt_bind_param($statement, 'ssss', htmlspecialchars($_POST["name"]), htmlspecialchars($_POST["number"]), htmlspecialchars($_POST["expiry"]),  htmlspecialchars($_POST["cvv"]));
    $success = mysqli_stmt_execute($statement);
    if ($success) {
        echo "Invoice created";
    } else {
        echo mysqli_error($conn);
    }

    // Find the invoice number
    if ($result = mysqli_query($conn, $sql_invoice_number)) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $invoice_no = $row["invoice_no"];
            echo "Invoice number: " . $invoice_no;
        }
        mysqli_free_result($result);
    }

    // Link the products
    $statement = mysqli_stmt_init($conn);
    $prepare = mysqli_stmt_prepare($statement, $sql_link_products); 
    mysqli_stmt_bind_param($statement, 'i', $invoice_no);
    $success = mysqli_stmt_execute($statement);
    if ($success) {
        echo "Products linked created";
    } else {
        echo mysqli_error($conn);
    }

    // Empty the cart
    mysqli_query($conn, $sql_empty_cart);
    echo "Cart emptied";

    // Redirect the user to the completed invoice page
    header("location: ../complete.php?invoice_no=" . $invoice_no);
}




mysqli_close($conn);