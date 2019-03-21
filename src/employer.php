<?php

    require 'dbconn.php';//connection with db
    $db=new \PHPSTORM_META\database();
    $query="select *  from arrFood";
    $result = mysqli_query($db->connect(), $query);
    $numrows=mysqli_num_rows($result);
    if($numrows==0){
        echo "<p>There is no order  yet</p>";
    }else {
        echo "<table id='myTable'><tr><th>Id</th><th>Name</th><th>Table id</th><th>Cost</th><th>Deliver</th></tr>";
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td> <td>".$row['tableId']."</td><td>".$row['cost']."</td>";
            echo "<td><button type='button' name='delete' class='delete' onclick='deleteRow(this)'>Deliver</button></td>";
            echo  "</tr>";
        }
        echo "</table>";
    }
?>
<head>
    <script src="jquery-3.3.1.min.js"></script>
</head>
<script>
    function deleteRow(var r) {
        var i = r.parentNode.parentNode.rowIndex;
        document.getElementById("myTable").deleteRow(i);
    }
</script>
