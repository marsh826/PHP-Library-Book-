<?php
session_start();
require("../Model/connection.php");
require("../Model/bookInsertFunction.php");
require("inputSanitation.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if (!empty([$_POST])){
    //input sanitation via testInput function

    //Insert into Author Table
    $name = testInput($_POST['name']);
    $surname = testInput($_POST['surname']);
    $nationality = testInput($_POST['nationality']);
    $yob = testInput($_POST['yob']);
    $yod = testInput($_POST['yod']);
    if ($_POST['yod'] = '0'){
        $_POST['yod'] == NULL;
    }
    $cip = testInput($_POST['yod']);

    //Insert into Book Table
    $bt = testInput($_POST['bt']);
    $ot = testInput($_POST['ot']);
    $yop = testInput($_POST['yop']);
    $genre = testInput($_POST['genre']);
    $sold = testInput($_POST['sold']);
    $lan = testInput($_POST['lan']);
    if(empty($_POST['cip'])){
        $_POST['cip'] = "../Images/defaultcover.jpg";
    }
    $cip = testInput($_POST['cip']);
   
    //Insert into BookPlot Table
    $bp = testInput($_POST['bp']);
    $ps = testInput($_POST['ps']);

    //Gathering userid for ChangeLog Table
    if(isset($_POST['userid'])){
        $userID = $_POST['userid'];
    }
    $userID = testInput($_POST['userid']);
    
    
    //Linking input with the database to check if it exists
    $query = $conn->prepare("SELECT Name, Surname, AuthorID FROM author WHERE Name = :name AND Surname = :surname");
    $query->bindValue(':name', $name);
    $query->bindValue(':surname', $surname);
    $query->execute();
    $row = $query->fetch();

    //Last Author 
    $lastauthorID = $conn->prepare("SELECT AuthorID FROM author WHERE Name = :name AND Surname = :surname");
    $lastauthorID->bindValue(':name', $name);
    $lastauthorID->bindValue(':surname', $surname);
    $lastauthorID->execute();

    //Linking input with the database to check if it exists
    $query = $conn->prepare("SELECT UserID from users WHERE UserID = :userid");
    $query->bindValue(':userid', $userID);
    $query->execute();

    if($query->rowCount() < 1){ //if author doesn't exists
        addBook($name, $surname, $nationality, $yob, $yod, 
        $bt, $ot, $yop, $genre, $sold, $lan, $cip, $bp, $ps, $userID);
        header('location:../View/Pages/adminView.php'); 
    }else {
        //if author exists
        $existauthor = $row['AuthorID'];
        addBook2($existauthor,$bt, $ot, $yop, $genre, $sold, $lan, $cip, $bp, $ps, $userID);
        header('location:../View/Pages/adminView.php'); 
    }
} else {
    echo "Book cannot be inserted";
}
    }
?>