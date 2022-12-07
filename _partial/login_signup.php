<?php
// session_start();
include 'dbconn.php';

$emailExists = false;
$signUp = false;
$insert = TRUE;
$passwordMatch = TRUE;
$loggin = false;
$passwordIncorrect = false;
$emailNotExists =false;
$adminname = false;


// for login
if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $email_search = "select * from registration where email= '$email' and status = 'active' ";
  $query = mysqli_query($conn, $email_search);

  $email_count = mysqli_num_rows($query);
  
  if($email_count){
      $user_data = mysqli_fetch_assoc($query);

      $db_pass = $user_data['password'];
      
      $pass_decode = password_verify($password,$db_pass);
      if($pass_decode){
      $_SESSION['id'] = $user_data['id'];
      $_SESSION['username'] = $user_data['username'];
      $loggin = TRUE;
    }else{
      $passwordIncorrect = TRUE;
    }

  }else{
    $emailNotExists = TRUE;
  }
}




//for signUP
if(isset($_POST['create'])){
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

  if($emailcount>0){
    $emailExists = True;
    
  }else{
    if($password === $cpassword){
      $insertquery="insert into registration(username, email,password,cpassword,	token,status) values('$username', '$email', '$pass','$cpass','$token','inactive')";

      $iquery =mysqli_query($conn, $insertquery);
      if($iquery){
        
        $subject = "Email Activation";
        $body = "Hi $username, Click here to activate your account http://localhost/pdf%20agile/active.php?token=$token";
       $sender_email = "From: PDF AGILE";

        if(mail( $email,$subject,$body,$sender_email)){
            $_SESSION['msg'] = "Please Check your mail to activate your account $email";
            $signUp = TRUE;

            // $emailquery = "select * from registration where email= '$email'";
            // $query = mysqli_query($conn, $emailquery);
            // $user_data = mysqli_fetch_assoc($query);
            // $_SESSION['id'] = $user_data['id'];
            // $_SESSION['username'] = $user_data['username'];
            // $loggin = TRUE;         
        }
        else{
          ?>
            <script>alert("email sending failed.");</script>

          <?php
        }
        
      }else{
       $insert = false;
      }

    }else{
      $passwordMatch =false;
    }
  }
}

?>
