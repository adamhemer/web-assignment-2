<?php

require_once "dbconn.php"; 

// Adds the item to the cart or if it is already in the cart it sums the quantities.
$sql = 'INSERT INTO Cart (product_id, quantity)
        VALUES (?, ?)
        ON DUPLICATE KEY UPDATE quantity = quantity + ?;';

// Checks that a product_id was provided
if (isset($_POST["product_id"])) {
    // Executes the sql query
    $statement = mysqli_stmt_init($conn);
    $prepare = mysqli_stmt_prepare($statement, $sql); 
    mysqli_stmt_bind_param($statement, 'sii', htmlspecialchars($_POST["product_id"]), htmlspecialchars($_POST["product_quantity"]), htmlspecialchars($_POST["product_quantity"]));
    $success = mysqli_stmt_execute($statement);
    if ($success) {
        // Redirects back to the cart page if successful
        header("location: ../cart.php");
    } else {
        echo mysqli_error($conn);
    }
}

mysqli_close($conn);