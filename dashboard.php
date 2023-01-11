<?php
  session_start();

 if (isset($_SESSION['Saved_userId'])) {
 	$userName = $_SESSION["Saved_userId"];
 }else{
 	 header('location: index.php');
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>DashBoard</title>
	<link rel="stylesheet" href="style2.css">
</head>
<body>

<div class="main">
		
  	<div class="top_bar">
  		<p id="title"><i class="fa fa-user-circle" aria-hidden="true"></i> <span></span></p>

  		<button id="logoutBtn">Log Out <i class="fa fa-sign-out" aria-hidden="true"></i></button>
  	</div>
	

  	<div class="profile">
  		<p id="userName">Welcome, <span></span></p>
		<script src="https://apps.elfsight.com/p/platform.js" defer></script>
        <div class="elfsight-app-574184a5-dbad-4bb1-a83f-59a4c3224091"></div>
		<button onclick="document.location='themoviedb.html'">The Movie Database App</button>
		
  	</div>
	


</div> 


<script>
	let logoutBtn = document.querySelector('#logoutBtn');
	let userName = document.querySelector('#userName span');
	let title = document.querySelector('#title span');

	logoutBtn.addEventListener("click", function(){
		window.location.href = "logout.php";
	})

	userName.innerHTML = "<?php echo $userName; ?>";
	title.innerHTML = "<?php echo $userName; ?>";

</script>
	
</body>
</html>