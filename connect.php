<?php
$host="localhost";
$user="root";
$pass= "";
$db="login_db";
$conn=new mysqli($host,$user,$pass,$db);
if ($conn->connect_error) {
    echo "Failed to connect". $conn->connect_error;
}
?>