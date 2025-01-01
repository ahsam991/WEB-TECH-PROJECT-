<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $specialty = $_POST['specialty'];
    $hospital_location = $_POST['hospital_location'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];

    $query = "INSERT INTO doctors (name, phone, specialty, hospital_location, dob, gender, email) 
              VALUES ('$name', '$phone', '$specialty', '$hospital_location', '$dob', '$gender', '$email')";
    if (mysqli_query($conn, $query)) {
        header('Location: index.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Add Doctor</h1>
        <form action="add_user.php" method="POST">
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="phone" placeholder="Phone" required>
            <input type="text" name="specialty" placeholder="Specialty" required>
            <input type="text" name="hospital_location" placeholder="Hospital Location" required>
            <input type="date" name="dob" placeholder="Date of Birth" required>
            <select name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit">Add Doctor</button>
        </form>
    </div>
</body>
</html>
