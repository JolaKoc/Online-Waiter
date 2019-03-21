<?php
 namespace PHPSTORM_META;

 interface controller{
     //employer functions
     public function createEmployer($name,$surname,$email,$password,$payment,$position);//creates a new employer
     public function deleteEmployer($id);//delete employer
     public function updateEmployer($name,$surname,$email,$password,$payment,$position,$id);//update employer
     public function retrieveEmployer($id);
     //admin functions
     public function createAdmin($id,$name,$surname,$email,$password);
     public function deleteAdmin($id);
     public function updateAdmin($name,$surname,$email,$password,$id);
     //food functions
     public function addFood($name,$cost,$ingredients,$sell,$category);
     public function deleteFood($id);
     public function updateFood($name,$cost,$ingredients,$sell,$category,$id);

 }
?>