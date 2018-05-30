<?php
header('Content-Type: application/json');
require_once 'dbconnect.php';
mysqli_set_charset($connection, 'utf8');
$sql = "SELECT bookie,offers FROM tbl_bookie";
$result = mysqli_query($connection, $sql) or die("Error in Selecting ");
   //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
        
    }
   
  // echo json_encode($emparray , JSON_UNESCAPED_UNICODE);
  $jsonString = json_encode($emparray , JSON_UNESCAPED_UNICODE);

if (json_last_error() != JSON_ERROR_NONE) {
    printf("JSON Error: %s", json_last_error_msg());
}else{
    echo trim($jsonString);
}
   
    mysqli_close($connection);
    