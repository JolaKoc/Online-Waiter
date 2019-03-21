<?php
/**
 * Created by PhpStorm.
 * User: Jola
 * Date: 1/31/2018
 * Time: 5:16 PM
 */

namespace PHPSTORM_META;
require 'dbconn.php';


class Employee
{   private $name;
    private $surname;
    private $email;
    private $pass;
    private $position;
    private $payment;

    private $con;//for db connection

    public function __construct($n,$s,$e,$pass,$pos,$pay){
        $this->name=$n;
        $this->surname=$s;
        $this->email=$pass;
        $this->pass=$pass;
        $this->position=$pos;
        $this->payment=$pay;
        $this->con=new database();
}

    public function deliver($i){

            $sql = "DELETE FROM arrFood WHERE id='".$i."'";

            if(\mysqli_query($this->con->connect(), $sql)) {
                echo "Record deleted successfully";
            } else {
                echo "Error deleting record: " . mysqli_error($this->con->connect());
            }

    }

}