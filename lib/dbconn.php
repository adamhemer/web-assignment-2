<?php

// Defining database credentials
define("DB_HOST", "localhost");
define("DB_NAME", "dsa");
define("DB_USER", "dbadmin");
define("DB_PASS", "");

// Attempting to connect to the database
$conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Error checking
if (!$conn) {
    echo "Error: Unable to connect to database.<br>";
    echo "Debugging errno: " . mysqli_connect_errno() . "<br>";
    echo "Debugging error: " . mysqli_connect_error() . "<br>";
    exit;
}
