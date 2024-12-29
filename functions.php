<?php
// Database Connection
function getDbConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "admin_dashboard";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Fetch Users
function getUsers($conn) {
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Edit User
function editUser($conn, $data) {
    $sql = "UPDATE users SET 
            first_name=?, 
            last_name=?, 
            phone=?, 
            date_of_birth=?, 
            gender=?, 
            email=?, 
            address=?, 
            medical_history=?, 
            nid=? 
            WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssssi",
        $data['first_name'],
        $data['last_name'],
        $data['phone'],
        $data['date_of_birth'],
        $data['gender'],
        $data['email'],
        $data['address'],
        $data['medical_history'],
        $data['nid'],
        $data['id']
    );
    $stmt->execute();
}

// Delete User
function deleteUser($conn, $id) {
    $sql = "DELETE FROM users WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
?>
