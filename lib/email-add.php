<?php

    require_once "dbconn.php"; 

    echo $_POST["email"];

    // Adds the email to the mailing list, 'IGNORE' will ignore duplicate entries rather than erroring
    $sql = 'INSERT IGNORE INTO SubscriberEmails(email)
            VALUES (?);';

    // Checks that an email was provided
    if (isset($_POST["email"])) {
        // Executes the sql query
        $statement = mysqli_stmt_init($conn);
        $prepare = mysqli_stmt_prepare($statement, $sql);
        mysqli_stmt_bind_param($statement, 's', htmlspecialchars($_POST["email"]));
        $success = mysqli_stmt_execute($statement);
        if ($success) {
            // Redirects back to the about us page if successful
            header("location: ../about_us.php?subscribed=true");
            
        } else {
            echo mysqli_error($conn);
        }
    }

    mysqli_close($conn);
    
?>