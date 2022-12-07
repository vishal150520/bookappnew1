<?php
$servername = "localhost";
$username = "root";
$password = "Admin@123";
$database = "signup";

//create a connection
$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    ?>
<script>
  alert("sorry we failed to connect;".mysqli_connect_error());
</script>
<?php
}
else{
    ?>
<!-- <script>
  alert("connection is succesful");
</script> -->
<?php
}
?>