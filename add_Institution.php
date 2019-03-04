<?php

    session_start();
    require 'functions.php';
    require 'connect.php';
        global $link;
        $sql = "SELECT * FROM ins";
        $results = mysqli_query($link, $sql);
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
<form method="post" action="inscheck.php">

<?php if(isset($_SESSION['status']['inscheck']['error'])){
    ?>
    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p><strong>Error: </strong><br />
        <?php
            foreach($_SESSION['status']['inscheck']['error'] as $error){
                echo $error . '<br />';
            }
            ?>
        </p>
    </div>
<?php
}
?>
<?php if(isset($_SESSION['status']['inscheck']['success'])){
    ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p><strong>Success: </strong><br />New Institute Added.</p>
    </div>
     <?php
    }
    ?>

       
<h1>Add New Institute</h1>
   <input class="add_ins" name="save" type="submit" value="Save"/>

   <h3>Institute Name and Type</h3>
<div>
<?php
    if(isset($_SESSION['status']['inscheck']['institute'])){
        $ins = $_SESSION['status']['inscheck']['institute'];
    } else {
        $ins = '';
    }
?>
  <label for="institute">Name</label>
    <input type="text" id="institute" name="institute" placeholder="Institute name.." value="<?=$ins;?>"></br>

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
  
  </form>
</div>

  
	
</body>
</html>
<?php

    unset($_SESSION['status']);

?>