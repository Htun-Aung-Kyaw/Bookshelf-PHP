<html>
	<head><title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<style type="text/css">
	body{background-color: #fffefa }
	h1{margin-left: 550px;}
	#main{
	   position: absolute;
	   left: 500px;
	}
	</style>
	</head>
	<body>
	<h1>Sign In</h1>
		<div id="main"><form action="home_login.php" method="post">
			<label for="name">UserName</label>
			<div><input type="text" name="username" id="name" /></div>
			
			<label for="pwd">Password</label>
			<div><input type="password" name="password" id="pwd" /></div>
			
			<div><button type="submit" name="submit" value="login" class="button">Login</button></div>
		</form>
		<p>Click here to <a href="register.php">Sign Up</a></p></div>
	</body>
</html>