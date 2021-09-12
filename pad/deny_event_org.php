<?php
include ("header.php");
$id=$_REQUEST['id'];

$query_denyevent = "DELETE FROM visiting WHERE ID_event ='".$id."'";
$result1 = mysqli_query($link, $query_denyevent);

$querydeny="DELETE FROM event WHERE id_event='".$id ."' ";
$sqldeny=mysqli_query($link, $querydeny);

echo'Событие удалено';
?>