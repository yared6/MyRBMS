<?php
    require_once "../Models/register.php";
    
    $id=$_POST['employee_id'];
    $name=$_POST['employee_name'];
    $register = new RegisterHandler($id,$name);
    $register->registerEmployee();
    header("Location: ../views/manager_home.php");
    
?>