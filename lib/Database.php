<?php
class Database{
	private $host   = DB_HOST;
	private $user   = DB_USER;
	private $pass   = DB_PASS;
	private $dbname = DB_NAME;
    private $conn;

	public function __construct(){
		$this->connectDB();
	}

  private function connectDB(){
    $this->conn=new mysqli($this->host,$this->user,$this->pass,$this->dbname);

    if(!$this->conn){
      die("Connection Fail".$this->conn->connect_error);
    }

    else{
     // echo "Connection Sucess";
    }
  }

  public function Insert($table,$cols){
    $sql="INSERT INTO $table SET $cols";
    //echo $sql;
    $result=$this->conn->query($sql);
    if($this->conn->affected_rows>0){
      return true;
    }
    return false;
  }

  public function getAll($table,$cols){
    $sql="SELECT $cols FROM $table";
    $result=$this->conn->query($sql);
    if($result->num_rows>0){
      return $result->fetch_all(MYSQLI_ASSOC);
    }
    return false;
  }

  

  public function getById($table,$cols,$condition){
    $sql="SELECT $cols FROM $table WHERE $condition";
    $result=$this->conn->query($sql);
    if($result->num_rows>0){
      return $result->fetch_assoc();
       //return $result->fetch_all(MYSQLI_ASSOC);

    }
    return false;
  }

  public function getTable($data , $css_classes=""){
    if(count($data)==count($data,1)){
      if($data){
      $table="<table class=\"$css_classes\">";
      foreach ($data as $key => $value) {
        $table.="<tr>";
           $table.="<th>".ucfirst($key). "</th> <td> $value </td>";
        $table.="</tr>";
      }
      $table.="</table>";
      return $table;
    }
        else{
          echo "Sorry, No Data in Database";
        }
    }
    else {
      if($data){
      $table="<table class=\"$css_classes\">";
        $table.="<tr>";
      foreach ($data[0] as $key => $value) {      
        $table.="<th>".ucfirst($key). "</th>";        
      }
        $table.="<th>Action</th>";        
          $table.="</tr>";
      foreach ($data as $rows) {
         $table.="<tr>";
           foreach ($rows as $val) {
             $table.="<td>".ucfirst($val). "</td>";
        }
         $table.="<td><a class=\"btn btn-info\" href=\"edit.php?id=$rows[id]\">Edit</a> &nbsp;&nbsp;<a class=\"btn btn-danger\" href=\"delete.php?deleteid=$rows[id]\">Delete</a></td>";  
         $table.="</tr>";       
      }
      $table.="<tr>";
          $total = count($data[0])+1;
          $table.="<td colspan=\"$total\" class=\"text-center\"><a class=\"btn btn-primary\" href=\"insert.php\">Add New Student</a></td>";
      $table.="</tr>";
      $table.="</table>";
      return $table;
    }
        else{
          echo "Sorry, No Data in Database";
        }
    }
  }

  public function Update($table,$cols,$condition){
    $sql="UPDATE $table SET $cols WHERE $condition";
    //echo $sql;
    $result=$this->conn->query($sql);
    if($this->conn->affected_rows>0){
      return true;
    }
    return false;
  }
  public function Delete($table,$condition){
    $sql="DELETE FROM $table WHERE $condition";
    //echo $sql;
    $result=$this->conn->query($sql);
    if($this->conn->affected_rows>0){
      return true;
    }
    return false;
  }


  public function getAllLimit($table,$cols,$limit){
    $sql="SELECT $cols FROM $table LIMIT $limit";
    $result=$this->conn->query($sql);
    if($result->num_rows>0){
      return $result->fetch_all(MYSQLI_ASSOC);
    }
    return false;
  }

  public function getAllLimitCondition($table,$cols,$condition,$limit){
    $sql="SELECT $cols FROM $table WHERE $condition LIMIT $limit";
    $result=$this->conn->query($sql);
    if($result->num_rows>0){
      return $result->fetch_all(MYSQLI_ASSOC);
    }
    return false;
  }


  public function getAllRow($table,$cols){
    $sql="SELECT $cols FROM $table";
    $result=$this->conn->query($sql);
    if($result->num_rows>0){
      return $result->num_rows;
    }
    return false;
  }

   public function getAllCondition($table,$cols,$condition){
    $sql="SELECT $cols FROM $table WHERE $condition";
    $result=$this->conn->query($sql);
    if($result->num_rows>0){
      return $result->fetch_all(MYSQLI_ASSOC);
    }
    return false;
  }
}


//$db=new database("localhost","root","","db_shop");
//echo $db->Insert("students","name='Chandan',mobile='01818836926',address ='Dhaka,Bangladesh'")?"Insert Sucess":"Insert Fail";
/*
echo "<pre>";
print_r($db->getAll("students","*"));
echo "</pre>";
*/
/*
echo "<pre>";
print_r($db->getById("students","id,name","id=18"));
echo "</pre>";
*/
/*
$student_info=$db->getById("students","id,name","id=18");
echo $db->getTable($student_info);
*/
/*
$student_info=$db->getAll("students","*");
echo $db->getTable($student_info);
*/
//echo $db->Update("students","name='Chandan Saha',mobile='01818836927',address ='Pabna,Bangladesh'","id=2")?"Update Sucess":"Update Fail";
//echo $db->Delete("students","id=2")?"Delete Sucess":"Delete Fail";
//SELECT $table1.$col1,$table2.$col2 FROM $table1 INNER JOIN $table2 ON $table1.$condition1=$table2.$condition2
