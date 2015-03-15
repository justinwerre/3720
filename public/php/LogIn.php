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

    var_dump($arr);

    $storedUser = $arr[0];
    $storedPass = $arr[1];
    $storedSalt = $arr[2];

    if($storedUser == $username && $storedPass == crypt($username, $storedSalt))
    {
        $_SESSION['username']=$username;
        header("/html/checker.html");
    }
    else 
    {
        echo "Wrong Username or Password, redirecting in 3 seconds..."
        header("refresh:3;url:index.html");
    }
}

fclose($file);
?>