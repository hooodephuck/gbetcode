<?php
$connection = mysqli_connect('greenbet.co.uk',"gbet_user","fn75Y!x3","wordpress_0") or die("Error " . mysqli_error($connection));
    /* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
