<?php
    session_start();
    echo "<div id='verif'>";
    
    require_once '../Models/User.php';
    if (!isset($_POST['username']) or !isset($_POST['password'])){
        echo "<center><p> please fill both the correct user name and password! </p></center>";   
    }
    else{
    $username=$_POST['username'];
    $pwd=$_POST['password'];
    $login=new Users($username,$pwd);
    if($login->login()){
        $_SESSION['user']=1;
    }
    
    
    echo "</div>";
    }
?>