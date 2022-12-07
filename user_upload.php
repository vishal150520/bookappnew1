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
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_start();

session_start();

include '_partial/dbconn.php';
include '_partial/login_signup.php';
include '_partial/nav.php';


if(isset($_SESSION['id'])){

$userquery = "select * from registration where id= '$id'";
$query = mysqli_query($conn, $userquery);
$user_data = mysqli_fetch_assoc($query);
$id = $user_data['id'];
}
else{
  header("location:index.php");
}
    
?>
<div class="container my-3 mb-3">
   <h5>Upload any book, to contibute in PDF AGILE</h5>

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

<?php

// upload book php script start


$fupload = false;

if(isset($_POST['upload'])){

    $name = $_POST['bookname'];
    $pdf_file= $_FILES['pdf'];
    $img_file= $_FILES['photo'];
    $id = $user_data['id'];

    // print_r($file);
    $img_filename = $img_file['name'];
    $img_filepath = $img_file['tmp_name'];
    $img_fileerror = $img_file['error'];

    $pdf_filename = $pdf_file['name'];
    $pdf_filepath = $pdf_file['tmp_name'];
    $pdf_fileerror = $pdf_file['error'];
    
    if($pdf_fileerror == 0 && $img_fileerror == 0){

        $dest_img_file = 'Image/'.$img_filename;
        $dest_pdf_file = 'upload/'.$pdf_filename;
        // echo "$destfile";
        move_uploaded_file($img_filepath,$dest_img_file);
        move_uploaded_file($pdf_filepath,$dest_pdf_file);

        $insertquery = " insert into pending_user_upload_books(user_id,bookname, pic, pdf) values('$id','$name','$dest_img_file','$dest_pdf_file')";
        $query = mysqli_query($conn,$insertquery);

        if($query){
           $fupload = TRUE;
           ?>
           <script>
             alert("Book send to admin for approval successfully");
           </script>
           <?php
        }
    }

}



// upload book php script end






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