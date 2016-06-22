<?php
    require_once "../Models/schedule_task.php";
    $priority=isset($_POST['priority']) ? $_POST['priority'] : '';
    $time=isset($_POST['time']) ? $_POST['time'] : '';
    $description=isset($_POST['description']) ? $_POST['description'] : '';
    $scheduleTask = new SendScheduleTaskHandler($priority, $time, $description);
    $scheduleTask->sendScheduledTask();
    header("Location: ../views/manager_home.php");
?>