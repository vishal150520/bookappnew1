<?php
session_start();
include '_partial/dbconn.php';
if(isset($_GET['token'])){
    $token= $_GET['token'];

    $updatequery = " update registration set status='active' where token='$token' ";
    $query = mysqli_query($conn,$updatequery);

    if($query){
        if(isset($_SESSION['msg'])){
            $_SESSION['msg']= "Account update successfully";
            header('location:index.php');
        }else{
            $_SESSION['msg']= "You are logged out.";
            header('location:index.php');
        }

    }else{
        $_SESSION['msg']= "Account not update ";
        header('location:index.php');
    }
}

?>