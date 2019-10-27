<?php
$server="localhost";
$username="becky";
$password="";
$db="loginSys";

//create connection
$conn = mysqli_connect( $server, $username, $password, $db);

//check connection

if(!$conn){
    die("Connection not sucessfully:" . mysqli_connect_error());
}
 