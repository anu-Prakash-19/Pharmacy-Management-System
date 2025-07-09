<!DOCTYPE html>
<html>
<head>
    <title>Admin Pannel Page</title>
    <style>
        body {
            background-color: #eb91d7;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://img.freepik.com/premium-photo/medicine-bottle-white-pills-spilled-light-background-medicines-prescription-pills-flat-lay-background-white-medical-pills-tablets-spilling-out-drug-bottle_79075-22156.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(235, 145, 215, 0.7);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: rgb(57, 31, 57);
            margin-bottom: 20px;
        }
        .section {
            margin-bottom: 30px;
        }
        .section-title {
            font-size: 24px;
            margin-bottom: 10px;
            color: rgb(57, 31, 57);
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }
        .data-table th, .data-table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        .data-table th {
            background-color: #f2f2f2;
        }
        .button {
            background-color: #eb91d7;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px; /* Add margin at the top */
        }
        .button:hover {
            background-color: #401d36;
        }
        /* Responsive styles */
        @media only screen and (max-width: 600px) {
            .container {
                padding: 10px;
            }
            .button {
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Panel</h1>
      
        <div class="section">
            <h2 class="section-title">Patients</h2>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Number of Patients</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'config.php';

                    //patients 
                    $result = $conn->query("SELECT COUNT(*) AS total_patients FROM patient");
                    $row = $result->fetch_assoc();
                    ?>
                    <tr>
                        <td><?php echo $row['total_patients']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="section">
            <h2 class="section-title">Doctors</h2>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Number of Doctors</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // doctors
                    $result = $conn->query("SELECT COUNT(*) AS total_doctors FROM doctor");
                    $row = $result->fetch_assoc();
                    ?>
                    <tr>
                        <td><?php echo $row['total_doctors']; ?></td>
                    </tr>
                </tbody>
            </table>
    </div>

        <div class="section">
            <h2 class="section-title">Medications</h2>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Number of Medications</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //medications
                    $result = $conn->query("SELECT COUNT(*) AS total_medications FROM medication");
                    $row = $result->fetch_assoc();
                    ?>
                    <tr>
                        <td><?php echo $row['total_medications']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="section">
            <h2 class="section-title">Payment Details</h2>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Total Payments</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // payments
                    $result = $conn->query("SELECT SUM(medication_cost) AS total_payments FROM medication");
                    $row = $result->fetch_assoc();
                    ?>
                    <tr>
                        <td>Rs.<?php echo $row['total_payments']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <button class="button" onclick="window.location.href='home.php'">Go Back to Home</button>
    </div>

    <?php
    $conn->close(); 
    ?>
</body>
</html>