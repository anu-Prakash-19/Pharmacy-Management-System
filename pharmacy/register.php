<!DOCTYPE html>
<html>
<head>
    <title>Sign Up Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            color: rgb(57, 31, 57);
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            width: 100%;
            text-align: center;
        }
        .button:hover {
            background-color: #945883;
        }
        @media only screen and (max-width: 600px) {
            .container {
                max-width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create New User</h1>
        <form action="" method="post">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="email">New Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="new_password">Password</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <button type="submit" class="button" name="add">Create</button>
        </form>
        <p style="text-align: center; margin-top: 20px;">Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>




<?php
include 'config.php';

if(isset($_POST['add'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $new_password = $_POST['new_password'];

    // Check if the password and new password are the same
    if ($password === $new_password) {
        try {
            // Prepare the SQL query with named placeholders
            $ins = $conn->prepare("INSERT INTO register (username, password, new_password) VALUES (?, ?, ?)");
            
            // Bind parameters to the prepared statement
            $ins->bind_param('sss', $username, $password, $new_password);
            
            // Execute the query
            if ($ins->execute()) {
                echo "Saved";
            } else {
                echo "Not Saved";
            }
        } catch(Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Error: Password and New Password must match.";
    }
}
?>
