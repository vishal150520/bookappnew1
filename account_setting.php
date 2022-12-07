<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <title>Free E book Download in pdf</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/nav.css">
  <style>
    @media screen and (max-width:768px){

        .container{
          margin-top:60px;
        }
    }
  </style>
</head>

<body>
<?php
ob_start();

session_start();

include '_partial/dbconn.php';
include '_partial/login_signup.php';
include '_partial/nav.php';


if(isset($_SESSION['id'])){

$userquery = "select * from registration where id= '$id'";
$query = mysqli_query($conn, $userquery);
$user_data = mysqli_fetch_assoc($query);
}
else{
  header("location:index.php");
}
    
?>
<div class="container my-3 mb-3">
    <h5>Update your Account in PDF AGILE</h5>

    <?php 
      $update = FALSE;
     include '_partial/alert.php';
     ?>

    <form action="" method="POST">
      <div class="form-group">
        <label for="exampleInputname">Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" value = <?php echo $user_data['username']; ?> aria-describedby="emailHelp">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" value = <?php echo $user_data['email']; ?>  aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We will never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Create New Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        <label for="exampleInputPassword1">Confirm Password</label>
        <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Remember me</label>
      </div>
      <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>

  </div>
<?php


if(isset($_POST['update'])){
  
  $username = mysqli_real_escape_string($conn,$_POST['name']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);
  $cpassword = mysqli_real_escape_string($conn,$_POST['cpassword']);


  $pass = password_hash($password, PASSWORD_BCRYPT);
  $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

  $token = bin2hex(random_bytes(15));
  
  $emailquery = "select * from registration where email= '$email'";
  $query = mysqli_query($conn, $emailquery);

  $emailcount = mysqli_num_rows($query);

  if($emailcount>1){
    $emailExists = True;
    
  }else{
    if($password === $cpassword){
      $uq = "UPDATE `registration` SET `id`=$id,`username`='$username',`email`='$email',`password`='$pass',`cpassword`='$cpass',`token`='$token',`status`='active' WHERE id = $id";
      $uquery = mysqli_query($conn, $uq);
      if($uquery){
        // $subject = "Email Activation";
        // $body = "Hi $username, Click here to activate your account http://localhost/books%20pdf/active.php?token=$token";
        // $sender_email = "From: PDF AGILE";

        // if(mail( $email,$subject,$body,$sender_email)){
        //     $_SESSION['msg'] = "Please Check your mail to activate your account $email";
        //     $signUp = TRUE;
            $update = TRUE;
        // }
      }
    }
  }
}
include 'footer.php';
?>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</body>

</html>