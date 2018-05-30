<?php
/* 
 * called from ajax on notes page to get json list of stables available to a user for a named runner
 * needs runner and wpid
 */

require_once 'dbconnect.php';
require_once 'dbfunctions.php';
$id = test_input($_POST["wpid"]); 

$id = mysqli_real_escape_string($connection, $id );
$runner= test_input($_POST["runner"]);
$runner = mysqli_escape_string($connection, $runner);

$id =11; //for testig
$runner = "Premier Bond";
$sql = "SELECT DISTINCT t1.id,t1.stable 
FROM tbl_stables AS t1 INNER JOIN tbl_runnerstable as t2 INNER JOIN tbl_runners as t3
ON t1.id= t2.stable AND t3.id= t2.runnerid  and t2.runnerid = t3.id
WHERE t1.wpid = ".$id . " AND t3.name='" .$runner ."'";

echo $sql;    
$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
if (mysqli_num_rows($result)==0){
    $EMPARRAY="[]";
}ELSE{

//create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    //output the json
    header('Content-Type: application/json');
    echo json_encode($emparray, JSON_UNESCAPED_UNICODE);
    //close the db connection
    mysqli_close($connection);
}  