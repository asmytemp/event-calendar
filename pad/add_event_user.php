<?php
include ("header.php");
$id=$_REQUEST['id'];

$log=$_SESSION['user'];
$queryselectuser ="SELECT * FROM users WHERE login='".$log."'";
$sqlaboutuser=mysqli_query($link, $queryselectuser);
$arrayaboutuser=mysqli_fetch_array($sqlaboutuser);
$idus=$arrayaboutuser['id_user'];

$query_goto_event = "INSERT INTO visiting SET ID_event='" . $id . "', ID_user='".$idus."' ";
$result1 = mysqli_query($link, $query_goto_event);

header("Location: alleventscategory.php");
?>