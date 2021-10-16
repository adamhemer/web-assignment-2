<?php

require_once "dbconn.php"; 

// Deletes item from the cart matching the provided product_id
$sql = 'DELETE FROM Cart WHERE product_id=?';
$statement = mysqli_stmt_init($conn);

// Checks that a product_id was provided
if (isset($_POST["product_id"])) {
    // Executes the sql query
    $prepare = mysqli_stmt_prepare($statement, $sql); 
    mysqli_stmt_bind_param($statement, 's', htmlspecialchars($_POST["product_id"]));
    $success = mysqli_stmt_execute($statement);
    if ($success) {
        // Redirects back to the cart page if successful
        header("location: ../cart.php");
    } else {
        echo mysqli_error($conn);
    }
}

mysqli_close($conn);