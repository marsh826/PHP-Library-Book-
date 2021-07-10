<Head>
  <title>Book Display</title>
</Head>

<body>

<?php 
session_start();
if(!$_SESSION['login']){
  header("location:../../index.php");
  die;
}
include_once 'header.php'; 
?>

<style> <?php include '../../View/CSS/style.css'; ?> </style>

<div class = "return-to-dash">
<a href="dashboard_admin.php"><button type="button">Return to Dashboard</button></a>
</div>

<?php
require("../../Model/connection.php");

$viewbooks = "SELECT * From book inner join author on book.AuthorID = author.AuthorID 
Order By MillionsSold Desc";
$stmt = $conn->prepare($viewbooks);
$stmt->execute();
$result = $stmt->fetchAll();

  if($stmt->rowCount()< 1 ) {
  echo "No books available.";    
  } else {
    foreach( $result as $row ) { 
?>
<!-- This is view book page admin version. Only admin users can access this page -->

<?php 
require("../../Model/connection.php");

$coverimagepath ="SELECT CoverImagePath from book";
$stmt = $conn->prepare($coverimagepath);
$stmt->execute();
$result = $stmt->fetchAll();

if ($coverimagepath == NULL) {
  echo '<img src="defaultcover.jpg">';
} 
?>

<?php
require("../../Model/connection.php");

$displaydate ="SELECT DateCreated, DateChanged FROM changelog 
INNER Join book on changelog.BookID = book.BookID";
$stmt2 = $conn->prepare($displaydate);
$stmt2->execute();
$result2 = $stmt2->fetchAll();

if($stmt2->rowCount()< 1 ) {
  echo "N/A";    
  } else {
    foreach( $result2 as $row2 )
?>
<!-- All Book Information that are retrieve from database are displayed in this section -->
<div class="wrapper">
    <div class="view">
      <figure>
        <img src="<?php echo $row['CoverImagePath'];?>">
        <figcaption>
          <p class="info"><?php echo $row['BookTitle']; ?></p>
          <p class="info"> Year Published: <?php echo $row['YearofPublication']; ?></p>
          <p class="info"> Author: <?php echo $row['Name']." ".$row['Surname']; ?></p>
          <p class="info"> Number of Copies Sold (Millions): <?php echo $row['MillionsSold']; ?></p>
          <p class="info"> Date Created: <?php echo $row2['DateCreated']; ?> </p>
          <p class="info"> Last Updated: <?php echo $row2['DateChanged']; ?> </p>
          <a class="info" href="updateBook.php ?bookid=<?php echo $row['BookID'];?>">
          <button type="button">Update</button></a>
          <a class="info" href="../../Controller/processDelete.php ?bookid=<?php echo $row['BookID'];?>" 
          onclick="return check()"><button type="button">Delete</button></a>
        <figcaption>
      </figure> 
    </div>
  </div>
<?php
   }
 }
}
?>

<?php include_once 'footer.php'; ?>

</body>

