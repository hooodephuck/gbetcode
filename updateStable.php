<?php
/* 
 * ADD A RUNNER TO A STABLE
 * THE STABLE EXISTS ALREADY
 * THE RUNNER MAY EXIST IN OTHER STABLES -THATS ALLOWED FOR SPEED-FOR NOW
 * WE CHECK HE DOES NOT ALREADY EXIST IN THIS STABLE
 * WE CAN ADD A NOTE ALSO
 * OTHER NOTES CAN BE ADDED LATER BUT NOT VIA THIS CRIPT
 */
require_once 'dbconnect.php';
require_once 'dbfunctions.php';
$runner = $_GET["runner"];
$stable = $_GET["stable"];
$note = $_GET["note"];
$wpid = $_GET["wpid"];
$pmpid = $_GET["pmpid"];

$sql ="INSERT INTO tblRunnerStable(stable,runner,note,wpid,pmpid)VALUES('$stable', '$runner',$note, $wpid )";
//$sql = "UPDATE tbl_RunnerStable set(stable='$stable',runner='$runner',note='$note,wpid=$wpid,pmpid=$pmpid) WHERE (pmpid=$pmpid);

mysqli_query($connection, $sql) or die("Error in adding stable " . mysqli_error($connection));

 //close the db connection
mysqli_close($connection);
    
    