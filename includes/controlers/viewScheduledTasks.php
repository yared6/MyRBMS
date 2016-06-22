<?php
require_once '../Models/schedule_task.php';

$scheduleTask = new SendScheduleTaskHandler("","",""); //arguments not needed

echo "<div id='viewScheduleTask'>";
$viewScheduleTask = $scheduleTask->viewScheduledTask("DATE(reg_date) = CURDATE()");

echo "<ol>";
foreach ($viewScheduleTask as $value) {
    $priority = $value[1];
    $time = $value[2];
    $description = $value[3];

    
    
    echo "$priority <br>";
}
echo "</ol>";
echo "</div>";

?>