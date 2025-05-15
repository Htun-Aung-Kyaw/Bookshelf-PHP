<?php
$host="localhost";
$userName="root";
$password="";
$dbn = "mydb";
$conn=mysqli_connect($host,$userName,$password,$dbn);
if(isset($_POST['submit']) and $_POST['submit']=='register')
{
    if($_POST['username']=='' and $_POST['password']=='' and $_POST['password1']=='' and $_POST['email']=='')
        echo "<p style='width: 400px;text-align:center;color: white;background-color:red;font-size:30px;margin-left: 450px;'>You have not filled anything.</p>";
    elseif($_POST['password']==$_POST['password1'])
        register();
    else
        echo "<p style='width: 400px;text-align:center;color: white;background-color:red;font-size:30px;margin-left: 450px;'>Password did not match.</p>";
}
?>

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
	<h1>Register</h1>
		<div id="main"><form action="register.php" method="post">
			<label for="name">UserName</label>
			<div><input type="text" name="username" id="name" /></div>
			<label for="email">Email</label>
			<div><input type="text" name="email" id="email" /></div>
			<label for="pwd">Password</label>
			<div><input type="password" name="password" id="pwd" /></div>
			<label for="pwd1">Comfirm Password</label>
			<div><input type="password" name="password1" id="pwd1" /></div>
			<div><button type="submit" name="submit" value="register" class="button">Register</button></div>
		</form>
		<p>Do you have an account?<a href="sign_in.php">Sign in</a></p></div>
	</body>
</html>
<?php
function register() {
    global $conn;
    $name = $_POST['username'];
    $password = $_POST['password'];
    
    $sql="INSERT INTO login(NAME,PASSWORD) VALUES('$name','$password')";
    mysqli_query($conn, $sql);
    
    header("location: books.php");
}
$conn='';
?>
