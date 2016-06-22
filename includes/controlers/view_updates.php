<?php
require_once '../Models/Update.php';

$update = new SendUpdateHandler("",""); //arguments not needed

echo "<div id='viewUpdate'>";
$viewUpdate = $update->viewUpdate("DATE(reg_date) = CURDATE()");
//echo date("d-m-20y");
echo "<ol>";
foreach ($viewUpdate as $value) {
    $time = $value[3];
    $h1 = $time[11];
    $h2 = $time[12];
    
    $m1 = $time[14];
    $m2 = $time[15];
    
    $s1 = $time[17];
    $s2 = $time[18];

    $time = $h1. "" .$h2. ":" .$m1."".$m2.":".$s1."".$s2;
    $title =  $value[1];
    $description = $value[2];
    echo "$title <br>";
}
echo "</ol>";
echo "</div>";

?>