<?php
include 'dbconn.php';
include 'Admin.php';
session_start();
if (isset($_SESSION['login_user'])){
    $db = new \PHPSTORM_META\database();
    $sql = "Select * from admin where id='".$_SESSION['login_user']."'";
    $result = mysqli_query($db->connect(),$sql);
    $user = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result)==1){
        $admin=new \PHPSTORM_META\Admin($result['name'],$result['surname'],$result['email'],$result['password']);

?>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<div class="icon-bar">
    <a href="adminEmployee.php" ><i class="fa fa-user"></i>Employee</a>
    <a href="#" class="active"><i class="fa fa-unlock" aria-hidden="false"></i>Admin</a>
    <a href="file.php"><i class="fa fa-file"aria-hidden="true"></i>File</a>
</div>
<form action="" method="post">
<div>
    <p>
        <label class="floatLabel">Name </label>
            <input type="text" value="<?php echo $admin->getName() ?>\">
    </p>
    <p>
        <label class="floatLabel">Surname </label>
        <input type="text" value="<?php echo $admin->getSurname() ?>\">
    </p>
    <p>
        <label class="floatLabel">Email </label>
        <input type="text" value="<?php echo $admin->getEmail() ?>\">
    </p>

    <p>
        <input type="button"  name="newAdmin" value="New Admin">

    </p>

</div>
</form>
    <?php
}
}
else {
    header("Location: login.php");
}

    if(isset($_POST['newAdmin'])){
        header("location:signUp.php");
    }
    ?>