<?php
session_start();
 require('../config/config.php');
if (isset($_POST['username']) and isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);
    $query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";

    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    if (($count == 1) && ($row[4] == 0)) {
        $_SESSION['username'] = $username;
        if ($row[5] == 2) {
            header('location:../addCard.php');
        } elseif ($row[5] == 1) {
            header('location:../csv.php');
        }
    } elseif ($row[4] == 1) {
        echo "Account disabled";
    } else {
        echo "password or username false";
    }
}
?>
<html>
<head>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

    <link rel="stylesheet" href="styles.css" >


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #eee;
        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }
        .form-signin .checkbox {
            font-weight: normal;
        }
        .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>
<body>

<form class="form-signin" method="POST" action="login.php">

    <h2 class="form-signin-heading">Please Login</h2>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">@</span>
        <input type="text" name="username" class="form-control" placeholder="Username" required>
    </div>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>

    <p>
        Not yet a member? <a href="../login/signup.php">Sign up</a>
    </p>
<!--    <a class="btn btn-lg btn-primary btn-block" href="../login/reset.php">Forget Password?Reset IT!</a>-->
</form>
</body>
</html>