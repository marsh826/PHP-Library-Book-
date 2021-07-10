<head>
  <title>Update Book</title>
</head>

<body>
  <style>
    <?php 
    include "..//../View/CSS/style.css";
    ?>
  </style>
  
<?php 
session_start();
require("../../Model/connection.php");
if(!$_SESSION['login']){
  header("location:../../index.php");
  die;
}
include_once "header.php";
//Retrieving Info from database 
$userID ="SELECT UserID from users WHERE LoginID = ".$_SESSION['loginID']."";
$stmt4 = $conn->prepare($userID);
$stmt4->execute();
$result = $stmt4->fetchAll();
foreach($result as $row4);


$BookID = $_GET['bookid'];
$stmt = $conn->prepare("SELECT * FROM book where BookID = '$BookID';");
$stmtTwo = $conn->prepare("SELECT * FROM author JOIN book ON author.AuthorID = book.AuthorID 
WHERE BookID = '$BookID';");
$stmtThree = $conn->prepare("SELECT * FROM bookplot WHERE BookID = '$BookID';");

$stmt->execute();
$stmtTwo->execute();
$stmtThree->execute();

$row = $stmt->fetchAll();
$rowTwo = $stmtTwo->fetchAll();
$rowThree = $stmtThree->fetchAll();

//Displaying retrieved info as accroding to the book being selected//
if ($stmt->rowCount() || $stmtTwo->rowCount() || $stmtThree->rowCount()) {
?>
 
<div class= wrapper>
    <form action="../../Controller/processUpdate.php" method="POST">
<!-- Book Info -->
        <fieldset>
            <legend>Book ID: <?php echo $row[0]['BookID'] ?></legend>
            <input type="hidden" name="bookid" id="bookid" value="<?php echo $row[0]['BookID'] ?>">
            <label for="bt">Book title</label>
            <input type="text" name="bt" id="bt" value="<?php echo $row[0]['BookTitle'] ?>">
            <label for="ot">Original title</label>
            <input type="text" name="ot" id="ot" value="<?php echo $row[0]['OriginalTitle'] ?>">
            <label for="yop">Year of publication</label>
            <input type="text" name="yop" id="yop" value="<?php echo $row[0]['YearofPublication'] ?>">
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" value="<?php echo $row[0]['Genre'] ?>">
            <label for="sold">Millions Sold</label>
            <input type="text" name="sold" id="sold" value="<?php echo $row[0]['MillionsSold'] ?>">
            <label for="lan">Laguage written</label>
            <input type="text" name="lan" id="lan" value="<?php echo $row[0]['LanguageWritten'] ?>">
            <label for="cip">Cover Image Path</label>
            <input type="text" name="cip" id="cip" value="<?php echo $row[0]['CoverImagePath'] ?>">
        </fieldset>
<!-- Author Info -->
        <fieldset>
            <legend>Author ID: <?php echo $rowTwo[0]['AuthorID'] ?></legend>
            <input type="hidden" name="authorid" id="authorid" value="<?php echo $row[0]['AuthorID'] ?>">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?php echo $rowTwo[0]['Name'] ?>">
            <label for="surname">Surname</label>
            <input type="text" name="surname" id="surname" value="<?php echo $rowTwo[0]['Surname'] ?>">
            <label for="nationality">Nationality</label>
            <input type="text" name="nationality" id="nationality" value="<?php echo $rowTwo[0]['Nationality'] ?>">
            <label for="yob">Birth year</label>
            <input type="text" name="yob" id="yob" value="<?php echo $rowTwo[0]['BirthYear'] ?>">
            <label for="yod">Death year</label>
            <input type="text" name="yod" id="yod" value="<?php echo $rowTwo[0]['DeathYear'] ?>">
        </fieldset>
<!-- Book Plot Info -->
        <fieldset>
            <legend>Book Plot ID: <?php echo $rowThree[0]['BookPlotID'] ?></legend>
            <input type="hidden" name="bpid" id="bpid" value="<?php echo $rowThree[0]['BookPlotID'] ?>">
            <label for="bp">Plot</label>
            <input type="text" name="bp" id="bp" value="<?php echo $rowThree[0]['Plot'] ?>">
            <label for="ps">Plot Source</label>
            <input type="text" name="ps" id="ps" value="<?php echo $rowThree[0]['PlotSource'] ?>">
        </fieldset>
<!-- Tracking UserID who updates the book -->
        <input type="hidden" id="userid" name="userid" value="<?php echo $row4['UserID']; ?>"
        onclick="return check()">
        <input type="hidden" name="action_type" value="Update">
        <input type="submit" value="Update">
        <a href ="adminView.php"><button type = "button">Go Back</button></a> 
    </form>
</div>
<?php
  } 
?>
</body>
<?php include_once 'footer.php'; ?>