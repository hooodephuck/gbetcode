<?php
/* 
 * add a runner to an existnstable
 * the stable has een selected from a dropdown and the stableid is passedin
 * the usid could be assumed but it is also passed in
 * we also allow the user to add a note at the time of adding the runner
 */
require_once 'dbconnect.php';
require_once 'dbfunctions.php';

$runner = mysqli_real_escape_string($connection, test_input($_POST["runner"])   );//string
$stable = test_input($_POST["stable"]); // this should be the id not the name or we must get it-supplied by stables dropdown
$note = mysqli_real_escape_string( $connection, test_input($_POST["note"])   );
$wpid = mysqli_real_escape_string( $connection,test_input($_POST["wpid"]) );
$pmpid = mysqli_real_escape_string($connection, ($_POST["pmpid"]) );
if(!empty($pmpid)){
    $pmpid=0;}

/*first we check if the runner exist in table
 * if runner xists we retrieve the is=d and skip the add runner step
 *    next  if necessay, we add the runner to stable
 *    then we retriev the newly created runner id
 * then we add a note to notes table along with stableid
*/
if ((empty($runner)) || (empty($stable))){
    die("insufficient information to work with, runner or stable missing" );
} 
else
{
    $sql ="Select id from tbl_runners where name= '" . $runner . "'";
    $rs= mysqli_query($connection, $sql) or die("Error in adding stable " . mysqli_error($connection));
    //poupulate $id-- first check that we got a result
    if ($rs) {
       $row = mysqli_fetch_array($rs); 
       $id = $row['id']; 
    }
    if ((isset($id)) && (!empty($id))){
        $runnerid =id;
    }else{
       //needs a transaction
       $sql ="INSERT INTO tbl_runners (name) VALUES ( '" . $runner . "')";
       mysqli_query($connection, $sql) or die("Error in adding stable " . mysqli_error($connection));
       $runnerid= $connection->insert_id;
       $sql ="INSERT INTO tbl_stablenotes (runner,stable,note,wpid) VALUES ($runnerid,$stable,'$note',$wpid)";
       mysqli_query($connection, $sql) or die("Error in adding runner to stable " . mysqli_error($connection));
    }
   
} //close the db connection
    mysqli_close($connection);