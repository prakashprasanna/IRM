<?php

  session_start();
  require 'functions.php';
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
<h1>Contacts</h1>

<form action="add_contact.php">
   <input class="add_co" type="submit" value="Add Contact" />
</form>
	
<input type="search" id="myInput" onkeyup="myFunction()" placeholder="Search for Contacts">

<table id="myTable">
  <tr class="header">
    <th style="width:25%;">Contact Name</th>
    <th style="width:25%;">Institution</th>
    <th style="width:25%;">Position</th>
    <th style="width:25%;">Email</th>
  </tr>
 <?php
 //echo("view_institution");
 //die();
   if(viewcon() === true){
      //passed
      } else {
        echo("something went wrong");
        die();
      }

      //  echo("header"); die();
  //  header('Location: institutions.php');
  ?>  
</table>

<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
	
</body>
</html>
<?php

    unset($_SESSION['status']);

?>