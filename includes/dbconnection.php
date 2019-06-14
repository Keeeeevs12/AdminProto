<?php
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'cldhappointment';

    $con = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if(!$con){
        die("ERROR: " . mysqli_connect_error());
    }
?>