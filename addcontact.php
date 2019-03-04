 <?php
	session_start();
	require 'functions.php';
	if(isset($_POST['save'])){
	   //print_r($_POST);
	   //die();
		if(isset($_POST['fn'])){
			echo("fn");
			$fn = mysqli_real_escape_string($link, $_POST['fn']);

			$_SESSION['status']['addcontact']['fn'] = $fn;

			if(strlen($fn)>2){

				if(strlen($fn) < 46){

					//passed
			
				} else {
					$_SESSION['status']['addcontact']['error'][] = 'The First name is greater than 26 characters';
				}
			} else {
				$_SESSION['status']['addcontact']['error'][] = 'The First name is less than 2 characters';
			}	
		} else{
			$_SESSION['status']['addcontact']['error'][] = 'The First name is not entered';
		}
		
		
		if(isset($_POST['pos'])){
			echo("pos");

			$pos = mysqli_real_escape_string($link, $_POST['pos']);
			$_SESSION['status']['addcontact']['pos'] = $pos;
			if(strlen($pos)>3){
				if(strlen($pos) < 45){
		  		//pass
				}else{
					$_SESSION['status']['addcontact']['error'][] = 'The Position is greater than 46 characters';
				}
			} else {
				$_SESSION['status']['addcontact']['error'][] = 'The Position is less than 3 characters';
			}	
		} else{
			$_SESSION['status']['addcontact']['error'][] = 'The Position is not entered';
		}
		
		if(isset($_POST['email'])){
			echo("email"); 
			$email = mysqli_real_escape_string($link, $_POST['email']);
			$_SESSION['status']['addcontact']['email'] = $email;
			if(strlen($email)>8){
				if(strlen($email) < 161){
			     	//passed
				} else {
					$_SESSION['status']['addcontact']['error'][] = 'The email is greater than 160 characters';
			    }
			}else{
				$_SESSION['status']['addcontact']['error'][] = 'The email is less than 8 characters';
			}    
		} else{
			$_SESSION['status']['addcontact']['error'][] = 'The email is not entered';
		}
		if(isset($_POST['phone'])){
			echo("phone"); 
			$phone = mysqli_real_escape_string($link, $_POST['phone']);
			$_SESSION['status']['addcontact']['phone'] = $phone;
			if(strlen($phone)>8){
				if(strlen($phone) < 15){
			     	//passed
				} else {
					$_SESSION['status']['addcontact']['error'][] = 'The phone is greater than 15 characters';
			    }
			}else{
				$_SESSION['status']['addcontact']['error'][] = 'The phone is less than 8 characters';
			}    
		} else{
			$_SESSION['status']['addcontact']['error'][] = 'The phone is not entered';
		}
		if(isset($_POST['mobile'])){
			echo("mobile");
			$mobile = mysqli_real_escape_string($link, $_POST['mobile']);
			$_SESSION['status']['addcontact']['mobile'] = $mobile;
			if(strlen($mobile)>8){
				if(strlen($mobile) < 15){
			     	//passed
				} else {
					$_SESSION['status']['addcontact']['error'][] = 'The mobile no is greater than 15 characters';
			    }
			}else{
				$_SESSION['status']['addcontact']['error'][] = 'The mobile no is less than 8 characters';
			}    
		} else{
			$_SESSION['status']['addcontact']['error'][] = 'The mobile no is not entered';
		}

		if(isset($_POST['dob'])){
			echo("dob");
			$dob = mysqli_real_escape_string($link, $_POST['dob']);
			$_SESSION['status']['addcontact']['dob'] = $dob;
			if(strlen($dob)>9){
				if(strlen($dob) < 11){
			     	//passed
				} else {
					$_SESSION['status']['addcontact']['error'][] = 'The DOB is greater than 10 characters';
			    }
			}else{
				$_SESSION['status']['addcontact']['error'][] = 'The DOB is less than 10 characters';
			}    
		} else{
			$_SESSION['status']['addcontact']['error'][] = 'The DOB is not entered';
		}
		
		if(empty($_SESSION['status']['addcontact']['error'])){
		 	//echo("empty"); die();
		 	$ins = $_REQUEST["ins"];
		 	$deptype = $_REQUEST["deptype"];
	//	 	$dob = $_REQUEST["datepicker"];
		// 	echo($dob); die();
		 	if(addcontact($fn,$ins,$dob,$pos,$deptype,$email,$phone,$mobile) === true){
		 		$_SESSION['status']['addcontact']['success'] = true;
		 	} else {
		 		$_SESSION['status']['addcontact']['error'][] = 'something went wrong while adding contact';
		 	}
		 }
		//	echo("header"); die();
		header('Location: add_contact.php');
	} else {
		header('Location: add_contact.php');

	}