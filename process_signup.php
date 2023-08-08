<?php
$db_host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "libraryproject";
$id= $_POST['id'];
$email=$_POST['email'];
$password= $_POST['password'];
// to connect database

 $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
 else{
    $sql = "INSERT INTO login (id,username,password)
VALUES ('$id','$email','$password')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close(); 
 }
?>