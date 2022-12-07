<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Messages from users</title>
  </head>
  <body>
    <?php

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
      <a class="nav-link" href="Xm89Et.php">ADMIN-Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="index.php">HOME<span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="download.php">DOWNLOAD</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">ABOUT</a>
    </li>
    <li class="nav-item active">
    <a class="nav-link" href="Xm89Etmessages.php">MESSAGES</a>
    </li>
  </ul>';
if(isset($_SESSION['username'])){
  echo 'Welcome '.$_SESSION['username'].' <a href="admin_logout.php" class="btn btn-success ml-1">Logout</a>';                 
}else{
  echo '<button class="btn btn-danger mr-2" data-toggle="modal" data-target="#loginModal">Login</button>
    <button class="btn btn-danger" data-toggle="modal" data-target="#signupModal">SignUp</button>';
  }

echo  '</div>
</nav>';
    ?>

    <div class="container">
      <center><h3 class="m-2">Messages From Users</h3></center>
      <?php
      $selectquery = "SELECT * FROM `messages`";
      $query = mysqli_query($conn, $selectquery);

      while($result = mysqli_fetch_array($query)){
        ?>
      <div class="card">
        <div class="card-header"><strong>
            <?php echo $result['useremail']; ?>
          </strong></div>
        <div class="card-body"><?php echo $result['mgs']; ?></div>
        <div class="card-footer">
          <p><?php echo $result['timestamp']; ?></p>
        </div>
      </div>
      <?php
}

      ?>
    </div>

    
         

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>