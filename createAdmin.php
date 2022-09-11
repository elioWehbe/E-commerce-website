<?php
include ('config/config.php');
$username = "";
$email    = "";
$errors="";
if(isset($_POST['username'])) {

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password1 = mysqli_real_escape_string($con, $_POST['password']);
    $password2 = mysqli_real_escape_string($con, $_POST['password2']);

    if ($password1 = $password2) {
        echo "hello";
        $userCheckQuery = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($con, $userCheckQuery);
        $user = mysqli_fetch_assoc($result);
        if ($user) {
            if ($user['userName'] === $username) {
                echo "Username already exists";
            }
            if ($user['email'] === $email) {
                echo "email already exists";
            }
        }
        elseif(!$user){
            $hashed_password = md5($password1);
            $query = "INSERT INTO `user` (userName,password,email,disabled,userTypeId) values ('$username','$hashed_password','$email',0,1)";

            mysqli_query($con, $query);

            echo "Inserted successfully";
            $_SESSION['username'] == $username;
            header('location:csv.php');

        } else {
            echo "Error: " . "cannot insert user" . "<br>" . mysqli_error($con);
        }
        mysqli_close($con);
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
    <style type="text/css">
        y {
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
    </style>
</head>
<class="container">
<form class="form-signin" action="createAdmin.php" method="POST">

    <h2 class="form-signin-heading">Add an admin!</h2>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">@</span>
        <input type="text" name="username" class="form-control" placeholder="Username" required>
    </div>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <input type="password" name="password2" id="inputPassword2" class="form-control" placeholder="Confirm Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>

</form>
</html>