<?php

    session_start();
    require 'functions.php';
    require 'connect.php';
        global $link;
        $sql = "SELECT * FROM ins";
        $results = mysqli_query($link, $sql);
         $sql1 = "SELECT * FROM insname";
        $results1 = mysqli_query($link, $sql1);
  //      print_r(mysqli_query($link, $sql1)); die();

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
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="institutions.php">Institutions</a></li>
  <li><a href="contacts.php">Contacts</a></li>
  <li><a href="agreements.php">Agreements</a></li>
</ul>
<br>
<br>
<br>
<br>
<form method="post" action="register.php">

<?php if(isset($_SESSION['status']['register']['error'])){
    ?>
    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p><strong>Error: </strong><br />
        <?php
            foreach($_SESSION['status']['register']['error'] as $error){
                echo $error . '<br />';
            }
            ?>
        </p>
    </div>
<?php
}
?>
<?php if(isset($_SESSION['status']['register']['success'])){
    ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p><strong>Success: </strong><br />Institute Details Added.</p>
    </div>
     <?php
    }
    ?>

       
<h1>Add Institute details</h1>
   <input class="add_ins" name="save" type="submit" value="Save"/></br>

         <label>Institution Type</label><br/>
<select name="type" id="type">
<option value="">Select Type</option>
    <?php
    foreach($results as $type) {
    ?>
    <option value="<?php echo $type["insid"]; ?>"><?php echo $type["instype"]; ?></option>
    <?php
    }
    ?>
    </select>

</br>
         <label>Institution Name</label><br/>
<select name="ins" id="ins">
<option value="">Select Institute</option>
    <?php
    foreach($results1 as $ins) {
    ?>
    <option value="<?php echo $ins["insnameid"]; ?>"><?php echo $ins["insname"]; ?></option>
    <?php
    }
    ?>
    </select>

</br>
<?php
    if(isset($_SESSION['status']['register']['primary'])){
        $pr = $_SESSION['status']['register']['primary'];
    } else { 
        $pr = '';
    }
?>
    <label for="primary">Primary Contact</label>
    <input type="text" id="primary" name="primary" placeholder="Name.." value="<?=$pr;?>"></br>

    <h3>Contact Details</h3>

    <?php
    if(isset($_SESSION['status']['register']['phone'])){
        $ph = $_SESSION['status']['register']['phone'];
    } else {
        $ph = '';
    }
?>
    <label for="phone">Phone</label>
    <input type="text" id="phone" name="phone" placeholder="Phone.." value="<?=$ph;?>"> </br>

        <?php
    if(isset($_SESSION['status']['register']['fax'])){
        $fax = $_SESSION['status']['register']['fax'];
    } else {
        $fax = '';
    }
?>  
        <label for="fax">Fax</label>
    <input type="text" id="fax" name="fax" placeholder="fax.." value="<?=$fax;?>"></br>

    <?php
    if(isset($_SESSION['status']['register']['website'])){
        $web = $_SESSION['status']['register']['website'];
    } else {
        $web = '';
    }
?>  
    <label for="website">Website</label>
    <input type="text" id="website" name="website" placeholder="www.." value="<?=$web;?>"></br>

    <?php
    if(isset($_SESSION['status']['register']['email'])){
        $email = $_SESSION['status']['register']['email'];
    } else {
        $email = '';
    }
?>  
        <label for="email">Email</label>
    <input type="text" id="email" name="email" placeholder="email@.." value="<?=$email;?>"></br>

  <?php
    if(isset($_SESSION['status']['register']['linkedin'])){
        $link = $_SESSION['status']['register']['linkedin'];
    } else {
        $link = '';
    }
?>  
     <label for="linkedin">LinkedIn</label>
    <input type="text" id="linkedin" name="linkedin" placeholder="linkedIn.." value="<?=$link;?>"></br>

 <?php
    if(isset($_SESSION['status']['register']['fb'])){
        $fb = $_SESSION['status']['register']['fb'];
    } else {
        $fb = '';
    }
?>  
    
    <label for="fb">Facebook</label>
    <input type="text" id="fb" name="fb" placeholder="facebook.." value="<?=$fb;?>"></br>

    <h3>Institute Address</h3>

<?php
    if(isset($_SESSION['status']['register']['street'])){
        $st = $_SESSION['status']['register']['street'];
    } else {
        $st = '';
    }
?>  

    <label for="street">Street</label>
    <input type="text" id="street" name="street" placeholder="Street.." value="<?=$st;?>"> </br>

    <?php
    if(isset($_SESSION['status']['register']['state'])){
        $sta = $_SESSION['status']['register']['state'];
    } else {
        $sta = '';
    }
?>    
        <label for="state">State</label>
    <input type="text" id="state" name="state" placeholder="state.." value="<?=$sta;?>"></br>

        <?php
    if(isset($_SESSION['status']['register']['city'])){
        $city = $_SESSION['status']['register']['city'];
    } else {
        $city = '';
    }
?>  
    <label for="city">City</label>
    <input type="text" id="city" name="city" placeholder="city.." value="<?=$city;?>"></br>

    <?php
    if(isset($_SESSION['status']['register']['postal'])){
        $pos = $_SESSION['status']['register']['postal'];
    } else {
        $pos = '';
    }
?> 
    
        <label for="postal">Postal Code</label>
    <input type="text" id="postal" name="postal" placeholder="postalcode.." value="<?=$pos;?>"></br>
  
  </form>
</div>

  
	
</body>
</html>
<?php

    unset($_SESSION['status']);

?>