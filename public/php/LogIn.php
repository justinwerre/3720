<?php
session_start();

$username=$_POST["username"];
$password=$_POST["password"];

//Should be using hash_equals, doesn't come up
$file = fopen("credentials.txt", "r")

while(!feof($file))
{
    $line = fgets($file);
    $arr = explode(" ", $line);

    $storedUser = $arr[0];
    $storedPass = $arr[1];
    $storedSalt = $arr[2];

    if($storedUser == $username && $storedPass == crypt($username, $storedSalt))
    {
        $_SESSION['username']=$username;
        header("Location:../html/checker.html");
    }
}

echo "Wrong Username or Password, redirecting in 3 seconds..."
header("refresh:3;Location:../index.html");

fclose($file);
?>