<?php
include("config.php");
$id=$_GET['id'];
$dlt="DELETE FROM users WHERE id=".$id;

$r=mysqli_query($connection,$dlt);
if($r){
    header("location:System-users.php");
}
?>