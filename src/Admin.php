<?php
/**
 * Created by PhpStorm.
 * User: Jola
 * Date: 1/31/2018
 * Time: 6:27 PM
 */

namespace PHPSTORM_META;
use core\database;

require 'controller.php';
include_once 'dbconn.php';

class Admin implements controller
{
    private $id;
    private $name;
    private $surname;
    private $email;
    private $password;

    private $con;//for db connection
    //constructor
    public function __construct($id,$name,$surname,$email,$pass){
        $this->name=$name;
        $this->surname=$surname;
        $this->email=$email;
        $this->password=$pass;
        $this->con = new database();
    }

    public function getName(){
        return $this->name;
    }
    public function getSurname(){
        return $this->surname;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function createEmployer($name, $surname, $email, $password, $payment, $position)
    {
        $query = "Insert into employee SET name='$name',surname='$surname',email='$email',password='$password',payment='$password',position='$position'";
        if(\mysqli_query($this->con->connect(), $query)){
            return true;
        }
        else {
            echo "Insert error: ". \mysqli_error($this->con->connect());
            return false;
        }
    }

    public function deleteEmployer($id)
    {
        $sql = "DELETE FROM employee WHERE id='".$id."'";

        if(\mysqli_query($this->con->connect(), $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($this->con->connect());
        }
    }

    public function updateEmployer($name, $surname, $email, $password, $payment, $position,$i)
    {

        $sql = "UPDATE employee SET name = '".$name."', surname = '".$surname."', email = '".$email."', password = '".$password."', payment = '".$payment."', position = '".$position."' WHERE id = '".$i."'";

        if ($this->con->connect()->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $this->con->connect()->error;
        }
    }


    public function retrieveEmployer($id)
    {
        $query = "Select * from employee where id='".$id."'";
        // connection obj , query
        $result = \mysqli_query($this->con->connect(),$query);
        if(!$result){
            echo "Some error occurred ". \mysqli_error($this->con->connect());
            exit();
        }
        $row = \mysqli_fetch_array($result, MYSQL_ASSOC);
        $numRows = \mysqli_num_rows($result);
        if($numRows == 1){
            //return row
            //return object
            $employee = new Employee($row['name'],$row['surname'],$row['email'],$row['password'],$row['position'],$row['payment']);
            return $employee;
        }
    }

    public function createAdmin($id,$name, $surname, $email,$password)
    {
        $query = "Insert into admin VALUES('$id','$name','$surname','$email','$password')";
        if(\mysqli_query($this->con->connect(), $query)){
            return true;
        }
        else {
            echo "Insert error: ". \mysqli_error($this->con->connect());
            return false;
        }
    }

    public function deleteAdmin($id)
    {

        $sql = "DELETE FROM admin WHERE id='".$id."'";

        if(\mysqli_query($this->con->connect(), $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($this->con->connect());
        }
    }

    public function updateAdmin($name, $surname, $email, $password,$i)
    {
        $sql = "UPDATE admin SET name = '".$name."', surname = '".$surname."', email = '".$email."', password = '".$password."' WHERE id = '".$i."'";

        if ($this->con->connect()->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $this->con->connect()->error;
        }
    }

    public function addFood($name, $cost, $ingredients, $sell, $category)
    {
        $query = "Insert into food VALUES('$name','$cost','$ingredients','$sell','$category')";
        if(\mysqli_query($this->con->connect(), $query)){
            return true;
        }
        else {
            echo "Insert error: ". \mysqli_error($this->con->connect());
            return false;
        }
    }

    public function deleteFood($id)
    {

        $sql = "DELETE FROM food WHERE id='".$id."'";

        if(\mysqli_query($this->con->connect(), $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($this->con->connect());
        }
    }

    public function updateFood($name, $cost, $ingredients, $sell, $category,$i)
    {
        // TODO: Implement updateFood() method.
        $sql = "UPDATE food SET name = '".$name."', cost = '".$cost."', ingrediends = '".$ingredients."', sell = '".$sell."', category = '".$category."' WHERE id = '".$i."'";

        if ($this->con->connect()->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $this->con->connect()->error;
        }
    }
}