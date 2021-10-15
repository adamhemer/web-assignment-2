<?php

require_once "dbconn.php"; 

$sql = 'DELETE FROM Cart WHERE product_id=?';
$statement = mysqli_stmt_init($conn);

if (isset($_POST["product-id"])) {
    $prepare = mysqli_stmt_prepare($statement, $sql); 
    mysqli_stmt_bind_param($statement, 's', htmlspecialchars($_POST["product-id"]));
    $success = mysqli_stmt_execute($statement);
    if ($success) {

        header("location: ../cart.php");
    } else {
        echo mysqli_error($conn);
    }
}

mysqli_close($conn);