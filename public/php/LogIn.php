<?php
session_start();

$username=$_POST["username"];
$password=$_POST["password"];

//Should be using hash_equals, doesn't come up
$file = fopen("../credentials.txt", "r");

while(!feof($file))
{
    $line = fgets($file);
    $splitLine = explode(" ", $line);

    $storedUser = $splitLine[0];
    $storedPass = $splitLine[1];
    $storedSalt = $splitLine[2];

    if($storedUser == $username && $storedPass == crypt($password, $storedSalt))
    {
        $_SESSION['username']=$username;
        header('Location:../php/checker.php');
    }

}

fclose($file);

echo "Wrong Username or Password, redirecting in 3 seconds...";
header('refresh:3;../index.html');
?>