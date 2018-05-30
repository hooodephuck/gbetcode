<?php

/* 
 * add a new stable for logged in user.
 * no nee for unique name.  the note is about the purpse of the stable and only shows in admin pages
 * an id is generated automatically by mysql
 */

require_once 'dbconnect.php';
//$runner = $_GET["runner"];
$stable = $_POST["stable"];
$note = $_POST["note"];
$wpid = $_POST["wpid"];
$pmpid = $_POST["pmpid"];
/*
if(empty($pmpid))
    {
    $pmpid=0'11';
}
 */
//for testing
//$wpid=11;
$sql = "INSERT INTO tbl_Stables(stable,note,wpid,pmpid) VALUES ('$stable','$note','$wpid','$pmpid')";
//echo $sql;
mysqli_query($connection, $sql) or die("Error in adding stable " . mysqli_error($connection));

 //close the db connection
mysqli_close($connection);
    
    
    