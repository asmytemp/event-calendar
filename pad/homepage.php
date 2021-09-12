<?php include "header.php";
$overdue=0;
$query_select_overdue="SELECT * FROM event";
$res_select_overdue=mysqli_query($link, $query_select_overdue);
while ($array_overdue = mysqli_fetch_array($res_select_overdue)){
     $query22="SELECT * FROM event WHERE date < CURRENT_DATE()";
     $res22=mysqli_query($link, $query22);
     while ($array_overdue_1= mysqli_fetch_array($res22)){
          $id_minus=$array_overdue_1['id_event'];
          $query_deleteover="DELETE FROM visiting WHERE ID_event='" . $id_minus . "'" ;
          $res_deleteover=mysqli_query($link, $query_deleteover);

          $query_deleteover_event="DELETE FROM event WHERE id_event='" . $id_minus . "'" ;
          $res_deleteover_event=mysqli_query($link, $query_deleteover_event);
     }
}
$query="SELECT * FROM event ORDER BY date";
$result = mysqli_query($link, $query);

echo '
     
';
while($array = mysqli_fetch_array($result)){
     echo'<div id="one_cell">
            <div id="name_event">'.$array['name'].'</div>
            <div id="date_event">'.$array['date'].'</div>
            <div id="hour_begin">'.$array['hour_begin'].'</div>
            <div id="hour_end">'.$array['hour_end'].'</div>
            <div id="organization">'.$array['organization'].'</div>
            <div id="description_event">'.$array['description'].'</div>
          </div>
     ';
}
include "footer.php"; ?>


