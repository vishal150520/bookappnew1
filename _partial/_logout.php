<?php
session_start();

echo "Logging out...Please wait...";

session_destroy();

header('location:../index.php');
?>