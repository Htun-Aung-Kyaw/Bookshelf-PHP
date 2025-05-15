<?php
$host="localhost";
$userName="root";
$password="";
$dbn = "mydb";
$conn=mysqli_connect($host,$userName,$password,$dbn);
$name=$_POST['username'];
$pwd=$_POST['password'];
$sql = "SELECT * FROM login WHERE NAME = '$name'";
$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);
$sql1 = "SELECT * FROM admin WHERE NAME = '$name'";
$result1=mysqli_query($conn, $sql1);
$row1=mysqli_fetch_array($result1);

if($name==$row1['NAME'] and $pwd==$row1['PASSWORD'])
    header("location: admin.php");

if($pwd==$row['PASSWORD']){
 header("location: books.php");
}elseif($name==$row['NAME'] and $pwd!=$row['PASSWORD']){
    echo "<p style='color:red;font-size:30px;'>Password did not match.</p><a href='sign_in.php' style='font-size: 20px;'>Press to Sign in again.</a>";
}elseif($row['NAME']=='' and $row['PASSWORD']=='')
    echo "<p style='color:red;font-size:30px;'>You are not a member.</p><a href='sign_in.php' style='font-size: 20px;'>Press to Sign in</a>|<a href='register.php' style='font-size: 20px;'>Press to Sign up</a>";
$conn='';
?>
