<?php

    session_start();
?><!DOCTYPE html>
<html>
<head>
        <script src="js/bootstrap.js"></script>
        <link rel="stylesheet" href="css/bootstrap.css" />
</head>
<body>
<div class="gallery">
    <img src="ajv.png" alt="ajv">
  <div class="desc">JASON IRM</div>
</div>
<ul>
  <li><a class="active" href="#home">Home</a></li>
  <!--<li><a href="Institutions.php">Institutions</a></li>
  <li><a href="#Contacts">Contacts</a></li>
  <li><a href="#Agreements">Agreements</a></li>-->
</ul>
<br>
<br>
<br>
<br>
<br>
<div >
  <form method="post" action="login.php">
<!--//php code -->

<?php if(isset($_SESSION['status']['login']['error'])){
       ?>
       <div class="alert alert-error">
       <button type="button" class="close" data-dismiss="alert">&times;</button>
       <p><strong>Error: </strong><br />
       <?php
        foreach($_SESSION['status']['login']['error'] as $error){
                 echo $error . '<br />';
        }
       ?>
      </p>
      </div>
      <?php
      }
      ?>
      <?php if(isset($_SESSION['status']['login']['success'])){
              header('Location: institutions.php');
      ?>
      <!--<div class="alert alert-success">
      <button type="button" class="close" onclick="window.open('irm_bkp/irm/institutions.php') </button>
      </div>-->
      <?php
      }
      ?>


    <label for="fname">Username</label>
    <input type="text" id="uname" name="username" placeholder="Your username..">
     <?php
      if(isset($_SESSION['status']['login']['username'])){
        $username_value = $_SESSION['status']['login']['username'];
       } else {
        $username_value = '';
       }
       ?>
	<br>
    <label for="lname">Password</label>
    <input type="password" id="lname" name="password" placeholder="Your password..">

    <input class="login_submit" name="sign-in" type="submit" value="Submit">
  </form>
</div>

</body>
</html>
<?php

    unset($_SESSION['status']);

?>