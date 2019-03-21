<?php

include_once 'dbconn.php';//connection with db
session_start();

if(isset($_SESSION['login_user'])) {
    $db = new \core\database();
    $query = "select *  from employee";
    $result = mysqli_query($db->connect(), $query);
    $result1=mysqli_fetch_assoc($result);
    $numrows = mysqli_num_rows($result1);
    if ($numrows == 0) {
        echo "<p>There is no employer hired yet</p>";
    } else {
        echo "<table><tr><th>Name</th><th>Surname</th><th>Email</th><th>Payment</th><th>Position</th><th>Delete </th></tr>";
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<tr><td>" . $row['name'] . "</td><td>" . $row['surname'] . "</td> <td>" . $row['email'] . "</td><td>" . $row['payment'] . "</td><td>" . $row['position'] . "</td>";
            echo "<td><button type='button' name='delete' onclick='delete(this)'>Delete Row</button></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    ?>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <div class="icon-bar">
        <button class="dropdown-btn"><i class="fa fa-user"></i> Employer<i class="fa fa-caret-down"></i></button>
        <div class="dropdown-container">
            <a href="signUpEmploy.php">New Employer</a>

        </div>
        <a href="adminProfile.php"><i class="fa fa-unlock" aria-hidden="false"></i>Admin</a>
        <a href="file.php"><i class="fa fa-file" aria-hidden="true"></i>Employee</a>
    </div>
    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script>
    <?php
}?>
<script>

</script>
