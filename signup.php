<?php
session_start();
	
	//require_once "config.php";
    include("config.php");
    include("functions.php");

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email = $_POST["email"];
        $password = $_POST["password"];

        if(!empty($email) && !empty($password))
        {
            // save to our DB
            $user_id = random_num(42);
            $query = "INSERT INTO users (user_id, email, password) values ('$user_id', '$email', '$password')";

            // perform the query
            mysqli_query($link, $query);

            // Redirect to login if no db entry found
            header("Location: login.php");
            die;
        } else 
        {
            echo "Please check the information you provided!";
        }
        
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up - Taxecure</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        a {
            text-decoration: none;
            color: #333;
        }

        a:hover {
            color: orange;
        }

        .signin {
            background-color: lightgray;
            padding: 20px;
            width: 420px;
            margin: auto;
            margin-top: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .col1,
        .col2 {
            width: 80%;
            margin: 0 auto;
            border-radius: 5px;
            padding: 10px;
            background-color: gray;
            color: white;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        .col1 label,
        .col2 label {
            display: block;
            margin-bottom: 5px;
        }

        .col1 input,
        .col2 input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .submitBtn {
            height: 35px;
            padding: 10px;
            width: 80%;
            margin: 0 auto;
            color: white;
            background-color: orange;
            border-radius: 5px;
            display: block;
        }

        #login-form {
            font-size: 20px;
            margin: 10px;
            color: #333;
        }

        hr {
            border: 1px solid #ddd;
        }

        .signup-link {
            text-align: center;
        }
    </style>
</head>

<body>
	<div class="signin">
        <form id="login-form" method="post">
            <h2>Sign Up!</h2>
            <div class="col1">
                <label for="user">Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="col2">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <input class="submitBtn" type="submit" value="sign me up!!">
                <hr>
                <p class="signup-link"><a href="login.php">Login</a></p>
            </div>
        </form>
    </div>
</body>

</html>


