 <?php
	session_start();
	require 'functions.php';
	if(isset($_POST['save'])){
	   //print_r($_POST);
	   //die();
    

		if(isset($_POST['institute'])){
			echo("institute");
			$institute = mysqli_real_escape_string($link, $_POST['institute']);

			$_SESSION['status']['inscheck']['institute'] = $institute;

			if(strlen($institute)>5){

				if(strlen($institute) < 46){

					//passed
			
				} else {
					$_SESSION['status']['inscheck']['error'][] = 'The Institute name is greater than 26 characters';
				}
			} else {
				$_SESSION['status']['inscheck']['error'][] = 'The Institute name is less than 3 characters';
			}	
		} else{
			$_SESSION['status']['inscheck']['error'][] = 'The Institute name is not entered';
		}
		

		if(empty($_SESSION['status']['inscheck']['error'])){
			$instype = $_REQUEST["type"]; 
			
		//	echo($instype); die();
		 	//echo("empty"); die();
		 	if(inscheck($institute,$instype) === true){
		 		$_SESSION['status']['inscheck']['success'] = true;
		 	} else {
		 		$_SESSION['status']['inscheck']['error'][] = 'something went wrong while adding Insitute Name';
		 	}
		 	// if(institution($institute) === true){
 			// 	$_SESSION['status']['inscheck']['success'] = true;
		 	// } else {
		 	// 	$_SESSION['status']['inscheck']['error'][] = 'something went wrong while adding institution name';
 			// }
		 	// if(institution_type($instype) === true){
 			// 	$_SESSION['status']['inscheck']['success'] = true;
		 	// } else {
		 	// 	$_SESSION['status']['inscheck']['error'][] = 'something went wrong while adding institution type';
 			// }
		 }
		//	echo("header"); die();
		header('Location: add_insdetail.php');
	} else {
		header('Location: add_institution.php');

	}