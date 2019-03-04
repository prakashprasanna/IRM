<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript">//alert("sdfsd");</script>
<body>
 <span style="float:right;">
         <form action="add_agreement.php" method="post">
        <input type="submit" value="Add Agreement" />
      </form>
      </span>'


<?php
	require 'connect.php';
    if(!empty($_POST["insnameid"])) {
        global $link;
		// $sql = "SELECT a.AGR_ID,a.AJV_EMP_ID,a.AGR_start_date,a.AGR_exp_date,a.AGR_commission,a.AGR_bonus,i.insnameid,i.insname FROM agreement a, insname i where a.I_ID = '" . $_POST["insnameid"] . "'";

    //$sql = "SELECT a.AGR_ID,a.AGR_status,a.AGR_code,AGR.comment,a.AGR_start_date,a.AGR_exp_date,a.AGR_commission,a.AGR_bonus,i.insnameid,i.insname FROM agreement a LEFT JOIN insname i on a.I_ID = i.insnameid where i.insnameid = '" . $_POST["insnameid"] . "'";

        $sql = "SELECT a.*,i.* FROM agreement a LEFT JOIN insname i on a.I_ID = i.insnameid where i.insnameid = '" . $_POST["insnameid"] . "'";


				echo'<table id="agreement">
				  <tr class="header">
				    <th style="width:15%;">Institution</th>
            <th style="width:10%;">Agent Code</th>
            <th style="width:10%;">Status</th>
				    <th style="width:10%;">Start Date</th>
            <th style="width:10%;">End Date</th>
				    <th style="width:15%;">Comission</th>
				    <th style="width:15%;">Bonus</th>
            <th style="width:15%;">Comments</th>
				    </tr>';

		$results = mysqli_query($link, $sql);

    	 if(mysqli_num_rows($results) >= 1)
		{
    		while($row = mysqli_fetch_assoc($results))
    		{	
    			echo '
				<tr>
           		<td>'.$row['insname'].'</td>
              <td>'.$row['AGR_code'].'</td>
              <td>'.$row['AGR_status'].'</td>
           		<td>'.$row['AGR_start_date'].'</td>
           		<td>'.$row['AGR_exp_date'].'</td>
           		<td>'.$row['AGR_commission'].'</td>
           		<td>'.$row['AGR_bonus'].'</td>
              <td>'.$row['AGR_comment'].'</td>
       			</tr>';
    			
	}	
    		return true;
 		}else{
 			return false;
 		}

  	}

	?>

</body>
</html>