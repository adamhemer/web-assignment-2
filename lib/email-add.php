<?php

require_once "dbconn.php"; 

// Adds the email to the mailing list
$sql = 'INSERT INTO SubscriberEmails(email)
        VALUES (?);';

// Checks that a product_id was provided
if (isset($_POST["email"])) {
    // Executes the sql query
    $statement = mysqli_stmt_init($conn);
    $prepare = mysqli_stmt_prepare($statement, $sql);
    mysqli_stmt_bind_param($statement, 'sii', htmlspecialchars($_POST["email"]));
    $success = mysqli_stmt_execute($statement);
    if ($success) {
        // Redirects back to the cart page if successful
        header("location: ../about_us.php");
    } else {
        echo mysqli_error($conn);
    }
}

mysqli_close($conn);