<head>
    <title>Administration DashBoard</title>
</head>

<?php
session_start();
if(!$_SESSION['login']){
    header("location:../../index.php");
    die;
  }

include_once 'header.php'; ?>
<style> <?php include '../../View/CSS/dashStyle.css'; ?> </style> 

<!-- navigation tab for admin, with create account, adminView, log out and insert book -->
<body>
    <div class ="wrapper">
        <div class = "dash">
            <p> <?php echo "Welcome Administrator "; ?> </p>
        <div class="divide"> </div>
            <a href="adminView.php">
                        <button type="button">View Books</button>
            </a>
        <div class="divide"> </div>
        <a href="logout.php"> 
                        <button type="button">Log Out</button>
            </a>
        <div class="divide"> </div>
        <a href="insertBook.php"> 
                        <button type="button">Insert Book</button>
            </a>
        </div>
    </div>
</body>



<?php include_once 'footer.php'; ?> 