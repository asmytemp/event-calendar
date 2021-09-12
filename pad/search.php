<?php include("header.php");
 $search=$_REQUEST['search'];
 $query_search = "SELECT * FROM event WHERE name LIKE '%" . $search . "%' 
 OR organization LIKE '%" . $search . "%' 
 OR description LIKE '%" . $search . "%'OR address LIKE '%" . $search . "%'
 OR description_full LIKE '%" . $search . "%'OR category LIKE '%" . $search . "%'
 ";
 $result_search=mysqli_query($link, $query_search);

while ($array_search = mysqli_fetch_array($result_search)) {
    echo '
            <div id="one_cell">
                <div id="name_event"><a class="aboutevent" href="aboutevent.php?id=' . $array_search['id_event'] . '">
                ' . $array_search['name'] . '</a></div>
                <div id="date_event">' . $array_search['date'] . '</div>
                <div id="hour_begin">' . $array_search['hour_begin'] . '</div>
                <div id="hour_end">' . $array_search['hour_end'] . '</div>
                <div id="organization">' . $array_search['organization'] . '</div>
                <div id="description_event">' . $array_search['description'] . '</div>
            </div> ';
}

include "footer.php"; ?>
