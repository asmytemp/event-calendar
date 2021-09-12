<?php
include ("header.php");
$id=$_REQUEST['id'];

$log=$_SESSION['user'];
$queryselectuser ="SELECT * FROM users WHERE login='".$log."'";
$sqlaboutuser=mysqli_query($link, $queryselectuser);
$arrayaboutuser=mysqli_fetch_array($sqlaboutuser);
$idus=$arrayaboutuser['id_user'];

$query_goto_event = "DELETE FROM visiting WHERE ID_event ='".$id."' AND  ID_user ='".$idus."' ";
$result1 = mysqli_query($link, $query_goto_event);
echo 'Вы отказались от участия в данном событии';


header("Location:account_user.php");
?>