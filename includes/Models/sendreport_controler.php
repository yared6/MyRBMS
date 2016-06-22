<?php
    require_once "../util/db_controler.php";
    class SendReportHandler {
        private $salesamount; //cash
        private $juiceSales; // cash
        private $breadsales; // cash 
        private $cashleft;//cash on hand
        public $date; 
        private $table='reportinfo';
        
        public function __construct($sales,$juice,$bread,$cash){
            $this->salesamount=$sales;
            $this->juiceSales=$juice;
            $this->breadsales=$bread;
            $this->cashleft=$cash;
            $this->date=Date("d/m/y");      
        }
        public function sendReport(){
            $query= 'insert into '. $this->table .' values('.$this->salesamount.','.$this->juiceSales.','.$this->breadsales.','.$this->cashleft.');'; 
            $report=new Databasecontroler($this->table);
            if (!$report->excuteQuery($query)){
                $this->createELog(mysql_error());
                echo $query;
                $this->createELog("Manager sending failure.");
            }
           else 
                $this->createSLog("record inserted to db\n");
        }
        public function createELog($data){
             $data+="\n";
            $filename="errlog.txt";
            $data=$data."onfile".__FILE__."\n";
            $data=$data."onfile".__METHOD__;
            $file=fopen($filename,"a") or die("file opening error");
            fwrite($file,$data);
            fclose($file);
        }
        public function createSLog($data){
            $data+="\n";
            $filename="statuslog.txt";
            $file=fopen($filename,"a") or die("file opening error");
            fwrite($file,$data);
            fclose($file);
        }
        
        
    }
    
?>