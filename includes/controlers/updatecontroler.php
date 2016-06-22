<?php
    require_once "../Models/Update.php";
    $title=isset($_POST['title']) ? $_POST['title'] : '';
    $description=isset($_POST['description']) ? $_POST['description'] : '';
    $update = new SendUpdateHandler($title, $description);
    $update->sendUpdate();
    header("Location: ../views/manager_home.php");
?>