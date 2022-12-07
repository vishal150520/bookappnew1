<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Free E book Download in pdf</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
<div class="pre-loader">
        <div class="sk-fading-circle">
            <div class="sk-circle1 sk-circle"></div>
            <div class="sk-circle2 sk-circle"></div>
            <div class="sk-circle3 sk-circle"></div>
            <div class="sk-circle4 sk-circle"></div>
            <div class="sk-circle5 sk-circle"></div>
            <div class="sk-circle6 sk-circle"></div>
            <div class="sk-circle7 sk-circle"></div>
            <div class="sk-circle8 sk-circle"></div>
            <div class="sk-circle9 sk-circle"></div>
            <div class="sk-circle10 sk-circle"></div>
            <div class="sk-circle11 sk-circle"></div>
            <div class="sk-circle12 sk-circle"></div>
        </div>
    </div>
<?php
ob_start();

session_start();

include '_partial/dbconn.php';
include '_partial/login_signup.php';
include '_partial/_login_signup_modals.php';


echo '<nav id="stick" class="navbar navbar-expand-lg navbar-light">
<a class="navbar-brand" href="#">PDF AGILE</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" href="index.php">HOME<span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item  active">
      <a class="nav-link" href="download.php">DOWNLOAD</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">ABOUT</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contact.php">CONTACT</a>
    </li>
  </ul>';
if(isset($_SESSION['username'])){
  echo 'Welcome '.$_SESSION['username'].' <a href="_logout.php" class="btn btn-success ml-1">Logout</a>';                 
}else{
  echo '<button class="btn btn-danger mr-2" data-toggle="modal" data-target="#loginModal">Login</button>
    <button class="btn btn-danger" data-toggle="modal" data-target="#signupModal">SignUp</button>';
  }

echo  '</div>
</nav>';
 
  echo '<div class="container">';
  include '_partial/alert.php';  
?>
 <div class="footer">
        <h4>PDF AGILE</h4>
        <p>© 2021 All rights reserved</p>
    </div>
   <script src="js/index.js"></script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        (function ($) {
            'use strict';
            $(window).on('load', function () {
                if ($(".pre-loader").length > 0) {
                    $(".pre-loader").fadeOut("slow");
                }
            });
        })(jQuery)
    </script>

</body>

</html>