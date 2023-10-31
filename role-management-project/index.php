<?php 
session_start();
if(!isset($_SESSION["email"])){
   header("Location: login.php");
}
if($_SESSION["role"]=="user"){
    header("Location: ./user.php");
}
if($_SESSION["role"]=="admin"){
    header("Location: ./role-management.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>welcome to index page</h1>
</body>
</html>
