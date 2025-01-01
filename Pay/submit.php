<?php

// Database configuration
$conn = mysqli_connect('127.0.0.1', 'root', '', 'bKashDB');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mobile = $_POST['mobile'];

    // Validate the mobile number
    if (preg_match('/^01[3-9][0-9]{8}$/', $mobile)) {
        // Insert the mobile number into the database
        $sql = "INSERT INTO users (id, name, mobile_number) VALUES ('', '', '$mobile')";

        if (mysqli_query($conn, $sql)) {
            echo "<h3>Mobile number saved successfully!</h3>";
        } else {
            echo "<h3>Error: " . mysqli_error($conn) . "</h3>";
        }
    } else {
        echo "<h3>Invalid mobile number. Please try again.</h3>";
    }
}

mysqli_close($conn);
?>
