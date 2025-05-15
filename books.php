<?php 
$host="localhost";
$userName="root";
$password="";
$dbn = "mydb";
$conn=mysqli_connect($host,$userName,$password,$dbn);
?>
<html>
<head><title>Book Shelf</title>
<style type="text/css">
h1{
width: 400px;
margin-right: 900px;
display: inline;
}
.button {
font-size: 16px;
background-color: white;
color: black;
border: 2px solid #f44336;
outline: none;
}
.button:hover{
background-color: #f44336;
color: white;
}
.button:hover>a{
text-decoration:none;
color: white;
}
.button>a{
outline:none;
text-decoration:none;
}
.image{
width: 20%;
margin-right: 20px;
float: left;
margin-bottom: 40px;
}
.text{
width: 75%;
float: left;
vertical-aligin: center;
}
div.c{
clear: both;
margin-top: 20px;
}
div p{
padding: 10px;
font-size: 20px;
}
.name{color: blue;}
.author{color: green;}
.edition{color: #000000;}
</style>
</head>
<body>
<h1>Welcome to Book Shelf</h1>
<button type="button" class="button"><a href="sign_in.php">Log out</a></button>
<?php 
global $conn;
$sql="SELECT * FROM book ORDER BY NAME";
$result=mysqli_query($conn, $sql);
while($row=mysqli_fetch_array($result)){
?>
<div class="c">
<div class="image">
<img alt="image" src="photos/<?php echo $row['COVER'] ?>" width="200px" height="250px"></div>
<div class="text"><p class="name">Name: <?php echo $row['NAME']?></p><p class="author">Author: <?php echo $row['AUTHOR']?></p><p class="edition">Edition: <?php echo $row['EDITION']?></p><p><span class="down"><a href="#">Download</a></span>  |  <span class="read"><a href="pdf/<?php echo $row['PDF_NAME']?>">Read</a></span></p></div>
</div>
<?php } ?>
</body>
</html>
<?php 
$conn='';
?>