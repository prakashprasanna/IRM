<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript">//alert("sdfsd");</script>
<body>
<?php
require ("connect.php");
if(!empty($_POST["insid"])) {
  $sql ="SELECT * FROM insname WHERE insid = '" . $_POST["insid"] . "'";
   $results = mysqli_query($link, $sql);
?>
 <option value="">Select Institution</option>
<?php
  foreach($results as $ins) {
?>
  <option value="<?php echo $ins["insnameid"]; ?>"><?php echo $ins["insname"]; ?></option>
<?php

  }
}
?>
<!-- <label>Institution Name</label>          
<label>Institution Primary Contact</label>
<label>Institution Phone Number</label>   
<label>Institution Fax</label>            
<label>Institution Website</label>        
<label>Institution Facebook</label>       
<label>Institution Email-id</label>       
<label>Institution Street</label>         
<label>Institution City</label>           
<label>Institution State</label>          
<label>Institution Postal Code</label>     -->

</body>
</html>