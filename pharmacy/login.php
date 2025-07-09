<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
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
            max-width: 400px;
            margin: 100px auto;
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
        .input-group input {
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
            width: 100%;
            text-align: center;
        }
        .button:hover {
            background-color: #401d36;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button class="button" name="add">Login</button>
        </form>
        <button class="button" onclick="window.location.href='register.php'">Create an account</button>
    </div>
</body>
</html>

<?php
session_start();
include 'config.php'; // database connection configuration

if(isset($_POST['add'])) {
    // Check if both username and password fields are filled
    if(!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Prepare and execute the SQL query for login table
        $sel_login = $conn->prepare("SELECT * FROM login WHERE username = ? AND password = ?");
        $sel_login->bind_param('ss', $username, $password);
        $sel_login->execute();
        
        // Check for errors in login table query
        if (!$sel_login) {
            echo "Error: " . $conn->error;
        } else {
            // Store the result set
            $sel_login->store_result();
            
            // Get the number of rows
            $num_rows_login = $sel_login->num_rows;
            
            // Prepare and execute the SQL query for register table
            $sel_register = $conn->prepare("SELECT * FROM register WHERE username = ? AND password = ?");
            $sel_register->bind_param('ss', $username, $password);
            $sel_register->execute();
            
            // Check for errors in register table query
            if (!$sel_register) {
                echo "Error: " . $conn->error;
            } else {
                // Store the result set
                $sel_register->store_result();
                
                // Get the number of rows
                $num_rows_register = $sel_register->num_rows;
                
                // Check if there is a matching record in login table
                if($num_rows_login > 0) {
                    // Redirect to the next page if login is successful
                    header("Location: prescription.php");
                    exit();
                } 
                // Check if there is a matching record in register table
                elseif ($num_rows_register > 0) {
                    // Redirect to the next page if login is successful
                    header("Location: prescription.php");
                    exit();
                }
                // Display error message if login fails
                else {
                    echo 'Invalid username or password.';
                }
            }
        }
    } else {
        echo 'Please enter both username and password.';
    }
}
?>
