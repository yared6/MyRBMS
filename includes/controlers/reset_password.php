<?php
    echo "<div id='reset'>";
    require_once '../Models/User.php';
    // make sure that all fields are set
    if (!isset($_POST['email']) or !isset($_POST['pwd']) or !isset($_POST['username']) or !isset($_POST['newpassword'])){
        echo "<center><p> please fill all fields! </p></center>";   
    }
    else{
    $username=$_POST['username'];
    $email=$_POST['email'];
    $pwd=$_POST['pwd'];
    $newpwd=$_POST['newpassword'];
    $reset=new Users($username,"");
    $reset->changepassword($email,$pwd,$newpwd);
    header("Location: ../../index.php");
    
    echo "</div>"; 
    }
?>