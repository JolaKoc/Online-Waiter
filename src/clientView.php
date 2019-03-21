<?php
include_once "dbconn.php";
include_once "Table.php";

session_start();
if(isset($_SESSION['table'])) {
   $client =new \core\Table();
    $db = new \core\database();
    $query = "Select * from food where id='".$_SESSION['table']."'";
    $result = mysqli_query($db->connect(), $query);
    $numrows = mysqli_num_rows($result);
    if ($numrows == 0) {
        echo "<p>There is no pizza for today</p>";
    } else {
        echo "<table><tr><th>Name</th><th>Ingredients</th><th>Cost</th><th>Order</th></tr>";
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<tr><td>" . $row['name'] . "</td><td>" . $row['ingredients'] . "</td> <td>" . $row['sell'] . "</td>";
            echo "<td><button type='button' name='delete' onclick='" . $client->order($this)."'>Order</button></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    ?>
    <head>
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <div class="icon-bar">
        <a href="#" class="active"><i class="fa fa-pizza"></i>Pizza</a>
        <a href="drinks.php"><i class="fa fa-beer" aria-hidden="false"></i>Drinks</a>
        <a href="deserts.php"><i class="fa fa-birthday-cake" aria-hidden="true"></i>&nbsp;Deserts</a>
        <a href="today.php"><i class="fa fa-food" aria-hidden="true"></i>&nbsp;Today's Menu</a>
    </div>
    <?php
}
    ?>