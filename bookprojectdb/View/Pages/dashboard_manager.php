<head>
    <title>Administration DashBoard</title>
</head>

<?php
session_start();
if(!$_SESSION['login']){
  header("location:../../index.php");
}
if(isset($_SESSION['rights'])){
  $CurrentUser=$_SESSION['rights'];
  if($CurrentUser != 'Manager') {
    header("location:dashboard_admin.php"); 
  die;
  }
}

include_once 'header.php'; ?>
<style> <?php include '../../View/CSS/dashStyle.css'; ?> </style> 

<!-- navigation tab for admin, with create account, adminView, log out and insert book -->
<body>
    <div class ="wrapper">
        <div class = "dash">
            <p> <?php echo "Welcome Manager "; ?> </p>
            <a href="regForm.php">
                        <button type="button">Create New User Account</button>
            </a>
        <div class="divide"> </div>
            <a href="managerView.php">
                        <button type="button">View Books</button>
            </a>
        <div class="divide"> </div>
        <a href="logout.php"> 
                        <button type="button">Log Out</button>
            </a>
        <div class="divide"> </div>
        <a href="insertBook2.php"> 
                        <button type="button">Insert Book</button>
            </a>
        </div>
    </div>
</body>



<?php include_once 'footer.php'; ?> 