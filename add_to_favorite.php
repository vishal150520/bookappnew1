<?php
include '_partial/dbconn.php';
$id = $_POST['id'];

$inq = "INSERT INTO `1_info`( `favorite_book_id`) VALUES ('$id')";

$qry = $mysqli_query($conn, $inq);
if($qry){
    ?>
    <script>
        alert('add to favorite');
    </script>
    <?php
    
}


?>