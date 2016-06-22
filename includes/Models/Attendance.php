<?php
    require_once "../util/db_controler.php";
    class Attendance{
        public $tb_name;
        public $today;
        public function __construct($table){
            $this->tb_bame=$table;
            $this->today="20".date("y-m-d");
            
        }
        public function attend($id){
            $name=$this->getEmployee($id);
            $att=new Databasecontroler($this->tb_name);
            $query='insert into attendance (id,name) values ('.''.$id.''.','.'"'.$name.'"'.');';
            //echo $query;
            if (!$att->excuteQuery($query)){
                $this->createELog(mysql_error());
                
                $this->createELog("Attendance taking failure.");
            }
            else
                $this->createSLog("Employee attendace taken to db\n");
            $att->done();
        }
        public function getEmployee($id){
            $data=Array();
            $sql="select * from registeredemployees where id=".$id." limit 1;";

            $db=new Databasecontroler("");
            $con=$db->con;
            $result=$con->prepare($sql);
            $result->execute();
            
            if (!$result){
                echo $sql;
                throw new Exception("getting items failed");
            }
            $result->bind_result($db_id,$db_name,$db_date);
            
            if ($result->num_rows >= 0) {
                while($row = $result->fetch()) {
                    $col=Array();
                    $col[0]=$db_id;
                    $col[1]=$db_name;
                    $col[2]=$db_date;
                    array_push($data, $col);
                    return $data[0][1];
                }
                
            } else {
                echo $sql;
                echo "0 results";
                $con->done();
                return false;
            }
           
            
        }
        public function getItems($date=null){
        if(!isset($date)){
            
            $date=$this->today;
        }
        
        $date1=$date." 00-00-00";
        $date2=$date.' 23-59-59';
  
        $data=Array();
        
        $sql='select * from registeredemployees where registeredemployees.id not in (select id from attendance where reg_date BETWEEN '.'"'. $date1 .'"'.' AND '.'"'.$date2.'"'.') ;';
        
        
        $db=new Databasecontroler($this->tb_name);
        $con=$db->con;
        $result=$con->prepare($sql);
       
        $result->execute();
        if (!$result){
            echo $sql;
            throw new Exception("getting items failed");
        }
        $result->bind_result($db_id,$db_name,$db_date);
        
        if ($result->num_rows >= 0) {
            while($row = $result->fetch()) {
                $col=Array();
                $col[0]=$db_id;
                $col[1]=$db_name;
                $col[2]=$db_date;
                array_push($data, $col);
            }
        } else {
            echo "0 results";
            
        }
        $con->close();
        return $data;                 
        
    }
    public function presents($date=null){
        if(!isset($date)){
            
            $date=$this->today;
        }
        $date1=$date.' 00-00-00';
        $date2=$date.' 23-59-59';
    
        $data=Array();
    
        $sql='select * from registeredemployees where registeredemployees.id  in (select id from attendance where reg_date BETWEEN '.'"'. $date1 .'"'.' AND '.'"'.$date2.'"'.') ;';
    
    
        $db=new Databasecontroler($this->tb_name);
        $con=$db->con;
        $result=$con->prepare($sql);
         
        $result->execute();
        if (!$result){
            echo $sql;
            throw new Exception("getting items failed");
        }
        $result->bind_result($db_id,$db_name,$db_date);
    
        if ($result->num_rows >= 0) {
            while($row = $result->fetch()) {
                $col=Array();
                $col[0]=$db_id;
                $col[1]=$db_name;
                $col[2]=$db_date;
                array_push($data, $col);
            }
        } else {
            echo "0 results";
        }
        return $data;
    
    }
    public function createSLog($data){
        $data+="\n";
        $filename="../statuslog.txt";
        $file=fopen($filename,"a") or die("file opening error");
        fwrite($file,$data);
        fclose($file);
    }
    public function createELog($data){
        $data+="\n";
        $filename="../errlog.txt";
        $data=$data."onfile".__FILE__."\n";
        $data=$data."onfunction ".__METHOD__;
        $file=fopen($filename,"a") or die("file opening error");
        fwrite($file,$data);
        fclose($file);
    }
    

    }
    $b=new Attendance("attendance");
    $result=$b->getItems();
    for ($i=0;$i<count($result);$i++){
    $result[0][1];
    }
    
    
?>


