<?php
//Delete Book from Database 
session_start();

require("inputSanitation.php");
require("../Model/connection.php");
$BookRemoval = $_GET['bookid'];
$stmt = $conn->prepare("DELETE FROM book WHERE BookID = '$BookRemoval';");
$stmt2 = $conn->prepare("DELETE FROM bookplot WHERE BookID = '$BookRemoval';");
$stmt->execute();
$stmt2->execute();
header("location:../View/Pages/deleteBook.php");
?>

