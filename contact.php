<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="css/nav.css">

    <title>contact</title>
    <style>
      body {
              font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
              background-color:#ebebeb;
          }

      html{
            scroll-behavior: smooth;
        }
        @media screen and (max-width:768px){

          .container{
            margin-top:60px;
          }
        }
    </style>
</head>

<body>
<?php

session_start();

include '_partial/dbconn.php';
include '_partial/login_signup.php';
include '_partial/nav.php';



echo '<div class="container">';
include '_partial/alert.php';

?>

        <h2>Contact Us</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Please Write Message</label>
                <textarea name="message" class="form-control"  rows="3"></textarea>
            </div>
            <button type="submit" name="send" class="btn btn-primary">Send</button>
        </form>
    </div>
    <?php
    if(isset($_POST['send'])){
      echo "pro";
      $user_email = $_POST['email'];
      // $email = "pdfagile.in@gmail.com";
      $message = $_POST['message'];

      $insertquery = "INSERT INTO `messages` ( `useremail`, `mgs`) VALUES ('$user_email', '$message')";
      

      $query = mysqli_query($conn, $insertquery);
      if($query){
        echo ' <div class="alert alert-success" role="alert">
        <strong>Success!</strong> Message sent successfully, We will respond soon!
        <button type="button" class="close" data-dismiss="alert" aria-lable="close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
      }
      else{
        echo ' <div class="alert alert-danger" role="alert">
            <strong>Oops!</strong> Something went wrong.
            <button type="button" class="close" data-dismiss="alert" aria-lable="close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
      }
  
      // $body = $user_email.$message;
  
      //   $subject = "Message from PDF Agile";
      //   $sender_email = "From: PDF AGILE";
  
      //   if(mail( $email,$subject,$body,$sender_email)){
      //       $_SESSION['msg'] = "You have send message successfully. We will respond soon.";
      //       $sending = TRUE;         
      //   }
    }



    ?>


 <div class="container">
    <p>
        <a href="#" title="Placeholder link title" class="text-decoration-none">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z"></path>
  </svg>
</a>
          +91 8127586146
      </p>

      <p>
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
          </svg>
          vikasmishra0355@gmail.com
      </p>
 </div>

<?php include 'footer.php'; ?>

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
</body>

</html>