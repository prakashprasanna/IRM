<?php

	session_start();
	require 'functions.php';

	if(isset($_POST['sign-in'])){
		if(isset($_POST['username'])){
			$username = mysqli_real_escape_string($link, $_POST['username']);
			$_SESSION['status']['login']['username'] = $username;
			if(strlen($username)>3){
			//	echo("username > 3");
				if(strlen($username) < 31){
					if(user_exists($username) === false){
						$_SESSION['status']['login']['error'][] = 'Please enter valid username.';
					} else{
						//passed
			//			echo("username pass");
					}
				} else {
					$_SESSION['status']['login']['error'][] = 'The username is greater than 30 characters';
			    }
			}else{
				$_SESSION['status']['login']['error'][] = 'The username is less than 4 characters';
			}    
		} else{
			$_SESSION['status']['login']['error'][] = 'The username is not entered';
		}
		if(isset($_POST['password'])){
			$password = mysqli_real_escape_string($link, $_POST['password']);
			if(strlen($password)>=8){
			//	echo("password > 8");
				$password = hash_function($password);
			} else {
				$_SESSION['status']['login']['error'][] = 'The password is less than 8 characters long';
			}
		} else{
			$_SESSION['status']['login']['error'][] = 'The password is not entered';
		}

if(empty($_SESSION['status']['login']['error'])){
		if(is_user_activated($username)) {
//			if(isset($_POST['remember_me'])){
//				$remember_me = true;
//			} else {
//				$remember_me = false;
//			}
//			if(login($username, $password, $remember_me) === false){
			if(login($username, $password) === false){
				$_SESSION['status']['login']['error'][] = 'Incorrect Username or Password.';
			} else {
				$_SESSION['status']['login']['success'] = true;
			}
		} else {
			$_SESSION['status']['login']['error'][] = 'Your account isn\'t activated yet.';
		}
	}
} else {
	header('Location: index.php');
}
header('Location: index.php');