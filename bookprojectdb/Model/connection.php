<?php
$dbusername = "root";
$dbpassword = "";
try {
    $conn = new PDO("mysql:host=localhost;dbname=bookprojectdb", $dbusername,$dbpassword);
    // set attributes
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
     //echo " success";
  }
catch(PDOException $e)
 {
   $error_message = $e->getMessage();
   ?>
   <h1>Database Connection Error</h1>
   <p>There was an error connecting to the database.</p>
   <!-- display the error message -->
   <p>Error message: <?php echo $error_message; ?></p>
   <?php
   exit(); 
 }
 ?>

 <!-- Database connection file -->