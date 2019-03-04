<?php

    session_start();

?><!doctype html>
<html>
	<head>
		<script src="js/bootstrap.js"></script>
		<link rel="stylesheet" href="css/bootstrap.css" />
	</head>
	<body>
		<div class="container">
        	<div class="row-fluid">
            	<div class="span12">
                	<div class="span6">
                    	<div class="area">
                            <form class="form-horizontal" method="post" action="">
                                <div class="heading">
                                    <h4 class="form-heading">Sign In</h4>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputUsername">Username</label>
                                    <div class="controls">
                                        <input type="text" id="inputUsername" name="username" placeholder="Username" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Password</label>
                                    <div class="controls">
                                        <input type="password" id="inputPassword" name="password" placeholder="Password" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <label class="checkbox">
                                            <input type="checkbox" name="remember_me"> Keep me signed in </input>
                                        </label>
                                        <button type="submit" name="sign-in" class="btn btn-success">Sign In</button>
                                        <button type="submit" name="forgot-pass" class="btn">Forgot my Password</button>
                                    </div>
                                </div>  
                                <div class="alert alert-error">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <p><strong>Access Denied!</strong><br /> Please provide valid login details.</p>
                                </div>
                            </form> 
                        </div>                           
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php

    unset($_SESSION['status']);

?>