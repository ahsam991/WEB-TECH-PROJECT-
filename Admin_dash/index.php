<?php
include('config.php'); // Ensure this connects to your database properly

// Fetch all patient data
$patients = mysqli_query($conn, "SELECT * FROM patients");

// Fetch all doctor data
$doctors = mysqli_query($conn, "SELECT * FROM doctors");

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
        
        <!-- Patients Section -->
        <section>
            <h2>Patients</h2>
            <table border="1" cellpadding="10" cellspacing="0">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>NID</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Medical History</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($patient = mysqli_fetch_assoc($patients)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($patient['first_name']); ?></td>
                        <td><?php echo htmlspecialchars($patient['last_name']); ?></td>
                        <td><?php echo htmlspecialchars($patient['phone']); ?></td>
                        <td><?php echo htmlspecialchars($patient['nid']); ?></td>
                        <td><?php echo htmlspecialchars($patient['email']); ?></td>
                        <td><?php echo htmlspecialchars($patient['date_of_birth']); ?></td>
                        <td><?php echo htmlspecialchars($patient['gender']); ?></td>
                        <td><?php echo htmlspecialchars($patient['address']); ?></td>
                        <td><?php echo htmlspecialchars($patient['medical_history']); ?></td>
                        <td>
                            <a href="edit_patient.php?id=<?php echo $patient['id']; ?>">Edit</a> |
                            <a href="delete_patient.php?id=<?php echo $patient['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>

        <!-- Doctors Section -->
        <section>
            <h2>Doctors</h2>
            <table border="1" cellpadding="10" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Specialty</th>
                        <th>Hospital Location</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($doctor = mysqli_fetch_assoc($doctors)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($doctor['name']); ?></td>
                        <td><?php echo htmlspecialchars($doctor['phone']); ?></td>
                        <td><?php echo htmlspecialchars($doctor['specialty']); ?></td>
                        <td><?php echo htmlspecialchars($doctor['hospital_location']); ?></td>
                        <td><?php echo htmlspecialchars($doctor['date_of_birth']); ?></td>
                        <td><?php echo htmlspecialchars($doctor['gender']); ?></td>
                        <td><?php echo htmlspecialchars($doctor['email']); ?></td>
                        <td>
                            <a href="edit_doctor.php?id=<?php echo $doctor['id']; ?>">Edit</a> |
                            <a href="delete_doctor.php?id=<?php echo $doctor['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>

        <!-- Add User Section -->
        <section>
            <a href="add_user.php" class="btn-add-user">Add User</a>
        </section>
    </div>
</body>
</html>
