<?php

    session_start();
     require 'functions.php';
    require 'connect.php';
     $sql = "SELECT * FROM insname";
        $results = mysqli_query($link, $sql);
?><!DOCTYPE html>
<html>
<head>
        <script src="js/bootstrap.js"></script>
        <link rel="stylesheet" href="css/bootstrap.css" />

          <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <title>jQuery UI Datepicker - Display month &amp; year menus</title> -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#dob" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
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
<form method="post" action="addcontact.php">

<?php if(isset($_SESSION['status']['addcontact']['error'])){
    ?>
    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p><strong>Error: </strong><br />
        <?php
            foreach($_SESSION['status']['addcontact']['error'] as $error){
                echo $error . '<br />';
            }
            ?>
        </p>
    </div>
<?php
}
?>
<?php if(isset($_SESSION['status']['addcontact']['success'])){
    ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p><strong>Success: </strong><br />New Contact Added.</p>
    </div>
     <?php
    }
    ?>

       
<h1>Add New Contact</h1>
   <input class="add_ins" name="save" type="submit" value="Save"/>

   <h3>Name and Position</h3>
<div>
<?php
    if(isset($_SESSION['status']['addcontact']['fn'])){
        $fn = $_SESSION['status']['addcontact']['fn'];
    } else {
        $fn = '';
    }
?>
    <label for="Fn">Invoice Contact Person</label>
    <input type="text" id="fn" name="fn" placeholder="Contact Name.." value="<?=$fn;?>"></br>

<p>DOB: <input type="text" id="dob" name="dob" placeholder="Date of Birth"></p></br>

    <?php
    if(isset($_SESSION['status']['addcontact']['pos'])){
        $pos = $_SESSION['status']['addcontact']['pos'];
    } else {
        $pos = '';
    }
?>

    <label for="pos">Position</label>
    <input type="text" id="pos" name="pos" placeholder="Position.." value="<?=$pos;?>"></br>

    
    <h3>Institution Details</h3>

           <label>Institution Name</label>
<select name="ins" id="ins">
<option value="">Select Institute</option>
    <?php
    foreach($results as $ins) {
    ?>
    <option value="<?php echo $ins["insnameid"]; ?>"><?php echo $ins["insname"]; ?></option>
    <?php
    }
    ?>
    </select>

</br>

      <label for="deptype">Department</label>
    <select id="deptype" name="deptype">
      <option value="Senior Mangement">Senior Management</option>
      <option value="International Office">International Office</option>
      <option value="Admissions">Admissions</option>
      <option value="Commissions">Commissions</option>
      <option value="Academic">Academic</option>
      <option value="Students Support">Students Support</option>
    </select>


    <h3>Contact Details</h3>

<?php
    if(isset($_SESSION['status']['addcontact']['email'])){
        $em = $_SESSION['status']['addcontact']['email'];
    } else {
        $em = '';
    }
?>  

    <label for="email">Email Id</label>
    <input type="text" id="email" name="email" placeholder="Email Id.." value="<?=$em;?>"> </br>

    <?php
    if(isset($_SESSION['status']['addcontact']['phone'])){
        $ph = $_SESSION['status']['addcontact']['phone'];
    } else {
        $ph= '';
    }
?>    
        <label for="phone">Direct Phone</label>
    <input type="text" id="phone" name="phone" placeholder="Phone.." value="<?=$ph;?>"></br>

        <?php
    if(isset($_SESSION['status']['addcontact']['mobile'])){
        $mo = $_SESSION['status']['addcontact']['mobile'];
    } else {
        $mo = '';
    }
?>  
    <label for="mobile">Mobile</label>
    <input type="text" id="mobile" name="mobile" placeholder="Mobile no.." value="<?=$mo;?>"></br>

  </form>
</div>

  
	
</body>
</html>
<?php

    unset($_SESSION['status']);

?>