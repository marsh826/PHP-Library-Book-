<?php
session_start();
require("../Model/connection.php");
require("inputSanitation.php");
if(!empty($_POST)) {
  $username = testInput($_POST['uname']);
  $password = testInput($_POST['upass']);

    $stmt = $conn->prepare("SELECT LoginID, Password, AccessRights From login WHERE Username=:user");
    $stmt->bindParam(':user', $username);
    $stmt->execute();
    $row = $stmt -> fetch();
    if (password_verify($password, $row['Password'])){
     // assign session variables 
     $_SESSION["user"] = $username;
     $_SESSION["loginID"] = $row["LoginID"];
     $_SESSION["rights"] = $row["AccessRights"];
     $_SESSION["login"] = 'yes';

    if($_SESSION['rights'] == 'Manager') {
                header("location:../View/Pages/dashboard_manager.php");
              }
    else{
      header('location:../View/Pages/dashboard_admin.php'); 
    }
      }
      else {
        header('location:../index.php');
   }
}
?>

<!-- After login, the session will start. 
Access Rights restriction applied as customers and employees cannot access admin pages. -->


