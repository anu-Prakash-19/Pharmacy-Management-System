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
            <!-- <div class="input-group">
                <label for="prescriptionId">Prescription ID</label>
                <input type="text" id="prescriptionId" name="prescription_id" required>
            </div> -->
            <div class="input-group">
                <label for="patientId">Patient ID</label>
                <input type="text" id="patientId" name="patient_id" required>
            </div>
            <div class="input-group">
                <label for="doctorId">Doctor ID</label>
                <input type="text" id="doctorId" name="doc_id" required>
            </div>
            <div class="input-group">
                <label for="quantity">Dosage (mg)</label>
                <input type="number" id="quantity" name="quantity" required>
            </div>
            <div class="input-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="input-group">
                <label for="medication">Medication</label>
                <select id="medication" name="medication_name">
                    <option value="Medicine A">Medicine A</option>
                    <option value="Medicine B">Medicine B</option>
                    <option value="Medicine C">Medicine C</option>
                    <option value="Medicine D">Medicine D</option>
                    <option value="Medicine E">Medicine E</option>
                    <option value="Medicine F">Medicine F</option>
                    <option value="Medicine F">Medicine G</option>
                    <option value="Medicine F">Medicine H</option>
                </select>
            </div>
        <!-- Button to go back to the admin panel -->
            <button class="button" type="submit" onclick="window.location.href='payment.php'">Place Your Order</button>
        </form>
    </div>
</body>
</html>
<?php
include 'config.php'; // Include the database connection
include 'Logger.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    // $prescription_id = $_POST['prescription_id'];
    $patient_id = $_POST['patient_id'];
    $doc_id = $_POST['doc_id'];
    $quantity = $_POST['quantity'];
    $date = $_POST['date'];
    $medication_name = $_POST['medication_name'];
    $patient_id_global=$patient_id;
    

    try {
        // Start a transaction
        $conn->begin_transaction();
        $_SESSION["patient_id"] = $patient_id;
        // Prepare and execute SQL query to insert data into prescription table
        $insert_query = $conn->prepare("INSERT INTO prescription ( patient_id, doc_id, quantity, date, medication_name) VALUES ( ?, ?, ?, ?, ?)");

        if (!$insert_query) {
            throw new Exception("Prepare failed: (" . $conn->errno . ") " . $conn->error);
        }
        // $medicine_row='';
        $select_query = $conn->query("SELECT * FROM medication WHERE medication_name = '$medication_name'");

        // $select_query->execute();
        if($select_query->fetch_array()['availability'] <  $quantity)
        {
            // throw new Exception("Quoted medicine dosage exceeded the availability in pharmacy " . $insert_query->error);
            echo "<script>window.location.href = 'landing_exceeded_quantity.php';</script>";
                exit(); // Make sure to exit after redirection
        }

        // Bind parameters to the query
        $insert_query->bind_param("sssss",  $patient_id, $doc_id, $quantity, $date, $medication_name);

        // Execute the query
        if ($insert_query->execute()) {
            // Execute trigger logic to update availability in medication table
            // $update_query = $conn->query("UPDATE medication SET availability = availability - $quantity WHERE medication_name = '$medication_name'");

           $update_query=1;
            if ($update_query) {
                // Commit the transaction
                $conn->commit();
                

                echo "<script>window.location.href = 'payment.php';</script>";
                exit(); // Make sure to exit after redirection
            } 
            // else {
            //     throw new Exception("Error updating medication availability: " . $conn->error);
            // }
        } else {
            throw new Exception("Error inserting prescription: " . $insert_query->error);
        }

        // Close the prepared statement
        $insert_query->close();
    } catch (Exception $e) {
        // Rollback the transaction
        $conn->rollback();

        // Handle the exception
        echo "Error: " . $e->getMessage();
    }
}
?>
