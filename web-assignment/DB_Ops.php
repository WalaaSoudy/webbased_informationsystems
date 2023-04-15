<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

mysqli_select_db($conn, "user");

if(isset($_GET['q']))
{

  $q = $_REQUEST["q"];
  $query = "select * from users where username = '" . $q . "';";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result)>0)
  {
    echo"This name is already used";
  }
  else
  {
    echo"<br>";
  }
}

if(isset($_REQUEST['submit']))
{
$name = "'" . $_REQUEST['fullName'] . "'" ;
$userName = "'" . $_REQUEST['userName'] . "'";
$input_date=$_REQUEST['dob'];
$date="'" . date("Y-m-d",strtotime($input_date)) . "'";
$address = "'" . $_REQUEST['address'] . "'";
$email = "'" . $_REQUEST['email'] . "'";
$pass = "'" . $_REQUEST['pass'] . "'";
$phone = "'" . $_REQUEST['phone'] . "'";
$img= "'" . $_FILES['img']['name'] . "'" ;

$query = "insert into users (name,username,password,email,address,phone,imgname,dob) values (" . $name ."," .$userName ."," .$pass ."," .$email ."," .$address ."," .$phone.",".$img .",". $date.");";

if(mysqli_query($conn, $query)){
  echo "Done";
} else{
  echo mysqli_error($conn);
}
 
require "Upload.php";
uploadimg();

}
