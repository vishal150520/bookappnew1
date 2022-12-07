<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Admin page of free E book Download</title>
</head>
<body>
<?php
ob_start();

session_start();

include 'dbconn.php';
include 'upload.php';
$emailExists = false;
$signUp = false;
$insert = false;
$passwordMatch = false;
$loggin = false;
$passwordIncorrect = false;
$emailNotExists =false;
$adminname = false;

if(isset($_POST['create'])){
  $username = mysqli_real_escape_string($conn,$_POST['name']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);
  $cpassword = mysqli_real_escape_string($conn,$_POST['cpassword']);

  $pass = password_hash($password, PASSWORD_BCRYPT);
  $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

  $token = bin2hex(random_bytes(15));
  
  $emailquery = "select * from adminregistration where email= '$email'";
  $query = mysqli_query($conn, $emailquery);

  $eamilcount = mysqli_num_rows($query);

  if($eamilcount>0){
    $emailExists = True;
    
  }else{
    if($password === $cpassword){
      $insertquery="insert into adminregistration(username, email,password,cpassword) values('$username', '$email', '$pass','$cpass')";

      $iquery =mysqli_query($conn, $insertquery);
      if($iquery){
        $signUp = TRUE;           
      }else{
       $insert = TRUE;
      }

    }else{
      $passwordMatch =TRUE;
    }
  }
}

// for login
if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $email_search = "select * from adminregistration where email= '$email' ";
  $query = mysqli_query($conn, $email_search);

  $email_count = mysqli_num_rows($query);
  
  if($email_count){
      $user_data = mysqli_fetch_assoc($query);

      $db_pass = $user_data['password'];

      
      $pass_decode = password_verify($password,$db_pass);
      if($pass_decode){
       $_SESSION['username'] = $user_data['username'];
      $loggin = TRUE;
      header("location:admin0355.php");
     }else{
      $passwordIncorrect = TRUE;
     }
 
  }else{
    $emailNotExists = TRUE;
  }
}
if(!isset($_SESSION['username'])){
    $adminname=True;
}
echo '<nav id="stick" class="navbar navbar-expand-lg navbar-light">
<a class="navbar-brand" href="#">PDF AGILE</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="loginforadmin.php">ADMIN<span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
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
  echo 'Welcome '.$_SESSION['username'].' <a href="a_logout.php" class="btn btn-success ">Logout</a>';                 
}else{
  echo '<button class="btn btn-danger mr-2" data-toggle="modal" data-target="#loginModal">Login</button>
    <button class="btn btn-danger" data-toggle="modal" data-target="#signupModal">SignUp</button>';
  }

echo  '</div>
</nav>
    
 <!--Login Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login to PDF AGILE</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action"" method="POST">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <small id="emailHelp" class="form-text text-muted">We will never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>
                <button type="submit" name="login" class="btn btn-primary">Login</button>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
 
  <!-- SignUp Modal -->
  <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Account in PDF AGILE</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="exampleInputname">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <small id="emailHelp" class="form-text text-muted">We will never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Create Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                  <label for="exampleInputPassword1">Comfirm Password</label>
                  <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>
                <button type="submit" name="create" class="btn btn-primary">Create Account</button>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>';
 
  echo '<div class="container">';
  // alert for signUp functionality

  if($emailExists==True){
    echo ' <div class="alert alert-danger" role="alert">
      Email Id already exists.
      <button type="button" class="close" data-dismiss="alert" aria-lable="close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>';
  }
  elseif($signUp==TRUE){
    echo ' <div class="alert alert-success" role="alert">
            <strong>Success!</strong> You have signUp successfully
            <button type="button" class="close" data-dismiss="alert" aria-lable="close">
      <span aria-hidden="true">&times;</span>
      </button>
            </div>';
  
  }
  elseif($insert == TRUE){
    echo ' <div class="alert alert-danger" role="alert">
    Something went wrong.
    <button type="button" class="close" data-dismiss="alert" aria-lable="close">
  <span aria-hidden="true">&times;</span>
  </button>
    </div>';
  }
  elseif($passwordMatch == TRUE){
    echo ' <div class="alert alert-danger" role="alert">
    Password are not matching.
    <button type="button" class="close" data-dismiss="alert" aria-lable="close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }
  
  
  // alert for login function
  if($loggin==TRUE){
    echo ' <div class="alert alert-success" role="alert">
            <strong>Success!</strong> You have Login successfully
            <button type="button" class="close" data-dismiss="alert" aria-lable="close">
      <span aria-hidden="true">&times;</span>
      </button>
            </div>';
  }
  elseif($passwordIncorrect==TRUE){
    echo ' <div class="alert alert-danger" role="alert">
            <strong>Oops!</strong> Password is incorrect.
            <button type="button" class="close" data-dismiss="alert" aria-lable="close">
      <span aria-hidden="true">&times;</span>
      </button>
            </div>';
  }
  elseif($emailNotExists == TRUE){
    echo ' <div class="alert alert-danger" role="alert">
      Oops! Your email does not eixsts.
      <button type="button" class="close" data-dismiss="alert" aria-lable="close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>';
  }
  if($fupload==TRUE){
    echo ' <div class="alert alert-success" role="alert">
    <strong>Success!</strong>Files Upload successfully.
    <button type="button" class="close" data-dismiss="alert" aria-lable="close">
<span aria-hidden="true">&times;</span>
</button>
    </div>';

  }

if($adminname==TRUE){
  echo ' <div class="alert alert-danger" role="alert">
  Please login to being a admin.
  <button type="button" class="close" data-dismiss="alert" aria-lable="close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>';
}
   
?>

<script>
        let elClass = document.getElementById("stick");
        window.onscroll = () => {
            if(this.scrollY){
                elClass.classList.remove("navbar-light");
                elClass.classList.add("navbar-dark");
                elClass.classList.add("bg-dark");
                elClass.classList.add("fixed-top");

            }else{
                elClass.classList.add("navbar-light");
                elClass.classList.remove("navbar-dark");
                elClass.classList.remove("bg-dark");
                elClass.classList.remove("fixed-top");
            }
            
        }
    </script>

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