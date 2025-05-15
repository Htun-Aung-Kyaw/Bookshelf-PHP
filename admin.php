<?php
$host="localhost";
$userName="root";
$password="";
$dbn = "mydb";
$conn=mysqli_connect($host,$userName,$password,$dbn);
?>
<html>
	<head><title>Administation</title>
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<link rel="stylesheet" type="text/css" href="css/button.css">
	<style type="text/css">
	body{background-color: #fffefa }
	h1{margin-left: 450px;}
    .main{
		width: 600px;
		height: 600px;
		float: left;
		margin-left: 60px;
	}
	
	.page{
	   width: 400px;
	   height: 600px;
	   float: left;
	   clear: both;
	   border-right: 2px solid red;
	   
	}
	.hak {
font-size: 16px;
background-color: white;
color: black;
border: 2px solid #f44336;
outline: none;
}
.hak:hover{
background-color: #f44336;
color: white;
}
.hak:hover>a{
text-decoration:none;
color: white;
}
.hak>a{
outline:none;
text-decoration:none;
}
	.tool p{font-size: 25px;}
	
	</style>
	</head>
	<body>
	<h1>Book Shelf Administration</h1>
	<h2>Administration tools</h2>
	<button type="button" class="hak"><a href="sign_in.php">Log out</a></button>
		<div class="page">
			<div class="tool">
				<p class="button1"><a href="admin.php?action=insert">Insert</a></p>
				<p class="button2"><a href="admin.php?action=update">Update</a></p>
				<p class="button3"><a href="admin.php?action=delete">Delete</a></p>
				<p class="button5"><a href="admin.php?action=search">Search</a></p>
			</div>
		</div>	
	</body>
</html>
<?php
if(isset($_GET['method']) and $_GET['method']  =='insert')
    echo "<p style='color: #4CAF50;font-size: 20px;text-align: center;'>Insert Successfully</p>";
if(isset($_GET['method']) and $_GET['method']  =='update')
    echo "<p style='color: #008CBA;font-size: 20px;text-align: center;'>Update Successfully</p>";
if(isset($_GET['method']) and $_GET['method']  =='delete')
    echo "<p style='color: #f44336;font-size: 20px;text-align: center;'>Delete Successfully</p>";
    
if(isset($_GET['action']) and $_GET['action']=='insert')
    insert();
elseif(isset($_GET['action']) and $_GET['action']=='update')
    update();
elseif(isset($_GET['action']) and $_GET['action']=='delete')
    delete();
elseif(isset($_GET['action']) and $_GET['action']=='search')
    search();

if(isset($_POST['submit']) and $_POST['submit']=="search")
    displayRecord();

function insert() {
?>
<div class="main">
	<form action="edit.php" method="post">
		<label for="name">BookName</label>
		<div><input type="text" name="bookname" id="name" /></div>
		<label for="author">Author</label>
		<div><input type="text" name="author" id="author" /></div>
		<label for="cover">Cover</label>
		<div><input type="text" name="cover" id="cover" /></div>
		<label for="edition">Edition</label>
		<div><input type="text" name="edition" id="edition" /></div>
		<label for="pdf">PDF Name</label>
		<div><input type="text" name="pdf" id="pdf" /></div>
		<label for="pwd">Password</label>
		<div><input type="password" name="password" id="pwd" /></div>
		<div><button type="submit" name="submit" value="insert" class="button">Insert</button></div>
	</form>
</div>		
<?php
}
function update() {
?>
<div class="main">
	<form action="edit.php" method="post">
		<label for="name">BookName</label>
		<div><input type="text" name="bookname" id="name" /></div>
		<label for="author">Author</label>
		<div><input type="text" name="author" id="author" /></div>
		<label for="cover">Cover</label>
		<div><input type="text" name="cover" id="cover" /></div>
		<label for="edition">Edition</label>
		<div><input type="text" name="edition" id="edition" /></div>
		<label for="pwd">Password</label>
		<div><input type="password" name="password" id="pwd" /></div>
		<div><button type="submit" name="submit" value="update" class="button">Update</button></div>
	</form>
</div>		
<?php
}
function delete() {
?>
<div class="main">
	<form action="edit.php" method="post">
		<label for="name">BookName</label>
		<div><input type="text" name="bookname" id="name" /></div>
		<label for="author">Author</label>
		<div><input type="text" name="author" id="author" /></div>
		<label for="pwd">Password</label>
		<div><input type="password" name="password" id="pwd" /></div>
		<div><button type="submit" name="submit" value="delete" class="button">Delete</button></div>
	</form>
</div>		
<?php
}
function search() {
?>
<div class="main">
	<form action="admin.php" method="post">
		<label for="name">BookName</label>
		<div><input type="text" name="bookname" id="name" /></div>
		<label for="author">Author</label>
		<div><input type="text" name="author" id="author" /></div>
		<label for="edition">Edition</label>
		<div><input type="text" name="edition" id="edition" /></div>
		<div><button type="submit" name="submit" value="search" class="button">Search</button></div>
	</form>
</div>		
<?php
}
function displayRecord(){
    global $conn;
    $name = $_POST['bookname'];
    $author = $_POST['author'];
    $edition = $_POST['edition'];
    $sql="SELECT * FROM BOOK WHERE NAME='$name' AND AUTHOR='$author'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    if(isset($row['NAME'])){
?>
<div class="main">
<p style="color: #f44336;font-size: 20px;text-align: center;">Records Exist</p>
<table>
<tr>
<th>Name</th>
<th>Author</th>
<th>Edition</th>
</tr>
<?php 
while($row){
echo "<tr>";
echo "<td>".$row['NAME']."</td>";
echo "<td>".$row['AUTHOR']."</td>";
echo "<td>".$row['EDITION']."</td>";
echo "</tr>";
$row=mysqli_fetch_array($result);
}
?>
</table></div>
<?php
}
else
  echo '<p style="color: #f44336;font-size: 20px;text-align: center;">Records did not exist</p>';  
}
$conn='';
?>