<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <style>
        body {
            background-image: url('https://img.freepik.com/premium-photo/medicine-bottle-white-pills-spilled-light-background-medicines-prescription-pills-flat-lay-background-white-medical-pills-tablets-spilling-out-drug-bottle_79075-22156.jpg');
            background-color: rgba(82, 81, 81, 0.45);
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .heading {
            font-size: 36px;
            color: rgb(57, 31, 57);
            margin-bottom: 20px;
            text-align: center; 
        }
        .paragraph {
            color: rgb(27, 26, 26);
            text-align: center; 
            margin-bottom: 20px; 
        }
        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .button {
            background-color: #c249a8;
            border: none;
            color: rgb(27, 26, 26);
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px 0;
            cursor: pointer;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <h1 class="heading">PharYOU</h1>
    <p class="paragraph"><b>PharYOU simplifies medication management and delivery, providing users easy access to a diverse range of pharmaceuticals. With a user-friendly interface, it allows ordering, and obtaining medication information swiftly. Integrated with reliable shipping services, PharYOU ensures timely delivery to users' doorsteps. PharYOU empowers users to manage their health confidently, offering convenience and reliability.</b></p>
    <div class="button-container">
        <form action="admin.php" method="get">
            <input type="submit" class="button" value="Admin">
        </form>
        <form action="login.php" method="get">
            <input type="submit" class="button" value="Login">
        </form>
    </div>
</body>
</html>
