<?php

class Databasecontroler extends Exception{
    
    /* @ authors Nahom asnake and Yared Abebayehu
     * This is the database class that we are all going to use;
     * make sure to use this class when ever you are working with a table;
     * for example you could be working on 'updates'  class so , ;
     * just simply create object from this class i.e. ;
     * you only need to specify the table that your are;
     * working on...the others are abstractly defined here
     * not using this class will result in...a messed up project 
     * Thanks!! ;
     */
      
    public $con;
    public $tb_name;
    // establish connection and assign the properties in the file 
    //
    public function __construct($tbname){
        try{
        require_once ('db_properties.php');
        $this->tb_name=$tbname;
        $this->connect();
        }
        catch(ThrowCatcher $ex){
                $ex->getDetail();
            }
    }
     
    public function connect(){
            try{
            $this->con=new mysqli(Properties::SERVER_NAME,Properties::DB_USER,Properties::DB_PASSWORD,Properties::DB_NAME);
			if ($this->con->connect_error){
				return false;
                die("Connection failed: " . $conn->connect_error);
			}
            else{
			return true;
            }
            }
            catch(ThrowCatcher $ex){
                echo $ex->getDetail();
            }
		}
    /* insert the attribute, the old value, the new value respectively;
     * make sure to put a value in a single string and then in a double string when 
     * the value needs to be a string in the database
    */ 
    public function updateRecord($att,$old,$new){ 
        
        $query='UPDATE '.$this->tb_name.' set '. $att.' = '.$old.  ' WHERE '.$att.'='.$new;
        try{
        if (!$this->con->query($query) === TRUE) { 
                throw new Exception("Couldn't update record!!");
         }
        }
        catch(Exception $ex){
                echo $query;
        }
        
    }
    public function done(){
        $this->con->close();
    }
    public function excuteQuery($query){
        
        return $this->con->query($query);
       
    }
    /*
     * This function returns the aray of all records in a table
     */
    public function getItems($condition=0){
        $data=Array();
        if($condition){
        $sql='select * from '. $this->tb_name .' where '.$condition.' ;';
        }
        else 
            $sql='select * from '. $this->tb_name.' ;';
        //$data=$this->con->query($sql);
        //$records=array();
        $db = new Databasecontroler($this->tb_name);
        $con=$db->con;
        $result=$con->prepare($sql);
        $result->execute();
        if (!$result){
            echo $sql;
            throw new Exception("getting items failed");
        }
        $result->bind_result($reportId, $sales, $juice, $bread, $cash, $reg_date);
        if ($result->num_rows >= 0) {
            // output data of each row
            while($row = $result->fetch()) {
                $col=Array();
                $col[0]=$reportId;
                $col[1]=$sales;
                $col[2]=$juice;
                $col[3]=$bread;
                $col[4]=$cash;
                $col[5]=$reg_date;
                array_push($data, $col);
            }
        } else {
            echo "0 results";
        }
        
        return $data;
        
    }
    public function deleteRecord($attrib,$value){
        
        /*if ($this->con->query($record) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "error deleting record";
        }*/
        
        $record='delete from '.$this->tb_name.' where '.$attrib.' = '.$value;
        try{
            if (!$this->con->query($record)){
                throw new Exception("delete error");
            }
        }
        catch (Exception $ex){
            echo 'Not able to delete record: your syntax is : '. $record;
        }
    }
}
class ThrowCatcher extends Exception{
    function getDetail(){
    echo "on file ".$this->getFile()." on line ".$this->getLine()." on class ".$this.get_class();
}
}

/*$test=new Databasecontroler("reportinfo");
$i=0;
foreach($test->getItems() as $i){
    echo $i[5];
}
*/
















   

?>