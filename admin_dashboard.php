<?php
include 'functions.php';

$conn = getDbConnection();

// Handle POST Requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['edit_user'])) {
        $data = [
            'id' => $_POST['id'],
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'phone' => $_POST['phone'],
            'date_of_birth' => $_POST['date_of_birth'],
            'gender' => $_POST['gender'],
            'email' => $_POST['email'],
            'address' => $_POST['address'],
            'medical_history' => $_POST['medical_history'],
            'nid' => $_POST['nid'],
        ];
        editUser($conn, $data);
        header("Location: admin_dashboard.php");
    } elseif (isset($_POST['delete_user'])) {
        $id = $_POST['id'];
        deleteUser($conn, $id);
        header("Location: admin_dashboard.php");
    }
}

// Fetch Users
$users = getUsers($conn);
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Medical History</th>
                    <th>NID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['first_name'] ?></td>
                        <td><?= $user['last_name'] ?></td>
                        <td><?= $user['phone'] ?></td>
                        <td><?= $user['date_of_birth'] ?></td>
                        <td><?= $user['gender'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['address'] ?></td>
                        <td><?= $user['medical_history'] ?></td>
                        <td><?= $user['nid'] ?></td>
                        <td class="action-buttons">
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                <button name="edit_user" class="edit-button">Edit</button>
                            </form>
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                <button name="delete_user" class="delete-button">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
