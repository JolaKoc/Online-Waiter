<?php
/**
 * Created by PhpStorm.
 * User: Jola
 * Date: 1/31/2018
 * Time: 5:13 PM
 */

namespace core;
include_once 'dbconn.php';

class Table
{
    public $id;

    public function __construct(){
        $id=0;
    }

    public function order($i){
            $db=new \core\database();
            $query = "Select * from food where id='".$i."'";
            // connection obj , query
            $result = \mysqli_query($db->connect(),$query);
            if(!$result){
                echo "Some error occurred ". \mysqli_error($db->connect());
                exit();
            }

            $row = \mysqli_fetch_array($result, MYSQL_ASSOC);
            $numRows = \mysqli_num_rows($result);
            if($numRows == 1){
                //if there is one match in food database then we send it into arrived food db
                $msql="Insert into arrFood name='".$row['name']."'tableId='".$this->id."'cost='".$row['cost']."'sell='".$row['sell']."'";
                $result = \mysqli_query($db->connect(),$msql);
            }

    }
}