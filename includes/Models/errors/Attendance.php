<?php
    require_once "../util/db_controler.php";
    class Attendance{
        public $tb_name;
        public function __construct($table){
            $this->tb_bame=$table;
        }
        public function attend($id,$name){
            $att=new Databasecontroler($this->tb_name);
            $query='insert into attendance (id,name) values ('.'"'.$id.'"'.','.'"'.$name.'"'.');';
            echo $query;
            if (!$att->excuteQuery($query)){
                $this->createELog(mysql_error());
                echo $query;
                $att->createELog("Attendance taking failure.");
            }
            else
                $att->createSLog("Employee attendace taken to db\n");
            $att->done();
        }
        public function getItems($date){
        $date1=$date.' 00-00-00';
        $date2=$date.' 23-59-59';
  
        $data=Array();
        
        $sql='select * from attendance where reg_date BETWEEN '.'"'. $date1 .'"'.' AND '.'"'.$date2.'"'.' ;';
        
        
        $db=new Databasecontroler($this->tb_name);
        $con=$db->con;
        $result=$con->query($sql);
        if (!$result){
            echo $sql;
            throw new Exception("getting items failed");
        }
        $row = $result->fetch_array(MYSQLI_NUM);
        
        if ($result->num_rows >= 0) {
            
            while($row = $result->fetch_assoc()) {
                $col=Array();
                $col[0]=$row['id'];
                $col[1]=$row["name"];
                $col[2]=$row["reg_date"];
                array_push($data, $col);
            }
        } else {
            echo "0 results";
        }
        return $data;
        
    }
        
    }
?>