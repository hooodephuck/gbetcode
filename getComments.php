<?php
//phpinfo();
/* This is called by ajax from browser for a list of comments for runner
 * it can also be called internally by another php
 * it will need some security to prevent unauth  ....
 * it takes a userid (the wpid from session) and a list of todays runners
 */
//require dbconnect
require_once 'dbconnect.php';
require_once 'dbfunctions.php';
$id = $_GET["wpid"]; 
//get dayrunners.json
$id=11; //for testing
$contents = file_get_contents('runners.json');
$runners = json_decode($contents, true);
//for one user return all with notes and for a runner in the list if today's runners
$sql = "SELECT * FROM tbl_stablenotes WHERE wpid=". $id ." AND runner IN ('$runners')";
$result = mysqli_query($connection, $sql) or die("Error in Selecting ");
   
   //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
   //output the json
     header('Content-Type: application/json');
     echo json_encode($emparray);
     mysqli_close($connection);
   //write to json file
   //$fp = fopen('comments.json', 'w');
   // fwrite($fp, json_encode($emparray));
   // fclose($fp);
    