<?php
session_start();
 require("../Model/bookUpdateFunction.php");
 require("../Model/connection.php");
 require("inputSanitation.php");
//input sanitation via testInput function
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if(!empty([$_POST])) {

        //Book Table Check
        $bookid = testInput($_POST['bookid']);
        $bt = testInput($_POST['bt']);
        $ot = testInput($_POST['ot']);
        $yop = testInput($_POST['yop']);
        $genre = testInput($_POST['genre']);
        $sold = testInput($_POST['sold']);
        $lan = testInput($_POST['lan']);
        $cip = testInput($_POST['cip']);

        //Author Table Check
        $authorid = testInput($_POST['authorid']);
        $name= testInput($_POST['name']);
        $surname = testInput($_POST['surname']);
        $nationality = testInput($_POST['nationality']);
        $yob = testInput($_POST['yob']);
        if($_POST['yod'] == "0"){
            $_POST['yod'] == NULL;
        }
        $yod = testInput($_POST['yod']);

        //BookPlot Table Check
        $bpid = testInput($_POST['bpid']);
        $plot = testInput($_POST['bp']);
        $ps = testInput($_POST['ps']);

        //ChangeLog Table UserID Check
        if(isset($_POST['userid'])){
            $userID = $_POST['userid'];
        }
        $userID = testInput($_POST['userid']);

        if ($_REQUEST['action_type'] == 'Update') {
            updateBook($authorid, $name, $surname, $nationality, $yob, $yod, 
            $bookid, $bt, $ot, $yop, $genre, $sold,$lan, $cip, $bpid, $plot, 
            $ps, $userID);
            header('location:../View/Pages/adminView.php');
        }
    }
}
    ?>