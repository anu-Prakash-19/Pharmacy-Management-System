<!DOCTYPE html>
<html>
<head>
    <title>Order Page</title>
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
        .input-group {
            margin-bottom: 20px;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: rgb(57, 31, 57);
        }
        .input-group input,
        .input-group select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
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
            margin-top: 20px;
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
        <h1>Place Your Order</h1>
        <form action="" method="post">
            <div class="input-group">
                <label for="patientId">Patient ID</label>
                <input type="text" id="patientId" name="patient_id" required>
            </div>
            <div class="input-group">
                <label for="paymentName">Payment Name</label>
                <input type="text" id="paymentName" name="payment_name" required>
            </div>
            <button class="button" type="submit" name="submit_order">Confirm Your Order</button>
        </form>
    </div>

    <?php

include 'config.php'; 


if(isset($_POST['submit_order'])) {
    $patient_id = $_POST['patient_id'];
    
    $payment_name = $_POST['payment_name'];

    // Insert order into database
    $sql = "INSERT INTO payment (patient_id, payment_name) VALUES ('$patient_id','$payment_name')";
    if($conn->query($sql) === TRUE) {
        // Redirect to thank.php
        $select_query = $conn->query("SELECT max(payment_id) FROM payment");
        $result = $select_query->fetch_assoc();

        $max_payment_id = $result['max_payment_id'];
        // Extract the max payment ID

        // setcookie ("payment_id",$max_payment_id, time() + 86400, "/");
        // Set the cookie
        // setcookie("payment_id",$select_query);
        header("Location: thank.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close(); 
?>
