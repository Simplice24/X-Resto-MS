<?php
include("config.php");
$id=$_GET['id'];
$dlt="DELETE FROM purchases WHERE id=".$id;

$r=mysqli_query($connection,$dlt);
if($r){
    header("location:dashboard.php");
}
?>