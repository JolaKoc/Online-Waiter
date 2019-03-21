<?php

include_once 'dbconn.php';

session_start();
if(isset($_POST['submit'])){
    $db=new \core\database();
    $id=mysqli_real_escape_string($db->connect(),$_POST['id']);
    $vipId=mysqli_real_escape_string($db->connect(),$_POST['vip']);

    $sql="Select * from table1 where id='".$id."' or vipId='".$vipId."'";
    $result=mysqli_query($db->connect(),$sql);

    $result1=mysqli_fetch_assoc($result);
    $row=mysqli_num_rows($result);
    if($row==1){
        //initialize session
        $_SESSION['table']=$result1['id'];
        //redirect to profile.php
        header("location: clientView.php");
    }else{
        echo "<script>alert('Check your credentials')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#show").click(function(){
                $("form").show();
                $("#show").hide();
                $("h1").hide();
            });
        });

    </script>
</head>
<body>

<div class="icon-bar">
    <a href="#" class="active" ><i class="fa fa-home"></i>Home</a>
    <a href="login.php"><i class="fa fa-unlock" aria-hidden="false"></i>Admin</a>
    <a href="login.php"><i class="fa fa-user"aria-hidden="true"></i>&nbsp;Employee</a>
    <a href="aboutUs.html"><i class="fa fa-magic"aria-hidden="true"></i>&nbsp;About Us</a>
</div>
<h1 class="onl"><em>Online Waiter</em></h1>
    <div style="position: fixed; left: 600px; width=150px; background-color:green; ">
        <button id="show">  Enter to a table  </button>
    </div>
<form action="" method="post" style="display: none">
    <div class="login"  >
        <h2>Online waiter</h2>
        <p>
            <label for="tableId" class="floatLabel">Table Id</label>
            <input type="text" name="id">
        </p>
        <p>
             <label for="vip" class="floatLabel">Table Vip Key (optional)</label>
            <input type="text" name="vip">
        </p>
        <p>
            <input type="submit" name="submit" id="submit">
        </p>
    </div>
</form>
</body>
</html>