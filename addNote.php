<?php
/* 
 * adds a note to a runner in a stable for a specifice user
 */
require_once 'dbconnect.php';
require_once 'dbfunctions.php';
//make sure we have the required data before wasting time
/*
if ((empty($_GET["runner"])) || (empty($_GET["stable"])) || (empty($_GET["note"]))){
    die("insufficient information to work with, runner, note or stable missing" );
} 
else
{
*/
echo "";
$runnerid = test_input($_GET["runner"]);
$stableid = test_input($_GET["stable"]); // this should be the id not the name or we must get it-supplied by stables dropdown
$note = test_input($_GET["note"]);
//$wpid = test_input($_GET["wpid"]);
//$pmpid = test_input($_GET["pmpid"]);
$note = mysqli_real_escape_string($connection,$note);


//$sql = "UPDATE tbl_stableNotes set note='$note'  WHERE pmpid=$pmpid and runner='$runner'and stable='$stable'";
$sql ="INSERT INTO tblStableNotes(note,stable,runner)VALUES('$note'$stableid,$runnerid )";

mysqli_query($connection, $sql) or die("Error in adding stable " . mysqli_error($connection));


//}   //close the db connection
mysqli_close($connection); 