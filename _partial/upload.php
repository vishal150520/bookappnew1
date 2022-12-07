<?php
include 'dbconn.php';
$fupload = false;

if(isset($_POST['upload'])){

    $name = $result['bookname'];
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

        $insertquery = " insert into books(bookname, pic, pdf) values('$name','$dest_img_file','$dest_pdf_file')";
        $query = mysqli_query($conn,$insertquery);

        if($query){
           $fupload = TRUE;
        }
    }

}

?>