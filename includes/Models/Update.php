<?php
    require_once "../util/db_controler.php";
    class SendUpdateHandler {
        private $title; //string
        private $description; //string
        public $tb_name = 'updateinfo';
        public $con;
        
        
        public function __construct($title,$description){
            $this->con = new Databasecontroler($this->tb_name);
            $this->con = $this->con->con;
            $this->title=$title;
            $this->description=$description;
              
        }
        public function sendUpdate(){
            
            $query = 'insert into '. $this->tb_name .'(title, description)
                        values('.'"'.$this->title .'"'.','.'"' .$this->description.'"'.');';

            $update = new Databasecontroler($this->tb_name);
            $update->excuteQuery($query);
            $update->done();
        }
        
        public function viewUpdate($condition = 0){
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
        $result->bind_result($updateID, $title, $description, $reg_date);
        if ($result->num_rows >= 0) {
            // output data of each row
            while($row = $result->fetch()) {
                $col=Array();
                $col[0]=$updateID;
                $col[1]=$title;
                $col[2]=$description;
                $col[3]=$reg_date;
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
            $update = new Databasecontroler($this->tb_name);
            $update->deleteRecord($attrib, $value);
            $update->done();
        }
       
    } 
    
?>