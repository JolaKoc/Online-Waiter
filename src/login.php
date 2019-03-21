<?php
include_once 'dbconn.php';
session_start();

if(isset($_POST['submit'])){
    $db=new \core\database();
    $db=$db->connect();
    $email=mysqli_real_escape_string($db,$_POST['email']);
    $password=mysqli_real_escape_string($db,$_POST['pass']);

    $sql="Select * from admin where email='".$email."' and password='".$password."'";
    $result=mysqli_query($db,$sql);

    $result1=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $row=mysqli_num_rows($result);
    if($row==1) {
        //initialize session

        $_SESSION['login_user'] = $result1['id'];
        //redirect to profile
        header("location: adminEmployee.php");

    }else{
        $sql="Select * from employee where email='".$email."' and password='".$password."'";
        $result=mysqli_query($db,$sql);

        $result1=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $row=mysqli_num_rows($result);
        if($row==1){
            $_SESSION['login']=$row['id'];
            header("location:employer.php");
        }else
            echo "<script> alert('Check your credentials')</script>";
    }
}
?>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<form action="" method="post" class="login">
    <div class="login">
        <h2>Log in</h2>
        <p>
            <label for="email" class="floatLabel">Email</label>
            <input type="text" name="email">
        </p>
        <p>
            <label for="password" class="floatLabel">Password</label>
            <input type="password" name="pass">
        </p>
        <p>
            <input type="submit" name="submit" id="submit">
        </p>
    </div>
</form>
