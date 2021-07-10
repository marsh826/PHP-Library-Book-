<?php
function newUser($username, $password, $accessrights, $firstname, $lastname, $email)
{
  global $conn;
  try{
    $conn->beginTransaction();
    $stmt = $conn->prepare("INSERT INTO login(Username, Password, AccessRights)
    VALUES (:username, :password, :accessrights)");
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $password);
    $stmt->bindValue(':accessrights', $accessrights);
    $stmt->execute();
    // last inserted = loginID
    $lastLoginID = $conn->lastInsertID();
    $stmt = $conn->prepare("INSERT INTO users(FirstName, LastName, Email, LoginID)
    VALUES (:firstname, :lastname, :email, :LoginID)");
    $stmt->bindValue(':firstname', $firstname);
    $stmt->bindValue(':lastname', $lastname);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':LoginID', $lastLoginID);
   
    $stmt->execute();
    $conn->commit(); //save to database
  }
  catch (PDOException $ex) {
    $conn->rollBack(); 
    throw $ex;
  }
}
?>





