<!DOCTYPE html>
<html>
<head>
    <title>Thank You Page</title>
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
            margin: auto;
            padding: 20px;
            background-color: rgba(235, 145, 215, 0.7);
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        h1 {
            color: rgb(57, 31, 57);
            margin-bottom: 20px;
        }
        .thank-you-animation {
            margin-bottom: 20px;
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
        /* Animation */
        @keyframes takeOrder {
            0% {
                transform: translateY(-50px) scale(0);
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
            100% {
                transform: translateY(0) scale(1);
            }
        }
        .thank-you-text {
            animation: takeOrder 1s ease-in-out;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="thank-you-animation">
            <h1 class="thank-you-text">PharYOU Thanks You</h1>
        </div>
        <br/>
        <p>Your order has been successfully placed.</p>
        <p>We are processing it with care.</p>
        <button class="button" onclick="window.location.href='prescription.php'">Place Another Order</button>
        <button class="button" onclick="window.location.href='generate_bill.php?<?php if(isset($_GET['patient_id'])) echo 'patient_id=' . $_GET['patient_id']; ?>'">Get Your Bill</button>
        <button class="button" onclick="window.location.href='home.php'">Back</button>
    </div>
</body>
</html>
