<?php
include ("../config/config.php");
include ("../login/dom.php");

$username = "";
$email    = "";

if(isset($_POST['username'])) {

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password1 = mysqli_real_escape_string($con, $_POST['password']);
    $password2 = mysqli_real_escape_string($con, $_POST['password2']);

    if ($password1 = $password2) {

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
            $query = "INSERT INTO `user` (userName,password,email,disabled,userTypeId) values ('$username','$hashed_password','$email',0,2)";

            mysqli_query($con, $query);

            echo "Inserted successfully";
            $_SESSION['username'] == $username;
            header('location:login.php');

        } else {
            echo "Error: " . "cannot insert user" . "<br>" . mysqli_error($con);
        }
        mysqli_close($con);
    }
}

?>


</html>