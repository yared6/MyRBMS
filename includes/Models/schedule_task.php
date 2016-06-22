<?php
    require_once "../util/db_controler.php";
    class SendScheduleTaskHandler {
        private $priority; //string
        private $time; //time
        private $description; //string
        public $tb_name = 'schedule_task';
        public $con;
        
        
        public function __construct($priority,$time,$description){
            $this->con = new Databasecontroler($this->tb_name);
            $this->con = $this->con->con;
            $this->priority=$priority;
            $this->time=$time;
            $this->description=$description;
              
        }
        public function sendScheduledTask(){
            
            $query = 'insert into '. $this->tb_name .'(priority, time, description)
                        values('.'"'.$this->priority .'"'.','.'"' .$this->time.'"'.','.'"' .$this->description.'"'.');';

            $scheduleTask = new Databasecontroler($this->tb_name);
            $scheduleTask->excuteQuery($query);
            $scheduleTask->done();
        }
        
        public function viewScheduledTask($condition = 0){
        $data=Array();
        if($condition){
        $sql = 'select * from '. $this->tb_name .' where '.$condition.' ;';
        }
        else 
            $sql='select * from '. $this->tb_name.' ;';
        //$data=$this->con->query($sql);
        //$records=array();
        $db = new Databasecontroler($this->tb_name);
        $con = $db->con;
        $result=$con->prepare($sql);
        $result->execute();
        //$result=$this->con->query($sql);
        if (!$result){
            echo $sql;
            throw new Exception("getting items failed");
        }
        //$row = $result->fetch_array(MYSQLI_NUM);
        $result->bind_result($scheduleID, $priority, $time, $description, $reg_date);
        if ($result->num_rows >= 0) {
            // output data of each row
            while($row = $result->fetch()) {
                $col=Array();
                $col[0]=$scheduleID;
                $col[1]=$priority;
                $col[2]=$time; 
                $col[3]=$description;
                $col[4]=$reg_date;
                array_push($data, $col);
            }
        } else {
            echo "0 results";
            return false;
        }
        return $data;
        header("Location: ../views/owner_home.php");
        
    }

        public function resolve($attrib, $value){
            //$sql = "delete from" .$this->tb_name. "where updateID = $id";
            $scheduleTask = new Databasecontroler($this->tb_name);
            $scheduleTask->deleteRecord($attrib, $value);
            $scheduleTask->done();
        }
       
    } 
    
?>