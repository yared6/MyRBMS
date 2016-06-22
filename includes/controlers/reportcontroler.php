<?php
    require_once "../Entities and utilities/sendreport_controler.php";
    function sanitize($input){
        return $input;
    }
    $sales=sanitize($_POST['sales']);
    $juice=sanitize($_POST['juice']);
    $bread=sanitize($_POST['bread']);
    $cash=sanitize($_POST['cash']);
    $report=new SendReportHandler($sales,$juice,$bread,$cash);
    $report->sendReport();
    
?>