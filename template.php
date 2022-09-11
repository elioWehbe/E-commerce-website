<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo  $title?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
    <link rel="stylesheet" type="text/css" href="Style/stylesheet.css">
<!--    <script>-->
<!--        $(document).ready(function() {-->
<!---->
<!--            if ((screen.width>1024)) {-->
<!---->
<!--                $(".sidenav").hide();-->
<!--            }-->
<!--            else((screen.width<=1024))  {-->
<!---->
<!--                $(".sidenav").show();-->
<!--            }-->
<!--        });-->
<!---->
<!---->
<!--    </script>-->
</head>
<body>
<div class="header">
    <div class="progress-container">
        <div class="progress-bar" id="myBar"></div>
    </div>
</div>
<div class="jumbotron">

    <div class="container text-center">
        <h1>MyCoffee</h1>
        <p>Best Coffee</p>
    </div>
</div>




    <nav class="navbar navbar-expand-md bg-brown navbar-dark">

        <a class="navbar-brand" href="index.php">Home</a>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class='collapse navbar-collapse' id='collapsibleNavbar'>
            <ul class='navbar-nav'>
                <li class='nav-item'>
                    <a class='nav-link' href='coffee.php'>Coffee</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='login/login.php'>Shop</a>
                </li>
                <li class='nav-item'>
                  <a class='nav-link' href='login/login.php'>Login</a>

                <li class='nav-item'>
                    <a class='nav-link' href='#'>About</a>
                </li>
            </ul>






    </nav>
<div class="row">
<div class="col-sm-12">
    <div class='content_area'>

        <?php  echo $content; ?>

    </div>
</div>
<!--    <div class="col-sm-2 sidenav" id="side" >-->
<!---->
<!--    </div>-->
    </div>
    <div>
    <footer class="container-fluid">
        <ul class="social-network social-circle">

            <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#" class="icoInstagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>
        </ul>
    </footer>
    </div>
</body>
<script>
    window.onscroll = function() {myFunction()};

    function myFunction() {
        var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        var scrolled = (winScroll / height) * 100;
        document.getElementById("myBar").style.width = scrolled + "%";
    }
</script>
</html>

