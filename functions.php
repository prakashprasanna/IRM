
<?php
	require 'connect.php';
    
	 //$link = mysqli_connect("127.0.0.1", "root", "", "ltp-login-register") or die($link);

	function hash_function($password){
		$salt = file_get_contents('salt.txt');

		$password = hash_hmac('whirlpool',$password, $salt);
		return $password;
	}

	function is_user_activated($username){
		global $link;
		$check = 0;
		$sql = "SELECT `activated` FROM `users` WHERE `username` = '".$username."'";
//		$query = mysqli_query($link, $sql);
//		$result = mysqli_result($query, 0);

		if ($query=mysqli_query($link,$sql))
 		 {
 			 // Fetch one and one row
  			while ($row=mysqli_fetch_row($query)){
  				$check = $row[0];
  			}
  		
  		}	

		if($check == 1){
			return true;
		} else {
			echo("user not activated");
			return false;	
		}
	}

//	function login($username, $password, $remember_me){
		function login($username, $password){
		global $link;
		$check = 0;
		$check1 = 0;

		// check details
		$sql = "SELECT `id` FROM `users` WHERE `username` = '".$username."' AND `password` = '".$password."'";

		    if ($result=mysqli_query($link,$sql)){
				while ($row=mysqli_fetch_row($result)){
  				$check = $row[0];
  			   }
  			}
  			if($check > 0){
				$session_code = uniqid();

				$sql2 = "INSERT INTO  `sessions` ( `user_id` ,  `session_code` ,  `created_at` ,  `updated_at`) 
						VALUES ($check,  '".$session_code."', NOW( ) , NOW( ) ) ON DUPLICATE 
								KEY UPDATE  `session_code` =  '".$session_code."',
											`updated_at` = NOW( )";
						
		 		  if ($result1=mysqli_query($link,$sql2)){
		  		 	    $_SESSION['session_code'] = $session_code;
		  		 		if($remember_me == true){
						$_COOKIE['session_code'] = $session_code;
					}

		   			return true;
		  		 } else{
		   		    return false;
		  		 } 		
		  	}	else {
		  		return false;
		  	} 
		
	}
	function is_user_logged_in(){
		if(isset($_SESSION['session_code'])){
			// logged in
			// Session code exists in db
			if(check_session_code($_SESSION['session_code']) !== false){
				return true;
			} else {
				return false;
			}
		} else {
			// not logged in
			if(isset($_COOKIE['session_code'])){
				if(check_session_code($_COOKIE['session_code']) !== false){
					$_SESSION['session_code'] = $_COOKIE['session_code'];
					return true;
				} else {
					return false;
				}
			}
			return false;
		}
	}
	function check_session_code($session){
		global $link;
		$session = mysqli_real_escape_string($session);
		$sql = "SELECT `user_id` FROM `sessions` WHERE `session_code` = '". $session."'";
		$query = mysqli_query($link, $sql);
		if(mysqli_num_rows($query) == 0){
			return false;
		} else {
			return mysqli_result($query, 0);
		}
	}

	function user_exists($username){
		global $link;
		$sql = "SELECT `id` FROM `users` WHERE `username` = '".$username."'";
		$query = mysqli_query($link, $sql);
		$result = mysqli_num_rows($query);

		if($result == 1){
			return true;
		} else {
			return false;
		}
	}
	function email_exists($email){
		global $link;
		$sql = "SELECT id FROM users WHERE  email = '".$email."'";
		$query = mysqli_query($link, $sql);
		$result = mysqli_num_rows($query);

		if($result == 1){
			return true;
		} else {
			return false;
		}
	}
	function generate_code(){
		return uniqid('', true);
	}
	function email_valid($email){
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			return false;
		} else {
			return true;
		}
	}

	// function institution_type($instype){
	// 	global $link;
	// 	$sql = "INSERT INTO `ins` (`instype`) VALUES ('".$instype."');";
	// 	mysqli_query($link, $sql);
 //        if(mysqli_affected_rows($link) > 0){
 //        	return true;
 //        }else{
 //        	return false;
 //        }

	// }

	function inscheck($institute,$instype){
		global $link;
		$sql = "INSERT INTO `insname` (`insname`,`insid`) VALUES ('".$institute."','".$instype."');";
		mysqli_query($link, $sql);
        if(mysqli_affected_rows($link) > 0){
        	return true;
        }else{
        	return false;
        }

	}


	function register($ins,$instype,$primary,$phone,$fax,$email,$website,$fb,$linkedin,$street,$city,$state,$postal) {
	//	echo($ins); die();
		global $link;
		$sql = "INSERT INTO `institution` (`I_Name`,`I_Type`,`I_PrimaryContact`,`I_phone_number`,`I_fax`,`I_email`,`I_website`,`I_fb`,`I_linkedin`,`I_street`,`I_city`,`I_state`,`I_postal_code`) VALUES ('".$ins."','".$instype."','".$primary."','".$phone."','".$fax."','".$email."','".$website."','".$fb."','".$linkedin."','".$street."','".$city."','".$state."','".$postal."');";
   
        mysqli_query($link, $sql);
        if(mysqli_affected_rows($link) > 0){
        	return true;
        }else{
        	return false;
        }
	}

	function insert_activation_code($insert_id, $activation_code){
		global $link;
		$query = "INSERT INTO `activation` (`user_id`, `activation_code`) VALUES ('".$insert_id."', '".$activation_code."');";
		if(!mysqli_query($link, $query)){
		   echo "activation unsuccessful";
        }
		if(mysqli_affected_rows($link) > 0){
			//return
		}
	}

	function addcontact($fn,$ins,$dob,$pos,$deptype,$email,$phone,$mobile) {

		global $link;
		$sql = "INSERT INTO `contact` (`C_fn`,`C_dob`,`C_position`,`C_insname`,`C_deptype`,`C_email`,`C_phone`,`C_mobile`) VALUES ('".$fn."','".$dob."','".$pos."','".$ins."','".$deptype."','".$email."','".$phone."','".$mobile."');";
   
        mysqli_query($link, $sql);
        if(mysqli_affected_rows($link) > 0){
        	return true;
        }else{
        	return false;
        }
	}

	function addagreement($ins,$con,$start,$exp,$agent,$clause,$co,$bo) {
		//echo($ins); echo($con); echo($start); echo($exp); echo($agent); echo($clause); echo($co); echo($bo); die();

		global $link;
		//$sql = "INSERT INTO `agreement` (`I_ID`,`AGR_status`,`AGR_code`,`AGR_comment`,`AGR_start_date`,`AGR_exp_date`,`AGR_commission`,`AGR_bonus`) VALUES ('".$ins."','".$con."','".$agent."','".$clause."','".$start."','".$exp."','".$co."','".$bo."');";

		$sql = "INSERT INTO `agreement` (`I_ID`,`AGR_status`,`AGR_start_date`,`AGR_exp_date`,`AGR_code`,`AGR_comment`,`AGR_commission`,`AGR_bonus`) VALUES ('".$ins."','".$con."','".$start."','".$exp."','".$agent."','".$clause."','".$co."','".$bo."');";


        mysqli_query($link, $sql);
      //  print_r(mysqli_affected_rows($link));
      //  die();
        if(mysqli_affected_rows($link) > 0){
        	return true;
        }else{
        	return false;
        }
	}

	function uploadimage($target_file) {

		global $link;
		$sql = "INSERT INTO `agreement` (`AGR_path_to_image`) VALUES ('".$target_file."');";
   
        mysqli_query($link, $sql);
      //  print_r(mysqli_affected_rows($link));
      //  die();
        if(mysqli_affected_rows($link) > 0){
        	return true;
        }else{
        	return false;
        }
	}

 //    if(isset($_GET['insnameid'])){
 //        mainInfo($_GET['insnameid']);
 //    }

	// function viewins($insnameid){
	// 	global $link;
	// 	$sql = "SELECT * FROM institution where I_Name = ";

	// 	$results = mysqli_query($link, $sql);

	// 	if(mysqli_num_rows($results) >= 1)
	// 	{
 //    		$output = "";
 //    		while($row = mysqli_fetch_assoc($results))
 //    		{	
 //    			echo '
	// 			<tr>
 //           		<td>'.$row['I_Name'].'</td>
 //           		<td>'.$row['I_PrimaryContact'].'</td>
 //       			</tr>';
 //    		}	
 //    		return true;
 // 		}else{
 // 			return false;
 // 		}   
	// }

	function viewcon(){
		global $link;
		$sql = "SELECT CONCAT_WS(' ', `C_fn`,`C_ln`) AS `whole_name`,`C_insname`,`C_position`,`C_email` FROM contact";

		$results = mysqli_query($link, $sql);

		if(mysqli_num_rows($results) >= 1)
		{
    		$output = "";
    		while($row = mysqli_fetch_assoc($results))
    		{	
    			echo '
				<tr>
           		<td>'.$row['whole_name'].'</td>
           		<td>'.$row['C_insname'].'</td>
           		<td>'.$row['C_position'].'</td>
           		<td>'.$row['C_email'].'</td>
       			</tr>';
    		}	
    		return true;
 		}else{
 			return false;
 		}   
	}

	function viewagr(){
		global $link;
		$sql = "SELECT `AGR_ID`,`I_ID`,`AGR_exp_date`,`AGR_commission`,`AGR_bonus` FROM agreement";

		$results = mysqli_query($link, $sql);

		if(mysqli_num_rows($results) >= 1)
		{
    		$output = "";
    		while($row = mysqli_fetch_assoc($results))
    		{	
    			echo '
				<tr>
           		<td>'.$row['AGR_ID'].'</td>
           		<td>'.$row['I_ID'].'</td>
           		<td>'.$row['AGR_exp_date'].'</td>
           		<td>'.$row['AGR_commission'].'</td>
           		<td>'.$row['AGR_bonus'].'</td>
       			</tr>';
    		}	
    		return true;
 		}else{
 			return false;
 		}   
	}


	function getinstype(){
		$type=array('University'=>'u' , 'PTE'=>'p', 'ITE'=>'i' );
		$options='';
		while(list($k,$v)=each($type))
		{
			$options.='<option value="'.$v.'">'.$k.'</option>'; 
		}
		return $options;
	}

	function getins($instype){
		global $link;
		$sql = "SELECT I_name FROM institution where I_type = '".$instype."'";
		$results = mysqli_query($link, $sql);
		//echo(mysqli_num_rows($results));
		//die();
		if(mysqli_num_rows($results) >= 1)
		{
	//	  echo("success");
	//	  die();		
		  echo "<select name='I_name'>";
          while ($row = mysqli_fetch_array($results)) {
          echo "<option value='" . $row['I_name'] . "'>" . $row['I_name'] . "</option>";
          }
          echo "</select>";
          return true;
        } else {	
          return false;	
        }  
	}
