<html>
<head>
<script src="../../js/ajax.js"></script>
</head>
<body>
<div id="container">
<table id="customers">
  <tr>
    <th style="background-color:#1DA362">Date</th>
    <th colspan="2", style="background-color:#1DA362; "><?php echo date("d-m-20y"); ?></th>
    <th colspan="2", style="background-color:#1DA362"></th>
  </tr>
    
  <tr>
    <th>Priority</th>
    <th>Time</th>
    <th>Description</th>
    <th>Dismiss</th>
  </tr>
  
    
    <?php
    include "../Models/schedule_task.php";
    

$scheduleTask = new SendScheduleTaskHandler("","",""); //arguments not needed

$viewScheduleTask = $scheduleTask->viewScheduledTask("DATE(reg_date) = CURDATE()");

foreach ($viewScheduleTask as $value) {
    $id = $value[0];
    $priority = $value[1];
    $time = $value[2];
    $description = $value[3];

    echo "<tr class='alt'>";
    echo "<td>$priority <br></td>";
    echo "<td>$time <br></td>";
    echo "<td>$description <br></td>";
    $fordelid = "../controlers/scheduleDeletecontroler.php?delid=$id";
    
    echo "<td><input type=\"submit\" value=\"Dismiss\" onclick='ajaxInsertFile(\"../controlers/scheduleDeletecontroler.php?delid=$id\", \"dynamic\")'></td>";
    echo "</tr>";
    
}

?>

</table>
</div>
</body>
</html>