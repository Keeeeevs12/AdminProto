<?php
include 'dbconnection.php';

if ( isset( $_SESSION['user_id'] ) ) {
    header("Location: logout-snippet.php");
}
?>