<!DOCTYPE html>
<html>
<head>
    <title>Admin Login Page</title>
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
        <h1>Admin Login</h1>
        <form action="" method="post"> 
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button class="button" type="submit" name="add">Login</button> 
        </form>
    </div>
</body>
</html>
<?php
include 'config.php'; // database connection configuration

if(isset($_POST['add'])) {
    // Check if both username and password fields are filled
    if(!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Prepare and execute the SQL query for admin table
        $sel_admin = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
        $sel_admin->bind_param('ss', $username, $password);
        $sel_admin->execute();
        
        // Check for errors in admin table query
        if (!$sel_admin) {
            echo "Error: " . $conn->error;
        } else {
            // Store the result set
            $sel_admin->store_result();
            
            // Get the number of rows
            $num_rows_admin = $sel_admin->num_rows;
            
            // Check if there is a matching record in admin table
            if($num_rows_admin > 0) {
                // Redirect to the admin page if login is successful
                header("Location: Apannel.php");
                exit();
            } else {
                // Display error message if login fails
                echo 'Invalid username or password.';
            }
        }
    } else {
        echo 'Please enter both username and password.';
    }
}
?>
