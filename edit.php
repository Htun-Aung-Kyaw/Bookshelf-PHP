<?php
$host="localhost";
$userName="root";
$password="";
$dbn = "mydb";
$conn=mysqli_connect($host,$userName,$password,$dbn);
$sql = "SELECT * FROM admin";
$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);
$adminpwd = $row['PASSWORD'];

if($_POST['submit']=='insert' and $_POST['password']==$adminpwd){
$name = $_POST['bookname'];
$author = $_POST['author'];
$cover = $_POST['cover'];
$edition = $_POST['edition'];
$pdf = $_POST['pdf'];
$sql="INSERT INTO book(NAME,AUTHOR,COVER,EDITION,PDF_NAME) VALUES('$name','$author','$cover','$edition','$pdf')";
$result=mysqli_query($conn, $sql);
header("location: admin.php?method=insert");
}
if($_POST['submit']=='update' and $_POST['password']==$adminpwd){
    $name = $_POST['bookname'];
    $author = $_POST['author'];
    $cover = $_POST['cover'];
    $edition = $_POST['edition'];
    $sql="UPDATE book SET NAME='$name',COVER='$cover',EDITION='$edition' WHERE AUTHOR = '$author'";
    $result=mysqli_query($conn, $sql);
    header("location: admin.php?method=update");
}
if($_POST['submit']=='delete' and $_POST['password']==$adminpwd){
    $name = $_POST['bookname'];
    $author = $_POST['author'];
    $sql="DELETE FROM BOOK WHERE NAME='$name' AND AUTHOR='$author'";
    $result=mysqli_query($conn, $sql);
    header("location: admin.php?method=delete");
}
$conn=='';
?>