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

include '_partial/dbconn.php';
include '_partial/upload.php';
include '_partial/_login_signup_modals.php';
$emailExists = false;
$signUp = false;
$insert = TRUE;
$passwordMatch = TRUE;
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
       $insert = false;
      }

    }else{
      $passwordMatch =false;
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
      
     }else{
      $passwordIncorrect = TRUE;
     }
 
  }else{
    $emailNotExists = TRUE;
  }
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
      <a class="nav-link" href="Xm89Et.php">ADMIN-Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="index.php">HOME<span class="sr-only">(current)</span></a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="about.php">ABOUT</a>
    </li>';
    
if(isset($_SESSION['username'])){
  echo '<li class="nav-item">
    <a class="nav-link" href="Xm89Etmessages.php">MESSAGES</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="_partial/pending_book.php">Pending Books<span class="sr-only">(current)</span></a>
    </li>
  </ul>';
  echo 'Welcome '.$_SESSION['username'].' <a href="admin_logout.php" class="btn btn-success ml-1">Logout</a>';                 
}else{
  echo '<button class="btn btn-danger mr-2" data-toggle="modal" data-target="#loginModal">Login</button>
    <button class="btn btn-danger" data-toggle="modal" data-target="#signupModal">SignUp</button>';
  }

echo  '</div>
</nav>';
 
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
  elseif($insert == false){
    echo ' <div class="alert alert-danger" role="alert">
    Something went wrong.
    <button type="button" class="close" data-dismiss="alert" aria-lable="close">
  <span aria-hidden="true">&times;</span>
  </button>
    </div>';
  }
  elseif($passwordMatch == false){
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
if(!isset($_SESSION['username'])){
  echo '<div class="container my-4">
  <div class="jumbotron">
  <p class="display-4">Please Login to Access Admin Page</p>
  <p class="lead">This is very sensitive page.</p>
  <p class="lead">Be carefull!</p>
  </div>
  </div>';
}  
else{
echo '<div class="container">
<form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputname">Book Name</label>
                    <input type="text" name="bookname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">File</label>
                  <input type="file" name="pdf" id="pdf">
                  </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Image of Book</label>
                  <input type="file" name="photo" id="photo" >
                  
                </div>
                
                <button type="submit" name="upload" class="btn btn-primary">Upload</button>
              </form>

</div>';
include '_partial/table.php';
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