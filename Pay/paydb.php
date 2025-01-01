<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pay";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip_code = $_POST['zip_code'];
    $name_on_card = $_POST['name_on_card'];
    $card_number = $_POST['card_number'];
    $exp_month = $_POST['exp_month'];
    $exp_year = $_POST['exp_year'];
    $cvv = $_POST['cvv'];

    $sql = "INSERT INTO pay (full_name, email, address, city, state, zip_code, name_on_card, card_number, exp_month, exp_year, cvv) 
            VALUES ('$full_name', '$email', '$address', '$city', '$state', '$zip_code', '$name_on_card', '$card_number', '$exp_month', '$exp_year', '$cvv')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>