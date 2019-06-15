<?php
include 'dbconnection.php';

if ( isset( $_SESSION['user_id'] ) ) {
    header("Location: index-user.php");
}
if ( isset( $_SESSION['sec_id'] ) ) {
    header("Location: index-sec.php");
}
if ( isset( $_SESSION['admin_id'] ) ) {
    header("Location: index-admin.php");
}
?>