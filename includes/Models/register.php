<?php
    require_once "../util/db_controler.php";
    class RegisterHandler {
        private $id; //cash
        private $name; // cash
        public $date;
        private $table='registeredemployees';
        
        public function __construct($id, $name){
            $this->id=$id;
            $this->name=$name;
            $this->date=Date("d/m/y");      
        }
        public function registerEmployee(){
            $query= 'insert into '. $this->table .'(id, name) Values ('.'"'.$this->id.'"'.', '.'"'.$this->name.'"'.');';
            $register = new Databasecontroler($this->table);
            if (!$register->excuteQuery($query)){
                $this->createELog(mysql_error());
                echo $query;
                $this->createELog("Register failure.");
            }
           else 
                $this->createSLog("Employee inserted to db\n");
        }
        public function viewRegisteredEmployees($cond=0){        
            $db=new Databasecontroler($this->table);
            
            $dbresult=$db->getItems($cond);
            $db->done();
            return $dbresult;
        }
        
        public function createELog($data){
             $data+="\n";
            $filename="../errlog.txt";
            $data=$data."onfile".__FILE__."\n";
            $data=$data."onfile".__METHOD__;
            $file=fopen($filename,"a") or die("file opening error");
            fwrite($file,$data);
            fclose($file);
        }
        public function createSLog($data){
            $data+="\n";
            $filename="../statuslog.txt";
            $file=fopen($filename,"a") or die("file opening error");
            fwrite($file,$data);
            fclose($file);
        }
        
        
    }
    
?>