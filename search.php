<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <?php
        $q = $_GET['q'];
        echo '<title>'.$q.'- pdfagile search</title>';
        ?>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/nav.css">
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
include '_partial/nav.php';
?>  

<div class="container">
    <div class="container searchResult" style="margin-top:70px;">
        <?php
        include "_partial/dbconn.php";
        // $q = $_GET['q'];
        echo '<h3>Search Results For '.$q.'</h3>

        <div class="row">';
       $matchquery = "SELECT * FROM `books` where match (bookname) against('$q')";
  
       $query = mysqli_query($conn,$matchquery);
      //  $result = mysqli_fetch_array($query)
  
      while($result = mysqli_fetch_assoc($query)){
          ?>
          <div class="card b-card">
            <div class="card-header text-truncate"><strong><?php echo $result['bookname']; ?></strong></div>
            <div class="card-body"><img src="<?php echo $result['pic'] ?>" height="310" width="260" alt=""></div>
            <div class="card-footer d-flex justify-content-center align-items-center">
            <a class="btn btn-outline-primary m-1 " href="read.php?r=<?php echo $result['pdf'];?>" target="blank" role="button">View</a>
          <a href="pdfdownload.php?id=<?php echo $result['id']; ?>" class="btn btn-outline-info m-1" role="button">Download</a>
          </div>
          </div>
  <?php
  }
  
       
   echo ' </div>
</div>';

include 'footer.php';
  ?>                      




    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>


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