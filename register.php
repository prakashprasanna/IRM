 <?php
	session_start();
	require 'functions.php';
	if(isset($_POST['save'])){
	   //print_r($_POST);
	   //die();
if(isset($_POST['primary'])){
			echo("primary");
			$primary = mysqli_real_escape_string($link, $_POST['primary']);

			$_SESSION['status']['register']['primary'] = $primary;

			if(strlen($primary)>5){

				if(strlen($primary) < 46){

					//passed
			
				} else {
					$_SESSION['status']['register']['error'][] = 'The Primary Contact is greater than 41 characters';
				}
			} else {
				$_SESSION['status']['register']['error'][] = 'The Primary contact is less than 3 characters';
			}	
		} else{
			$_SESSION['status']['register']['error'][] = 'The Primary contact is not entered';
		}

		if(isset($_POST['phone'])){
			echo("phone");

			$phone = mysqli_real_escape_string($link, $_POST['phone']);
			$_SESSION['status']['register']['phone'] = $phone;
			if(strlen($phone)>10){
				if(strlen($phone) < 15){
		  		//pass
				}else{
					$_SESSION['status']['register']['error'][] = 'The phone address is greater than 15 characters';
				}
			} else {
				$_SESSION['status']['register']['error'][] = 'The phone address is less than 10 characters';
			}	
		} else{
			$_SESSION['status']['register']['error'][] = 'The phone address is not entered';
		}
		if(isset($_POST['fax'])){
			echo("fax");

			$fax = mysqli_real_escape_string($link, $_POST['fax']);
			$_SESSION['status']['register']['fax'] = $fax;
			if(strlen($fax)>5){
				if(strlen($fax) < 15){
		  		//pass
				}else{
					$_SESSION['status']['register']['error'][] = 'The fax address is greater than 15 characters';
				}
			} else {
				$_SESSION['status']['register']['error'][] = 'The fax address is less than 5 characters';
			}	
		} else{
			$_SESSION['status']['register']['error'][] = 'The fax address is not entered';
		}
		if(isset($_POST['website'])){
			echo("web"); 						
			$website = mysqli_real_escape_string($link, $_POST['website']);
			$_SESSION['status']['register']['website'] = $website;
			if(strlen($website)>8){
				if(strlen($website) < 25){
			     	//passed
				} else {
					$_SESSION['status']['register']['error'][] = 'The website is greater than 25 characters';
			    }
			}else{
				$_SESSION['status']['register']['error'][] = 'The website is less than 8 characters';
			}    
		} else{
			$_SESSION['status']['register']['error'][] = 'The website is not entered';
		}
		if(isset($_POST['email'])){
			echo("email"); 
			$email = mysqli_real_escape_string($link, $_POST['email']);
			$_SESSION['status']['register']['email'] = $email;
			if(strlen($email)>8){
				if(strlen($email) < 161){
			     	//passed
				} else {
					$_SESSION['status']['register']['error'][] = 'The email is greater than 160 characters';
			    }
			}else{
				$_SESSION['status']['register']['error'][] = 'The email is less than 8 characters';
			}    
		} else{
			$_SESSION['status']['register']['error'][] = 'The email is not entered';
		}
		if(isset($_POST['fb'])){
			echo("fb"); 
			$fb = mysqli_real_escape_string($link, $_POST['fb']);
			$_SESSION['status']['register']['fb'] = $fb;
			if(strlen($fb)>8){
				if(strlen($fb) < 161){
			     	//passed
				} else {
					$_SESSION['status']['register']['error'][] = 'The facebook is greater than 160 characters';
			    }
			}else{
				$_SESSION['status']['register']['error'][] = 'The facebook is less than 8 characters';
			}    
		} else{
			$_SESSION['status']['register']['error'][] = 'The facebook is not entered';
		}
		if(isset($_POST['linkedin'])){
			echo("linkedin");
			$linkedin = mysqli_real_escape_string($link, $_POST['linkedin']);
			$_SESSION['status']['register']['linkedin'] = $linkedin;
			if(strlen($linkedin)>8){
				if(strlen($linkedin) < 161){
			     	//passed
				} else {
					$_SESSION['status']['register']['error'][] = 'The linkedin is greater than 160 characters';
			    }
			}else{
				$_SESSION['status']['register']['error'][] = 'The linkedin is less than 8 characters';
			}    
		} else{
			$_SESSION['status']['register']['error'][] = 'The linkedin is not entered';
		}
		if(isset($_POST['street'])){
			echo("street");  
			$street = mysqli_real_escape_string($link, $_POST['street']);
			$_SESSION['status']['register']['street'] = $street;
			if(strlen($street)>3){
				if(strlen($street) < 46){
			     	//passed
				} else {
					$_SESSION['status']['register']['error'][] = 'The street is greater than 45 characters';
			    }
			}else{
				$_SESSION['status']['register']['error'][] = 'The street is less than 3 characters';
			}    
		} else{
			$_SESSION['status']['register']['error'][] = 'The street is not entered';
		}
		if(isset($_POST['city'])){
			echo("city"); 
			$city = mysqli_real_escape_string($link, $_POST['city']);
			$_SESSION['status']['register']['city'] = $city;
			if(strlen($city)>3){
				if(strlen($city) < 46){
			     	//passed
				} else {
					$_SESSION['status']['register']['error'][] = 'The city is greater than 45 characters';
			    }
			}else{
				$_SESSION['status']['register']['error'][] = 'The city is less than 3 characters';
			}    
		} else{
			$_SESSION['status']['register']['error'][] = 'The city is not entered';
		}
		if(isset($_POST['state'])){
			echo("state"); 
			$state = mysqli_real_escape_string($link, $_POST['state']);
			$_SESSION['status']['register']['state'] = $state;
			if(strlen($state)>3){
				if(strlen($state) < 46){
			     	//passed
				} else {
					$_SESSION['status']['register']['error'][] = 'The state is greater than 45 characters';
			    }
			}else{
				$_SESSION['status']['register']['error'][] = 'The state is less than 3 characters';
			}    
		} else{
			$_SESSION['status']['register']['error'][] = 'The state is not entered';
		}
		if(isset($_POST['postal'])){
			echo("postal"); 
			$postal = mysqli_real_escape_string($link, $_POST['postal']);
			$_SESSION['status']['register']['postal'] = $postal;
			if(strlen($postal)>3){
				if(strlen($postal) < 6){
			     	//passed
				} else {
					$_SESSION['status']['register']['error'][] = 'The postal code is greater than 5 characters';
			    }
			}else{
				$_SESSION['status']['register']['error'][] = 'The postal code is less than 3 characters';
			}    
		} else{
			$_SESSION['status']['register']['error'][] = 'The postal code is not entered';
		}


		if(empty($_SESSION['status']['register']['error'])){
			$instype = $_REQUEST["type"]; 
			$ins = $_REQUEST["ins"];
		//	echo($ins); die();
		 	//echo("empty"); die();
		 	if(register($ins,$instype,$primary,$phone,$fax,$email,$website,$fb,$linkedin,$street,$city,$state,$postal) === true){
		 		$_SESSION['status']['register']['success'] = true;
		 	} else {
		 		$_SESSION['status']['register']['error'][] = 'something went wrong while adding Insitute details';
		 	}
		 	// if(institution($institute) === true){
 			// 	$_SESSION['status']['register']['success'] = true;
		 	// } else {
		 	// 	$_SESSION['status']['register']['error'][] = 'something went wrong while adding institution name';
 			// }
		 	// if(institution_type($instype) === true){
 			// 	$_SESSION['status']['register']['success'] = true;
		 	// } else {
		 	// 	$_SESSION['status']['register']['error'][] = 'something went wrong while adding institution type';
 			// }
		 }
		//	echo("header"); die();
		header('Location: add_insdetail.php');
	} else {
		header('Location: add_insdetail.php');

	}