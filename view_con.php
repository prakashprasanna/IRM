<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript">//alert("sdfsd");</script>
<body>
<?php
	require 'connect.php';
    if(!empty($_POST["C_id"])) {
        global $link;
		$sql = "SELECT * FROM contact where C_id = '" . $_POST["C_id"] . "'";

		$results = mysqli_query($link, $sql);

		if(mysqli_num_rows($results) >= 1)
		{
    		$output = "";
    		while($row = mysqli_fetch_assoc($results))
    		{	
    // 			echo'
    // 			<table id="myTable">
				// <tr class="header">
				//     <th style="width:25%;">Institution Name&nbsp;-&nbsp;'.$row['I_Name'].'</th></tr>'; 
				// echo' <tr class="header">    
				//     <th style="width:25%;">Institution Primary Contact &nbsp;-&nbsp;'.$row['I_PrimaryContact'].'</th></tr>';
				// echo '<tr class="header">            
				//     <th style="width:25%;">Institution Phone Number &nbsp;-&nbsp;'.$row['I_phone_number'].'</th></tr>';
				// echo'<tr class="header">            
				//     <th style="width:25%;">Institution Fax&nbsp;-&nbsp;'.$row['I_fax'].'</th></tr>';           
				// echo'<tr class="header">            
				//     <th style="width:25%;">Institution Website&nbsp;-&nbsp;'.$row['I_website'].'</th></tr>';        
				// echo'<tr class="header">          
				//     <th style="width:25%;">Institution Facebook&nbsp;-&nbsp;'.$row['I_fb'].'</th></tr>';       
				// echo'<tr class="header">            
				//     <th style="width:25%;">Institution Email-id&nbsp;-&nbsp;'.$row['I_email'].'</th></tr>'; 
				// echo'<tr class="header">            
				//     <th style="width:25%;">Institution Street&nbsp;-&nbsp;'.$row['I_street'].'</th></tr>';   
				// echo'<tr class="header">            
				//     <th style="width:25%;">Institution City&nbsp;-&nbsp;'.$row['I_city'].'</th></tr>';   
				// echo'<tr class="header">            
				//     <th style="width:25%;">Institution State&nbsp;-&nbsp;'.$row['I_state'].'</th></tr>';    
				// echo'<tr class="header">            
				//     <th style="width:25%;">Institution Postal Code&nbsp;-&nbsp;'.$row['I_postal_code'].'</th></tr>    

				// </table>';
    // 			echo '<label>Institution Name &nbsp;-&nbsp;</label>';echo''.$row['I_Name'].'</br>';            
				// echo '<label>Institution Primary Contact  &nbsp;-&nbsp;</label>';echo''.$row['I_PrimaryContact'].'</br>';  
				// echo '<label>Institution Phone Number  &nbsp;-&nbsp;</label>';echo''.$row['I_phone_number'].'</br>';       
				// echo '<label>Institution Fax  &nbsp;-&nbsp;</label>';echo''.$row['I_fax'].'</br>';                
				// echo '<label>Institution Website  &nbsp;-&nbsp;</label>';echo''.$row['I_website'].'</br>';            
				// echo '<label>Institution Facebook  &nbsp;-&nbsp;</label>';echo''.$row['I_fb'].'</br>';          
				// echo '<label>Institution Email-id  &nbsp;-&nbsp;</label>';echo''.$row['I_email'].'</br>';           
				// echo '<label>Institution Street  &nbsp;-&nbsp;</label>';echo''.$row['I_street'].'</br>';             
				// echo '<label>Institution City  &nbsp;-&nbsp;</label>';echo''.$row['I_city'].'</br>';               
				// echo '<label>Institution State  &nbsp;-&nbsp;</label>';echo''.$row['I_state'].'</br>';           
				// echo '<label>Institution Postal Code  &nbsp;-&nbsp;</label>';echo''.$row['I_postal_code'].'</br>';   

    			echo'"Contact First Name" '.$row['C_fn'].'';
    			echo'"Contact Last Name" '.$row['C_ln'].'';
    // 			echo '
				// <tr>
    //        		<th>'.$row['I_Name'].'</th></tr></br>';
    //        		echo'
    //        		<tr>
    //        		<th>'.$row['I_PrimaryContact'].'</th>
    //    			</tr>';
    		}	
    		return true;
 		}else{
 			return false;
 		}
 	}

 	?>


</body>
</html>

