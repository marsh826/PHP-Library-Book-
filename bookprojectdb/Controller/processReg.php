<?php
require("../Model/connection.php");
require("../Model/registerFunction.php");
require("inputSanitation.php");
if (!empty([$_POST])) {
    //input sanitation via testInput function
    $username = testInput($_POST['username']);
    $mypass = testInput($_POST['password']);
    $accessrights = testInput($_POST['accessrights']);
    $firstname = testInput($_POST['fname']);
    $lastname = testInput($_POST['lname']);
    $email = testInput($_POST['email']);

    //hashing the password with PASSWORD_HASH()
    $hpassword = password_hash($mypass, PASSWORD_DEFAULT);
    $query = $conn->prepare( "SELECT username FROM login WHERE username = :user" );
    $query->bindValue( ":user", $username );
    $query->execute();
    if ($query->rowCount() < 1) {// If user does not exists
      newUser($username, $hpassword, $accessrights, $firstname, $lastname, $email);//function call
      echo "User account has been created";
    
    }
    else {
      echo "User account already exists";
    }
}
?>
<style><?php include '../../View/style.css';?></style>
<div class = return-after-reg>
<a href="../View/Pages/dashboard_manager.php"><button type= "button">Return to Dashboard</button></a>
</div>


<!-- Account Registration Process. -->