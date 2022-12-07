<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>about us</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/nav.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color:#ebebeb;
        }
        html{
            scroll-behavior: smooth;
        }
        
        .head-tit img{
          width: 320px;
        }
       
    </style>
</head>

<body>

<?php

session_start();

include '_partial/dbconn.php';
include '_partial/login_signup.php';
include '_partial/nav.php';    
include '_partial/alert.php';

?>


<div class="head-tit d-flex flex-wrap">
  <p class="lead m-4"> We provide you pdf of books absolute free of cost. <br> You can choose diffrent catogories of books according to your choice. <br> <b><i>We wil happy to got you happy!</i></b></p>
  
  <img src="Image/book-open-pages-with-text-textbook-paper-notepad-with-bookmark_212005-165.jpg" class="rounded m-2" alt="image"> 
</div>


    <h2 style="clear: both;text-align: center;">Our Facilities :</h2><br>
    <hr>
    <br>
    <div class="container align-content-center">
    <div class="row">
        <div class="card col-xl-4 col-sm-4">
        <div class="card-header"><strong>Free E-Book :</strong></div>
            <P>Generally there is a cost to e-book. Therefore, we have decided to provide free e-book while understanding your problem. Now you do not need to give cost to download PDF of books. Here you are being given a free of cost pdf.</P>
        </div>

        <div class="card col-xl-4 col-sm-4 ">
        <div class="card-header"><strong>Free Audible Book :</strong></div>
            <P>Nowadays people do not have time to read the bulk of pages of books.
            The books are being sold in mp3 format in the market. Users have to pay its price. We have decided to soon give free Audible book to solve it.
            </P>
        </div>

        <div class="card col-xl-3 col-sm-4">
        <div class="card-header"><strong>Genuine Content:</strong></div>
            <P>We are in effort to provide our users also provocers of genuine ideas and content. Soon you will be given good ideas and suggestion here.</P>
        </div>
        
      </div>

      <buttton class="btn btn-primary m-3 " onClick="devinfo()">Developer Info</buttton>
      <div class="container">
        <div id="developers" style="display:none;">
      <div class="card-header"><h1 class="lead">Vikas Mishra</h1></div>
      <div class="card card-body">
        Developer of Pdf Agile, Vikas Mishra has been working on web applications since 2019, focusing on frontend and backend development. Mr. Mishra is known for reading books. He faced many problem for reading books, that's why decided to build a best website to download E book.
        He design frontend of  Pdf Agile and build backend logic also.

      </div>
        

        <div class="card-header mt-4"><h1 class="lead">Tushar Sahu</h1></div>
        <div class="card card-body">

        </div>
        </div>
      </div>



    </div>

    <div class="container my-3">
    <h2>Contact Us</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Please Write Message</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="button" onClick="msg()" class="btn btn-primary">Send</button>
        </form>
    </div>
    


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
    
    </div>

   <?php include 'footer.php'; ?>
    
    <script src="js/index.js"></script>
    <script>
      function devinfo(){
    document.getElementById('developers').style.display = "block";
}
        function msg(){
          document.getElementById("show").style.display = "block";          
        }
        
    </script>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>
</body>

</html>