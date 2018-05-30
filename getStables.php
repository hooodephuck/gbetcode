<?php
header('Content-Type: application/json');
require_once 'dbconnect.php';
//$id = $_GET["wpid"]; 
$id =11;
//for one user return all stables
$sql = "select id,stable from tbl_Stables WHERE wpid='". mysqli_real_escape_string($connection, $id ) ."'";

 //echo $sql;    
$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
   //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
     //output the json
     echo json_encode($emparray , JSON_UNESCAPED_UNICODE);
     //close the db connection
    mysqli_close($connection);
   //outpust the json to browser  

