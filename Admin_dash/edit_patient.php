<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM patients WHERE id=$id");
    $patient = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $medical_history = $_POST['medical_history'];

    $query = "UPDATE patients SET first_name='$first_name', last_name='$last_name', phone='$phone', 
              email='$email', address='$address', medical_history='$medical_history' WHERE id=$id";
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
    <title>Edit Patient</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Edit Patient</h1>
        <form action="edit_patient.php?id=<?php echo $patient['id']; ?>" method="POST">
            <input type="text" name="first_name" value="<?php echo $patient['first_name']; ?>" required>
            <input type="text" name="last_name" value="<?php echo $patient['last_name']; ?>" required>
            <input type="text" name="phone" value="<?php echo $patient['phone']; ?>" required>
            <input type="email" name="email" value="<?php echo $patient['email']; ?>" required>
            <textarea name="address" required><?php echo $patient['address']; ?></textarea>
            <textarea name="medical_history" required><?php echo $patient['medical_history']; ?></textarea>
            <button type="submit">Update Patient</button>
        </form>
    </div>
</body>
</html>
