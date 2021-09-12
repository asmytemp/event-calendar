<?php include("header.php");

$query="SELECT * FROM users WHERE id_user='".$array['id_user']."'";
$result = mysqli_query($link, $query);

if($_SESSION['role']=='user'){
    while($array_about_user = mysqli_fetch_array($result)) {
        echo '
            <form id = "one_user" >
                <div id = "user_name" >
                    <a class="accountuser" href = "account_user.php?id=' . $array_about_user['id_user'] . '" >
            ' . $array_about_user['login'] . '
                    </a >
                </div >
                <div > ' . $array_about_user['email'] . ' </div >
                <div > ' . $array_about_user['role'] . ' </div >
                
            </form>';
    }



    $queryidevent="SELECT * FROM visiting WHERE ID_user='".$array['id_user']."'";
    $resultidevent = mysqli_query($link, $queryidevent);


if(!empty($resultidevent)) {
    echo '<div class="container_event_user">';
    while ($array_idevent = mysqli_fetch_array($resultidevent)) {
        $queryfromevent = "SELECT * FROM event WHERE id_event='" . $array_idevent['ID_event'] . "' ORDER BY date";
        $resultfromevent = mysqli_query($link, $queryfromevent);

        while ($array_fromevent = mysqli_fetch_array($resultfromevent)) {
            echo '
                <form>    
                    <div id="one_event_user">
                            <div id="one_name"><a class="aboutevent" href="aboutevent.php?id=' . $array_idevent['ID_event'] . '">
                            ' . $array_fromevent['name'] . '</a></div>
                            <div id="one_date">Дата события ' . $array_fromevent['date'] . '</div>
                            <div id="one_hourb">Начало ' . $array_fromevent['hour_begin'] . '</div>
                            <div id="one_houre">Окончание ' . $array_fromevent['hour_end'] . '</div>
                            <div id="one_org">Проводится организацией ' . $array_fromevent['organization'] . '</div>
                            <div id="one_address">Адрес <br>' . $array_fromevent['address'] . '</div>
                            <a href="deny_event_user.php?id=' . $array_idevent['ID_event'] . '">Отказаться от участия в событии</a>
                        </div>
                </form>
             
        ';
        }
    }
}


}

if($_SESSION['role']=='organization') {
    while ($array_about_user = mysqli_fetch_array($result)) {
        echo '
            <form id = "one_user" >
                <div id = "user_name" >
                    <a class="accountuser" href = "account_user.php?id=' . $array_about_user['id_user'] . '" >
            ' . $array_about_user['login'] . '
                    </a >
                </div >
                <div > ' . $array_about_user['email'] . ' </div >
                <div > ' . $array_about_user['role'] . ' </div >
                
            </form>';
    }
    $queryorgevent = " SELECT * FROM event WHERE organization='" . $array['login'] . "'";
    $resultorgevent = mysqli_query($link, $queryorgevent);


    if (!empty($resultorgevent)) {
        echo '<div class="container_event_user">';
        while ($array_orgevent = mysqli_fetch_array($resultorgevent)) {
            echo '
        <form>    
            <div id="one_event_user">
                    <div id="one_name"><a class="aboutevent" href="aboutevent.php?id=' . $array_orgevent['id_event'] . '">
                    ' . $array_orgevent['name'] . '</a></div>
                    <div id="one_date">Дата события ' . $array_orgevent['date'] . '</div>
                    <div id="one_hourb">Начало ' . $array_orgevent['hour_begin'] . '</div>
                    <div id="one_houre">Окончание ' . $array_orgevent['hour_end'] . '</div>
                    <div id="one_org">Проводится организацией ' . $array_orgevent['organization'] . '</div>
                    <div id="one_address">Адрес <br>' . $array_orgevent['address'] . '</div>
                    <a href="deny_event_org.php?id=' . $array_orgevent['id_event'] . '">Удалить событие</a>
                </div>
        </form>
     </div>   
';
        }
}

}
include("footer.php"); ?>