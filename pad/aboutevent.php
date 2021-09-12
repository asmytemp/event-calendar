<?php include("header.php");
$id = $_REQUEST['id'];

$query_event = " SELECT * FROM event WHERE id_event='" . $id . "' ";
$sql_event = mysqli_query($link, $query_event);
$array_event = mysqli_fetch_array($sql_event);

if(!isset($_SESSION['role'])) {
    echo '
        <form class="form_one_event">
            <div id="one_event">
                <div id="one_name">' . $array_event['name'] . '</div>
                <div id="one_date">Дата события ' . $array_event['date'] . '</div>
                <div id="one_hourb">Начало ' . $array_event['hour_begin'] . '</div>
                <div id="one_houre">Окончание ' . $array_event['hour_end'] . '</div>
                <div id="one_org">Проводится организацией ' . $array_event['organization'] . '</div>
                <div id="one_descfull">Подробнее о событии <br>' . $array_event['description_full'] . '</div>
                <div id="one_address">Адрес <br>' . $array_event['address'] . '</div>
                <div id="map">Посмотреть на карте' . $array_event['map'] . '</div>
                <a href="signin.php">Авторизуйтесь, чтобы принять участие в событии</a>
            </div>
        </form>
        ';
}

else {
    $queryselectevents="SELECT * FROM visiting WHERE ID_event='" . $id . "' ";
    $sql_selectevents = mysqli_query($link, $queryselectevents);


    if($_SESSION['role']=='organization') {
        echo '
        <form class="form_one_event">
            <div id="one_event">
                <div id="one_name">' . $array_event['name'] . '</div>
                <div id="one_date">Дата события ' . $array_event['date'] . '</div>
                <div id="one_hourb">Начало ' . $array_event['hour_begin'] . '</div>
                <div id="one_houre">Окончание ' . $array_event['hour_end'] . '</div>
                <div id="one_org">Проводится организацией ' . $array_event['organization'] . '</div>
                <div id="one_descfull">Подробнее о событии <br>' . $array_event['description_full'] . '</div>
                <div id="one_address">Адрес <br>' . $array_event['address'] . '</div>
                <div id="map">Посмотреть на карте' . $array_event['map'] . '</div>
                ';
        if($array_event['organization']==$log){
                echo '<ul id="list_uchast">Список участников';
            while ($array_selectevents = mysqli_fetch_array($sql_selectevents)) {
                $queryuser_uchast = "SELECT * FROM users WHERE id_user ='" . $array_selectevents['ID_user'] . "' ";
                $result_user_list = mysqli_query($link, $queryuser_uchast);

                while ($array_user_list = mysqli_fetch_array($result_user_list)) {
                    echo ' <li>' . $array_user_list['login'] . '</li><br>
                ';
                }
            }
                echo '  </ul>';
        }
        echo '</div>
        </form>
        ';
    }


    if($_SESSION['role']=='user') {

        $log = $_SESSION['user'];
        $queryselectuser = "SELECT * FROM users WHERE login='" . $log . "'";
        $sqlaboutuser = mysqli_query($link, $queryselectuser);
        $arrayaboutuser = mysqli_fetch_array($sqlaboutuser);
        $idus = $arrayaboutuser['id_user'];

        $query_usergo = "SELECT * FROM visiting WHERE ID_user='" . $idus . "'";
        $sql_usergo = mysqli_query($link, $query_usergo);

        $kol = 0;
        while ($array_usergo = mysqli_fetch_array($sql_usergo)) {

            if ($id == $array_usergo['ID_event']) {
                $kol++;
            }
        }
        if ($kol > 0) {
            echo '
            <form class="form_one_event">
                <div id="one_event">
                    <div id="one_name">' . $array_event['name'] . '</div>
                    <div id="one_date">Дата события ' . $array_event['date'] . '</div>
                    <div id="one_hourb">Начало ' . $array_event['hour_begin'] . '</div>
                    <div id="one_houre">Окончание ' . $array_event['hour_end'] . '</div>
                    <div id="one_org">Проводится организацией ' . $array_event['organization'] . '</div>
                    <div id="one_descfull">Подробнее о событии <br>' . $array_event['description_full'] . '</div>
                    <div id="one_address">Адрес <br>' . $array_event['address'] . '</div>
                    <div id="map">Посмотреть на карте' . $array_event['map'] . '</div>
                    <p>Вы уже принимаете участие в событии</p>
                </div>
            </form>
            ';
        }
        else {
            echo '
            <form class="form_one_event">
                <div id="one_event">
                    <div id="one_name">' . $array_event['name'] . '</div>
                    <div id="one_date">Дата события ' . $array_event['date'] . '</div>
                    <div id="one_hourb">Начало ' . $array_event['hour_begin'] . '</div>
                    <div id="one_houre">Окончание ' . $array_event['hour_end'] . '</div>
                    <div id="one_org">Проводится организацией ' . $array_event['organization'] . '</div>
                    <div id="one_descfull">Подробнее о событии <br>' . $array_event['description_full'] . '</div>
                    <div id="one_address">Адрес <br>' . $array_event['address'] . '</div>
                    <div id="map">Посмотреть на карте' . $array_event['map'] . '</div>
                    <a href="add_event_user.php?id=' . $array_event['id_event'] . '">Принять участие в событии</a>
                </div>
            </form>
            ';

        }
    }
}
?>
<?php include("footer.php"); ?>
