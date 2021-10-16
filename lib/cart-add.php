<?php

require_once "dbconn.php"; 

$sql = 'INSERT INTO Cart (product_id, quantity) VALUES (?, ?) ON DUPLICATE KEY UPDATE quantity = quantity + ?;';
$statement = mysqli_stmt_init($conn);

if (isset($_POST["product_id"])) {
    $prepare = mysqli_stmt_prepare($statement, $sql); 
    mysqli_stmt_bind_param($statement, 'sii', htmlspecialchars($_POST["product_id"]), htmlspecialchars($_POST["product_quantity"]), htmlspecialchars($_POST["product_quantity"]));
    $success = mysqli_stmt_execute($statement);
    if ($success) {
        header("location: ../cart.php");
    } else {
        echo mysqli_error($conn);
    }
}

mysqli_close($conn);