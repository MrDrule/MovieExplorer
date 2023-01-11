<?php
 $conn = mysqli_connect("localhost", "root", "", "projecthtml");

 session_start();
 if (isset($_SESSION['Saved_userId'])) {
 	header('location: dashboard.php');
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login / Signup</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="style2.css">
</head>
<body>

  <div class="main">
  
    
  	<!--  Πάνω μέρος -->
  	<div class="top_bar">
  		<p id="formTitle">LogIn</p>
  		<button id="signupScreen">SignUp <i class="fa fa-angle-right" aria-hidden="true"></i></button>
  		<button id="loginScreen">LogIn <i class="fa fa-angle-right" aria-hidden="true"></i></button> 
	</div>

  	<div class="bothForm">

  		<!-- LOGIN FORM -->
  		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="loginForm">

  			<div class="all_fields">
  				<fieldset>
  					<legend>Username &nbsp; <i class="fa fa-pencil" aria-hidden="true"></i></legend>

  					<input type="text" id="userName" name="login_userName" autocomplete="off">
  				</fieldset>

  				<fieldset id="password_field">
  					<legend>Password &nbsp; <i class="fa fa-lock" aria-hidden="true"></i></legend>

  					<input type="password" id="password" name="login_password" autocomplete="off">
  				</fieldset>
  			</div>

  			<input type="submit" id="loginBtn" name="login" value="Log In">

  		</form>


       <!-- REGISTER FORM -->
  		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="signupForm">

  			<div class="all_fields">
  				<fieldset>
  					<legend>New Username &nbsp; <i class="fa fa-pencil" aria-hidden="true"></i></legend>

  					<input type="text" id="userName" name="userName" autocomplete="off">
  				</fieldset>

  				<fieldset id="password_field">
  					<legend>New Password &nbsp; <i class="fa fa-lock" aria-hidden="true"></i></legend>

  					<input type="password" id="password" name="password" autocomplete="off">
  				</fieldset>
  			</div>

  			<input type="submit" id="loginBtn" name="signup" value="Create Account">

  		</form>

  	</div>
  </div>

<script src="main.js"></script>

</body>
</html>


<?php

/*REGISTER*/
 if (isset($_POST['signup'])) {

 	$userName = $_POST['userName'];
 	$password = md5($_POST['password']);

 	if ($userName != "" && $password != "") {
 		$sql = "SELECT username FROM users WHERE username = '{$userName}'";
 		$checkUserId = mysqli_query($conn, $sql) or die('error');

 		if (mysqli_num_rows($checkUserId) > 0) {
 			?>
             <script>
             	alert('UserName Already Exist!');
             	window.history.back();
             </script>
 			<?php
 		}else{

 			$sql = "INSERT INTO users (username,password) values('$userName','$password')";
 			$result = mysqli_query($conn, $sql) or die('error');

 			if ($result) {
 				?>
             <script>
             	alert('Account Created');
             	window.history.back();
             </script>
 			<?php
 			}
 		}
 	}else{
 		?>
            <script>
             	alert('Fill all the details');
             	window.history.back();
            </script>
 		<?php
 	}


/* LOGIN */

 }else if (isset($_POST['login'])) {

 	$userName = $_POST['login_userName'];
 	$password = md5($_POST['login_password']);

 	if ($userName != "" && $password != "") {
 		$sql = "SELECT username FROM users WHERE username = '{$userName}' AND password ='{$password}' ";
 		$checkUserId = mysqli_query($conn, $sql) or die('error');

 		if (mysqli_num_rows($checkUserId) > 0) {
             	$_SESSION["Saved_userId"] = $userName;
             	header("location: dashboard.php");
             	exit();
 		}else{
 			?>
 			<script>
             	alert('UserName & password not matched!');
             	window.history.back();
             </script>
            <?php
 		}

 	}else{
 		?>
            <script>
             	alert('Fill all the details');
             	window.history.back();
            </script>
 		<?php
 	}

 }

?>