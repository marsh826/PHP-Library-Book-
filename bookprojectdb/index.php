<title>Login Page</title>
<?php include 'View/Pages/header.php'; ?><style>
<?php include 'View/CSS/style.css'; ?></style>

<!-- The front page of the website -->

<div class="wrapper">
  <form action="Controller/processLogin.php" method="post">
          <div class="login">
            <fieldset>
              <legend>User Login</legend>
              <label for = "uname">Username:</label>
              <input type="text" id="uname" name="uname">
              <label for="upass">Password:</label>
              <input type= "text" id="upass" name="upass">
              <input type= "submit" value=" Submit ">
            </fieldset>
           </form> 
          </div>  
</div>

<?php include 'View/Pages/footer.php'; ?><style>
