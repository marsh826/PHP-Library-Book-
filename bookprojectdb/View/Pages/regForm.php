<Head>
  <title>Create New User Account</title>
  <?php include_once 'header.php'; ?>

<style> <?php include '../../View/CSS/regStyle.css'; ?> </style>
</Head>

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
include_once 'header.php'; 
?>


<!-- The User Registration form that only allow the Admin user to create accountss -->
<body>
  <div class="wrapper">
    <div class="regForm">
      <div class="create">
        <form action="../../Controller/processReg.php"  method="post">
          <fieldset>
            <legend>Login Details</legend>
            <label for ="uname">Username:</label>
            <input type="text" name="username" id= "uname" required>
            <label for ="upass">Password:</label>
            <input type="text" name="password" id="upass" required>
            <label for ="rights">AccessRights:</label>
            <input type="text" name="accessrights" id="rights" required>
          </fieldset>
          <fieldset>
            <legend>User Details</legend>
            <label for ="fname">First Name:</label>
            <input type="text" name="fname" id= "fname" required>
            <label for="lname">Last Name:</label>
            <input type="text" name="lname" id= "lname" required>
            <label for ="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <input type="submit">
          </fieldset>
        </form>
      </div>
    </div>
  </div>  
</body>  

<?php include_once 'footer.php'; ?> 

