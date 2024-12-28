<?php
include 'db.php'; // Include database connection

// Fetch total counts
$totalPatients = $conn->query("SELECT COUNT(*) AS count FROM patients")->fetch_assoc()['count'];
$totalDoctors = $conn->query("SELECT COUNT(*) AS count FROM doctors")->fetch_assoc()['count'];
$totalWards = $conn->query("SELECT COUNT(*) AS count FROM wards")->fetch_assoc()['count'];

// Fetch appointments
$appointments = $conn->query("SELECT first_name, last_name, date, status FROM appointments");

// Fetch doctors
$doctors = $conn->query("SELECT id, name, mobile, address, consultancy_charge, education, dob, status FROM doctors");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your external CSS -->
</head>
<body>
    <aside class="sidebar">
        <h2>Hospital Admin</h2>
        <ul>
            <li><a href="#" class="active">Dashboard</a></li>
            <li><a href="#">Staff</a></li>
            <li><a href="#">Patients</a></li>
            <li><a href="#">Appointments</a></li>
        </ul>
    </aside>

    <main>
        <header>
            <h1>Admin Dashboard</h1>
        </header>

        <!-- Overview Section -->
        <section class="stats">
            <div class="card">
                <h3>Total Patients</h3>
                <p><?php echo $totalPatients; ?></p>
            </div>
            <div class="card">
                <h3>Total Doctors</h3>
                <p><?php echo $totalDoctors; ?></p>
            </div>
            <div class="card">
                <h3>Total Wards</h3>
                <p><?php echo $totalWards; ?></p>
            </div>
        </section>

        <!-- Appointments Section -->
        <section class="tables">
            <h2>Appointments</h2>
            <table>
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $appointments->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <h2>Doctors</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Consultancy Charge</th>
                        <th>Education</th>
                        <th>DOB</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $doctors->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['mobile']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['consultancy_charge']; ?></td>
                            <td><?php echo $row['education']; ?></td>
                            <td><?php echo $row['dob']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
