<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript">//alert("sdfsd");</script>
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("contact");
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
<body>
<span style="float:right;">
 <form action="add_contact.php" method="post">
   <input type="submit" value="Add Contact" />
        </form>
</span>

<?php
	require 'connect.php';
    if(!empty($_POST["insnameid"])) {
        global $link;
	//	$sql = "SELECT * FROM contact where C_insname = '" . $_POST["insnameid"] . "'";

    $sql = "SELECT a.*,i.* FROM contact a LEFT JOIN insname i on a.C_insname = i.insnameid where i.insnameid = '" . $_POST["insnameid"] . "'";

		echo'<input type="search" id="myInput" onkeyup="myFunction()" placeholder="Search for Contacts">';

				echo'<table id="contact">
				  <tr class="header">
				    <th style="width:15%;">Contact Person</th>
				    <th style="width:15%;">Position</th>
				    <th style="width:15%;">Institution</th>
				    <th style="width:15%;">Department</th>
				    <th style="width:15%;">Email-id</th>
				    <th style="width:15%;">Phone</th>
				    <th style="width:15%;">Mobile</th>
				    </tr>';

		$results = mysqli_query($link, $sql);

    	 if(mysqli_num_rows($results) >= 1)
		{
    		$output = "";
    		while($row = mysqli_fetch_assoc($results))
    		{	
    			echo '
				<tr>
           		<td>'.$row['C_fn'].'</td>
           		<td>'.$row['C_position'].'</td>
           		<td>'.$row['insname'].'</td>
           		<td>'.$row['C_deptype'].'</td>
           		<td>'.$row['C_email'].'</td>
           		<td>'.$row['C_phone'].'</td>
           		<td>'.$row['C_mobile'].'</td>
       			</tr>';
    			
			}	
 		}else{
 			
 		}

  	}

	?>

</body>
</html>