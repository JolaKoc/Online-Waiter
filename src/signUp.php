<?php

include_once 'dbconn.php';
require 'Admin.php';
session_start();

        if(isset($_POST['submit'])){
            $db=new \core\database();
            $db=$db->connect();
            $id=mysqli_real_escape_string($db,$_POST['id']);
        $name=mysqli_real_escape_string($db,$_POST['name']);
        $surname=mysqli_real_escape_string($db,$_POST['surname']);
        $email=mysqli_real_escape_string($db,$_POST['email']);
        $password=mysqli_real_escape_string($db,$_POST['password']);
        $action=new \PHPSTORM_META\Admin($id,$name,$surname,$surname,$password);
         $action->createAdmin($id,$name,$surname,$email,$password);
       header("location:adminEmployee.php");
    }
?>
<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>Sign Up </title>

    <link rel="stylesheet" href="style.css">


</head>

<body >

<form action="signUp.php" method="post" class="signUp">
    <h2>Sign Up</h2>
    <p>
        <label for="id" class="floatLabel">Id</label>
        <input id="name" name="id" type="text" required>
    </p>
    <p>
        <label for="name" class="floatLabel">Name</label>
        <input id="name" name="name" type="text" required>
    </p>
    <p>
        <label for="surname" class="floatLabel">Surname</label>
        <input id="surname" name="surname" type="text" required>
    </p>
    <p>
        <label for="Email" class="floatLabel">Email</label>
        <input id="Email" name="email" type="text" required>
    </p>
    <p>
        <label for="password" class="floatLabel">Password</label>
        <input id="password" name="password" type="password" onkeyup="passwordEvent()" required >
        <span>Enter a password longer than 8 characters</span>
    </p>
    <p>
        <label for="confirm_password" class="floatLabel">Confirm Password</label>
        <input id="confirm_password" name="confirm_password" type="password" onkeyup="confirmPasswordEvent()" required>
        <span >Your passwords do not match</span>
    </p>
    <p>
        <input type="submit" value="Create My Account" id="submit" onclick="canSubmit()">
    </p>
</form>
<script src='jquery-3.3.1.min.js'></script>

<script  src="script.js"></script>

</body>

</html>

