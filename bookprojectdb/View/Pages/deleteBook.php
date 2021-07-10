<style><?php include "..//../View/CSS/style.css";?></style>
<head> <title>Book Deleted</title> </head>
<?php 
session_start();
require("../../Model/connection.php");
if(!$_SESSION['login']){
  header("location:../../index.php");
  die;
}
include_once 'header.php'; 
?>
<div class = "wrapper">
<?php
echo "Book has been deleted"
?>
<!-- Admin clicks 'Return to ViewBook' to return to Admin Book Display Page after deleting a book -->
<br>
<a href="adminView.php"><button type= "button">Return to ViewBook</button></a>
</br>
</div>
<?php include_once 'footer.php'; ?>
