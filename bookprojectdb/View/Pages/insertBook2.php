<head>
    <title> Insert Book </title>
</head>
<style> <?php include "..//../View/CSS/style.css"?> </style>
<?php include_once 'header.php'; ?>

<!-- This section is where the admin will insert a new book -->
<body>
<?php
require("../../Model/connection.php");
session_start();
if(!$_SESSION['login']){
  header("location:../../index.php");
  die;
}
?>
<!-- New Book Info -->
    <div class= "wrapper">
        <legend>Please Insert Information of New Book </legend>
    <form action="../../Controller/processInsert.php" method="post"> 
          <fieldset>
        <div class= "update">
            <legend>NEW BOOK INFORMATION</legend>
            <label for ="bt">Book Title:</label>
            <input type ="text" id="bt" name="bt">
            <label for = "ot">Original Title:</label>
            <input type ="text" id="ot" name="ot">
            <label for ="yop">Year of Publish:</label>
            <input type ="text" id="yop" name="yop">
            <label for ="genre">Genre:</label>
            <input type ="text" id="genre" name="genre">
            <label for ="sold">Number of Copies Sold (Millions):</label>
            <input type = "text" id="sold" name="sold">
            <label for ="lan">Language Written:</label>
            <input type ="text" id="lan" name="lan"> 
            <label for="cip">Cover Image Path:</label>
            <input type="text" name="cip" id="cip">
        </div>
          </fieldset>
<!-- New Author Info -->
          <fieldset>
        <div class= "update">
            <legend>NEW AUTHOR INFORMATION(note: enter '0' in Death Year for Authors who are still alive)
            </legend>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
            <label for="surname">Surname:</label>
            <input type="text" name="surname" id="surname">
            <label for="nationality">Nationality:</label>
            <input type="text" name="nationality" id="nationality">
            <label for="yob">Birth Year:</label>
            <input type="text" name="yob" id="yob">
            <label for="yod">Death Year:</label>
            <input type="text" name="yod" id="yod">
        </div>
          </fieldset> 
<!-- New Book Plot Info -->
          <fieldset>
<!-- Tracking UserID -->
         <?php 
         $userID ="SELECT UserID from users WHERE LoginID = ".$_SESSION['loginID']."";
         $stmt = $conn->prepare($userID);
         $stmt->execute();
         $result = $stmt->fetchAll();
         foreach($result as $row);
         ?>
        <div class= "update">
            <legend>NEW BOOK PLOT INFORMATION</legend>
            <label for="bp">Book Plot:</label>
            <textarea type="text" name="bp" rows="4" id="bp"></textarea>
            <label for="ps">Plot Source:</label>
            <input type="text" name="ps" id="ps">
            <!-- Post UserID as Hidden Value -->
            <input type="hidden" id="userid" name="userid" value="<?php echo $row['UserID']; ?>" 
          onclick="return check()">
        </div>
          </fieldset> 
        <input type="submit" value="Insert">
        <a href ="dashboard_manager.php"><button type = "button">Go Back</button></a>          
        </form>
      </div>
    </div>    
</body>

<?php include_once 'footer.php'; ?>