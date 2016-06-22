<?php
    require_once "../Models/Report.php";
    function sanitize($input){
        return $input;
    }
    $sales=sanitize($_POST['sales']);
    $juice=sanitize($_POST['juice']);
    $bread=sanitize($_POST['bread']);
    $cash=sanitize($_POST['cash']);
    $report=new SendReportHandler($sales,$juice,$bread,$cash);
    $report->sendReport();
    header("Location: ../views/manager_home.php");
    
?>