<?php

session_start();
include_once 'dbconn.php';
require 'Admin.php';

$d=new \core\database();

if(isset($_POST['submit'])){

        $db=$d->connect();
        $name=mysqli_real_escape_string($db,$_POST['name']);
        $surname=mysqli_real_escape_string($db,$_POST['surname']);
        $email=mysqli_real_escape_string($db,$_POST['email']);
        $password=mysqli_real_escape_string($db,$_POST['password']);
        $pos=mysqli_real_escape_string($db,$_POST['pos']);
        $pay=mysqli_real_escape_string($db,$_POST['pay']);
            $action=new \PHPSTORM_META\Admin(1,$name,$surname,$email,$password);
       $action->createEmployer($name,$surname,$email,$password,$pay,$pos);
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
        <label for="Payment" class="floatLabel">Payment</label>
        <input id="Payment" name="pay" type="text" required>
    </p>
    <p>
        <label for="position" class="floatLabel">Position</label>
        <input id="position" name="pos" type="text" required>
    </p>
    <p>
        <input type="submit" value="Create My Account" name="submit" id="submit" onclick="canSubmit()">
    </p>
</form>
<script src='jquery-3.3.1.min.js'></script>

<script  src="script.js"></script>

</body>

</html>

