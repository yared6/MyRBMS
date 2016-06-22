<html>
<head>
<script src="../../js/ajax.js"></script>
</head>
<body>
<div id="container">
<table id="customers">
    
  <tr>
    <th>Report Number</th>
    <th>Date and Time</th>
    <th>Total Sales</th>
    <th>Juice Sales</th>
    <th>Bread Sales</th>
    <th>Cash on hand</th>
  </tr>

<?php
//echo "<div id='viewReport'>";
include "../Models/Report.php";


$but=$_REQUEST["button"];
//echo "20".Date("y-m-d");
if(!strcmp($_REQUEST["button"],"showall")){
   
    $allreports=new SendReportHandler('','','','');
    $report  = $allreports->viewReport();

    /*echo "<ul style='list-style:none;'>";
    $reportNo="<p3>report Number</p3>  <br>:";
    $sales="<p3>Total sales</p3>  <br> :";
    $juice="<p3>juice sales</p3>  <br>:";
    $bread="<p3>Bread sales</p3>  <br>:";
    $cash="<p3>Cash on hand </p3>  <br>:";
    $reg_date="<p3>Date</p3> <br>:";*/
    
    foreach ($report as $value) {
        echo "<tr class='alt'>";
        echo "<td>" .$value[0]. "</td>";
        echo "<td>" .$value[5]. "</td>";
        echo "<td>" .$value[1]. "</td>";
        echo "<td>" .$value[2]. "</td>";
        echo "<td>" .$value[3]. "</td>";
        echo "<td>" .$value[4]. "</td>";
        echo "</tr>";
    }
}
if (!strcmp($but,"showdaily")){
    $dailyreports=new SendReportHandler('','','','');
    $dreport  = $dailyreports->viewReport("DATE(reg_date)= CURDATE()");
   
    /*echo "<ul style='list-style:none;'>";
    $reportNo="<p3>report Number</p3>  <br>:";
    $sales="<p3>Total sales</p3>  <br> :";
    $juice="<p3>juice sales</p3>  <br>:";
    $bread="<p3>Bread sales</p3>  <br>:";
    $cash="<p3>Cash on hand </p3>  <br>:";
    $reg_date="<p3>Date</p3> <br>:";*/

    foreach ($dreport as $value) {
        echo "<tr class='alt'>";
        echo "<td>".$value[0]. "</td>";
        echo "<td>".$value[5]. "</td>";
        echo "<td>".$value[1]. "</td>";
        echo "<td>".$value[2]. "</td>";
        echo "<td>".$value[3]."</td>";
        echo "<td>".$value[4]."</td>";
        echo "</tr>";

    }

    echo "<button style=\"background-color: #119E5A; border-radius: 4px; height: 30px; color: white; font-family: sans-serif; cursor: pointer; font-size: 18px; border-style: none; margin: 5px\" onclick=\"ajaxInsertFile('../controlers/show_report_today.php?button=showall', 'dynamic')\">View all reports</button>";
}

?>

</table>
</div>
</body>
</html>