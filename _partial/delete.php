<?php
include 'dbconn.php';

$id = $_GET['id'];

$dq = "delete from books where id = $id";
$query = mysqli_query($conn, $dq);

if($query){
    ?>
    <script>
        alert("Deleted successfully.");
    </script>

    <?php
    header('location:../Xm89Et.php');
}
else{
    ?>
    <script>
        alert("Not Deleted successfully.");
    </script>

    <?php
}
?>