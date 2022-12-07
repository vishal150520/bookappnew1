<?php
    session_start();
    include 'dbconn.php';
    $fupload = false;

    $id = $_GET['id'];

    $sq = "select * from books where id = $id";

    $q = mysqli_query($conn, $sq);

    $res = mysqli_fetch_assoc($q);

    if(isset($_POST['update'])){

        $id = $_GET['id'];
        $name = $_POST['bookname'];
        $pdf_file= $_FILES['pdf'];
        $img_file= $_FILES['photo'];

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

            $uq = "UPDATE `books` SET `id`=$id,`bookname`='$name',`pic`='$dest_img_file',`pdf`='$dest_pdf_file',`datetime`=[value-5] WHERE id = $id";

            $query = mysqli_query($conn,$uq);

            if($query){
            $fupload = TRUE;
            }
        }
    

    }

   

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>book details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php

echo '<nav id="stick" class="navbar navbar-expand-lg navbar-light">
<a class="navbar-brand" href="#">PDF AGILE</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="../Xm89Et.php">ADMIN-Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="index.php">HOME<span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="download.php">DOWNLOAD</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">ABOUT</a>
    </li>';
    
if(isset($_SESSION['username'])){
  echo '<li class="nav-item">
    <a class="nav-link" href="Xm89Etmessages.php">MESSAGES</a>
    </li>
  </ul>';
  echo 'Welcome '.$_SESSION['username'].' <a href="admin_logout.php" class="btn btn-success ml-1">Logout</a>';                 
}else{
  echo '<button class="btn btn-danger mr-2" data-toggle="modal" data-target="#loginModal">Login</button>
    <button class="btn btn-danger" data-toggle="modal" data-target="#signupModal">SignUp</button>';
  }

echo  '</div>
</nav>';

    ?>
    <div class="main_container">
        <div class="container glassmorphism">
            <h1> Update book</h1>
            
        <!-- form of update is start  -->
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputname">Book Name</label>
                    <input type="text" name="bookname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?php echo $res['bookname']; ?>">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">File</label>
                <input type="file" name="pdf" id="pdf">
                </div>

                <div class="form-group">
                <label for="exampleInputPassword1">Image of Book</label>
                <input type="file" name="photo" id="photo" >
                
                </div>
                
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>

   <!-- form of update is end -->

        </div>
    </div>
</body>
</html>