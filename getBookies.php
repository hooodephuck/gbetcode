<?php
require_once 'dbconnect.php';
$id = $_GET["wpid"]; 
if($id==''){
  $id=0;  
}


//$id =11;
//for one user return all bookies
$sql = "SELECT t1.id,t1.bookie FROM tbl_bookie as t1 INNER JOIN tbl_Userbookie as t2 ON t1.id = t2.bookieid where t2.wpid='". mysqli_real_escape_string($connection, $id ) ."'";
//echo $sql;    
$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
   //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
     //output the json
    header('Content-Type: application/json');
    if(count($emparray)>0){
        echo json_encode($emparray , JSON_UNESCAPED_UNICODE);
    }else{
        echo json_encode('[]' , JSON_UNESCAPED_UNICODE);
    }
      //close the db connection
    mysqli_close($connection);
