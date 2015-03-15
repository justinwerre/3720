<?php

$username=$_POST["username"];
$password=$_POST["password"];
$newUser=$_POST["newUser"];
$newPass=$_POST["newPass"];

//Should be using hash_equals, doesn't come up
$file = fopen("credentials.txt", "r")

while(!feof($file))
{
    $line = fgets($file);
    $arr = explode(" ", $line);

    var_dump($arr);

    $salt = 1234;

    if($storedUser == $username && $storedPass == crypt($password, $storedSalt))
    {
        echo "User Added, redirecting in 3 seconds..."
        header("refresh:3;url:index.html");
    }
    else 
    {
        echo "Wrong Username or Password, redirecting in 3 seconds..."
        header("refresh:3;url:index.html");
    }
}

fclose($file);
?>