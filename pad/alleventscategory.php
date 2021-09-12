<?php include("header.php"); ?>
<h4>Тематические ленты</h4>
<?php
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
echo '
    <ul id="submenu">
       <li class="categoryofevents" name="nauka"><a class="onecategory" href="alleventscategory.php?category=1">Наука</a></li>
       <li class="categoryofevents" name="language"><a class="onecategory" href="alleventscategory.php?category=2">Иностранные языки</a></li>
       <li class="categoryofevents" name="itinternet"><a class="onecategory" href="alleventscategory.php?category=3">IT и Интернет</a></li>
       <li class="categoryofevents" name="concert"><a class="onecategory" href="alleventscategory.php?category=4">Концерты</a></li>
       <li class="categoryofevents" name="food"><a class="onecategory" href="alleventscategory.php?category=5">Еда</a></li>
       <li class="categoryofevents" name="beautyandhealth"><a class="onecategory" href="alleventscategory.php?category=6">Красота и здоровье</a></li>
    </ul>
    ';



$date_for_query="";
$bydate=" ORDER BY date ";
$category="";
if (isset($_REQUEST['date'])){
    $date_choose = $_REQUEST['date'];
    $date_for_query="WHERE date='" . $date_choose . "'";

    $query="SELECT * FROM event ".$category.$date_for_query.$bydate;
    $result = mysqli_query($link, $query);
}

elseif(!isset($_GET['category'])){
    $query="SELECT * FROM event ".$category.$date_for_query.$bydate;
    $result = mysqli_query($link, $query);

}
else {
    if($_GET['category']==1){
        $category="WHERE category='Наука'";
    }
    if($_GET['category']==2){
        $category="WHERE category='Иностранный язык'";
    }
    if($_GET['category']==3){
        $category="WHERE category='IT'";
    }
    if($_GET['category']==4){
        $category="WHERE category='Концерт'";
    }
    if($_GET['category']==5){
        $category="WHERE category='Еда'";
    }
    if($_GET['category']==6){
        $category="WHERE category='Красота'";
    }

    $query="SELECT * FROM event ".$category.$date_for_query.$bydate;
    $result = mysqli_query($link, $query);
}
echo '  
             <form id="choose" method="post">
                <div class="choose_day">Выберите дату
                   <input type="date" placeholder="Дата" name="date">
                   <button id="b_choose" type="submit">Найти</button>
                </div>
             </form>
    
  ';

if(!isset($_SESSION['role'])) {
    while ($array = mysqli_fetch_array($result)) {
            echo '
            <div id="one_cell">
                <div id="name_event"><a class="aboutevent" href="aboutevent.php?id=' . $array['id_event'] . '">
                ' . $array['name'] . '</a></div>
                <div id="date_event">' . $array['date'] . '</div>
                <div id="hour_begin">' . $array['hour_begin'] . '</div>
                <div id="hour_end">' . $array['hour_end'] . '</div>
                <div id="organization">' . $array['organization'] . '</div>
                <div id="description_event">' . $array['description'] . '</div>
            </div> ';
    }
}
elseif($_SESSION['role']=='organization') {
    while ($array = mysqli_fetch_array($result)) {
        echo '
            <div id="one_cell">
                <div id="name_event"><a class="aboutevent" href="aboutevent.php?id=' . $array['id_event'] . '">
                ' . $array['name'] . '</a></div>
                <div id="date_event">' . $array['date'] . '</div>
                <div id="hour_begin">' . $array['hour_begin'] . '</div>
                <div id="hour_end">' . $array['hour_end'] . '</div>
                <div id="organization">' . $array['organization'] . '</div>
                <div id="description_event">' . $array['description'] . '</div>
            </div> ';
    }
}

elseif($_SESSION['role'] == 'user') {
    while ($array = mysqli_fetch_array($result)) {
        echo '
            <form>
                <div id="one_cell">
                    <div id="name_event"><a class="aboutevent" href="aboutevent.php?id=' . $array['id_event'] . '">
                    ' . $array['name'] . '</a></div>
                    <div id="date_event">' . $array['date'] . '</div>
                    <div id="hour_begin">' . $array['hour_begin'] . '</div>
                    <div id="hour_end">' . $array['hour_end'] . '</div>
                    <div id="organization">' . $array['organization'] . '</div>
                    <div id="description_event">' . $array['description'] . '</div>
                </div>
            </form> 
            ';

    }
}

elseif($_SESSION['role'] == 'admin') {
     while ($array = mysqli_fetch_array($result)) {
         $delete_event = $array['id_event'];
             echo '
            <div id="one_cell">
            <div>
                 <form method="post" action="alleventscategory.php">
                     <input type="hidden" name="id" value="' . $delete_event . '">
                     <input id="but_delete_event" type="image" src="img/delete.jpg" name="' . $delete_event . '">
                 </form>
            </div>
            <div id="name_event"><a class="aboutevent" href="aboutevent.php?id=' . $array['id_event'] . '">
            ' . $array['name'] . '</a></div>
            <div id="date_event">' . $array['date'] . '</div>
            <div id="hour_begin">' . $array['hour_begin'] . '</div>
            <div id="hour_end">' . $array['hour_end'] . '</div>
            <div id="organization">' . $array['organization'] . '</div>
            <div id="description_event">' . $array['description'] . '</div>
        </div> ';
     }
}
if (isset($_POST['id'])) {
    $deleteevent2 = $_POST['id'];
    $query_delete_event = "DELETE FROM event WHERE id_event='" . $deleteevent2 . "'";
    $result_delete = mysqli_query($link, $query_delete_event);
}

include("footer.php"); ?>