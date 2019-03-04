 <?php
	session_start();
	require 'functions.php';
	if(isset($_POST['save'])){
	   //print_r($_POST);
	   //die();
		
		if(isset($_POST['agent'])){
			echo("agent");

			$agent = mysqli_real_escape_string($link, $_POST['agent']);
			$_SESSION['status']['addagreement']['agent'] = $agent;
			if(strlen($agent)>2){
				if(strlen($agent) < 10){
		  		//pass
				}else{
					$_SESSION['status']['addagreement']['error'][] = 'The Agent Code is greater than 10 characters';
				}
			} else {
				$_SESSION['status']['addagreement']['error'][] = 'The Agent Code is less than 3 characters';
			}	
		} else{
			$_SESSION['status']['addagreement']['error'][] = 'The Agent Code is not entered';
		}

		if(isset($_POST['clause'])){
			echo("clause");

			$clause = mysqli_real_escape_string($link, $_POST['clause']);
			$_SESSION['status']['addagreement']['clause'] = $clause;
			if(strlen($clause)>2){
				if(strlen($clause) < 100){
		  		//pass
				}else{
					$_SESSION['status']['addagreement']['error'][] = 'The Agent Clause is greater than 100 characters';
				}
			} else {
				$_SESSION['status']['addagreement']['error'][] = 'The Agent Clause is less than 3 characters';
			}	
		} else{
			$_SESSION['status']['addagreement']['error'][] = 'The Agent clause is not entered';
		}


		if(isset($_POST['co'])){
			echo("co");

			$co = mysqli_real_escape_string($link, $_POST['co']);
			$_SESSION['status']['addagreement']['co'] = $co;
			if(strlen($co)>0){
				if(strlen($co) < 4){
		  		//pass
				}else{
					$_SESSION['status']['addagreement']['error'][] = 'The Commission is greater than 3 characters';
				}
			} else {
				$_SESSION['status']['addagreement']['error'][] = 'The Commission is less than 0 characters';
			}	
		} else{
			$_SESSION['status']['addagreement']['error'][] = 'The Comission is not entered';
		}
		if(isset($_POST['bo'])){
			echo("bo");

			$bo = mysqli_real_escape_string($link, $_POST['bo']);
			$_SESSION['status']['addagreement']['bo'] = $bo;
			if(strlen($bo)>0){
				if(strlen($bo) < 4){
		  		//pass
				}else{
					$_SESSION['status']['addagreement']['error'][] = 'The Bonus is greater than 3 characters';
				}
			} else {
				$_SESSION['status']['addagreement']['error'][] = 'The Bonus is less than 0 characters';
			}	
		} else{
			$_SESSION['status']['addagreement']['error'][] = 'The Bonus is not entered';
		}

		if(isset($_POST['start'])){
			echo("start");
			$start = mysqli_real_escape_string($link, $_POST['start']);
			$_SESSION['status']['addcontact']['start'] = $start;
			if(strlen($start)>9){
				if(strlen($start) < 11){
			     	//passed
				} else {
					$_SESSION['status']['addcontact']['error'][] = 'The start date is greater than 10 characters';
			    }
			}else{
				$_SESSION['status']['addcontact']['error'][] = 'The start date is less than 10 characters';
			}    
		} else{
			$_SESSION['status']['addcontact']['error'][] = 'The start date is not entered';
		}

		if(isset($_POST['exp'])){
			echo("exp");
			$exp = mysqli_real_escape_string($link, $_POST['exp']);
			$_SESSION['status']['addcontact']['exp'] = $exp;
			if(strlen($exp)>9){
				if(strlen($exp) < 11){
			     	//passed
				} else {
					$_SESSION['status']['addcontact']['error'][] = 'The End date is greater than 10 characters';
			    }
			}else{
				$_SESSION['status']['addcontact']['error'][] = 'The End date is less than 10 characters';
			}    
		} else{
			$_SESSION['status']['addcontact']['error'][] = 'The End date is not entered';
		}


		if(empty($_SESSION['status']['addagreement']['error'])){
			$ins = $_REQUEST["ins"];
			$con = $_REQUEST["con"];
		 	if(addagreement($ins,$con,$start,$exp,$agent,$clause,$co,$bo) === true){
		 		$_SESSION['status']['addagreement']['success'] = true;
		 	} else {
		 		$_SESSION['status']['addagreement']['error'][] = 'something went wrong';
		 	}
		 }
		
		//	echo("header"); die();
		header('Location: add_agreement.php');
	} else {
		header('Location: add_agreement.php');

	}