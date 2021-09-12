<?php include("header.php");
$name=null;
$date=null;
$hour_begin=null;
$hour_end=null;
$organization=null;
$description=null;
$address=null;
$description_full=null;
$category=null;
$map=null;

if(empty($_POST)) {
    echo '<form id="add_event" method="post" action="">
           <div class="new_event">Наименование события
               <input class="new_event_input" type="text" placeholder="Наименование" name="name">
           </div>
           <div class="new_event">Дата
               <input class="new_event_input" type="date" placeholder="Дата" name="date">
           </div>
           <div class="new_event">Начало
                <input class="new_event_input" placeholder="Час начала"  type="time" name="hour_begin">
           </div>
           <div class="new_event">Окончание
                <input class="new_event_input" placeholder="Окончание"  type="time" name="hour_end">
           </div>
           <div class="new_event">Кто проводит мероприятие
                 <input class="new_event_input" placeholder="Организация"  type="text" name="organization">
           </div>
           <div class="new_event">Краткое описание
                 <input class="new_event_input" placeholder="Текст..."  type="text" name="description">
           </div>
           <div class="new_event">Адрес
                 <input class="new_event_input" placeholder="Введите адрес"  type="text" name="address">
           </div>
           <div class="new_event">Полное описание
                 <input class="new_event_input" placeholder="Текст..."  type="text" name="description_full">
           </div>
           <div class="new_event">Категория мероприятия
                <select name="category">
                    <option selected name="nauka" value="Наука">Наука</option>
                    <option name="languages" value="Иностранные языки">Иностранные языки</option>
                    <option name="itinternet" value="IT и Интернет">IT и Интернет</option>
                    <option name="concert" value="Концерты">Концерты</option>
                    <option name="food" value="Еда">Еда</option>
                    <option name="nauka" value="Красота и здоровье">Красота и здоровье</option>
                </select>
           </div>


       <div id="instruction_plus_map">Инструкция по добавлению карты
              <div class="instruction_map_words">Перейдем на сайт —<a href="https://www.google.com/maps/" target="_blank">google.com/maps</a>  и выберем нужный адрес в строке поиска.</div>
              <div class="instruction_map_img"><img src="img/instructionmap1.jpg"></div>
              <div class="instruction_map_words">Обратите внимание, у карты есть два режима, упрощенный и полный.
              Если вы попали на упрощенный вид, то нужно перейти на полный вид.
              Для этого нужно просто нажать на значок в правом нижнем углу.
              <br>После чего, нужно в левом меню, выбрать пункт – «Поделиться».</div>
              <div class="instruction_map_img"><img src="img/instructionmap2.jpg"></div>
              <div class="instruction_map_words">И выбрать пункт – «Код»</div>
              <div class="instruction_map_img"><img src="img/instructionmap3.jpg"></div>
              <div class="instruction_map_words">После чего, у вас сразу отобразится карта с несколькими настройками:
              масштаб и размер карты; маленький, средний, большой, пользовательский.
              После чего, вы нужно скопировать код.</div>
              <div class="instruction_map_img"><img src="img/instructionmap4.jpg"></div>
              <div class="instruction_map_words"> После этого вставьте код в поле ниже</div>
              <div><input class="new_event_input" placeholder="Код карты"  type="text" name="map"></div>
              </div>
              <div>
              <button name="button" type="submit"  id="add_event_button">Добавить событие на Event Calendar</button>
              </div>
          </form>';
     }
else {
    if (empty($_POST['name'])) {
        echo 'Введите имя';
    } elseif (empty($_POST['date'])) {
        echo 'Введите дату';
    } elseif (empty($_POST['hour_begin'])) {
        echo 'Введите час начала';
    } elseif (empty($_POST['hour_end'])) {
        echo 'Введите час окончания';
    } elseif (empty($_POST['organization'])) {
        echo 'Введите организацию';
    } elseif (empty($_POST['description'])) {
        echo 'Введите описание';
    } elseif (empty($_POST['address'])) {
        echo 'Введите адрес';
    } elseif (empty($_POST['description_full'])) {
        echo 'Введите полное описание';
    } elseif (empty($_POST['category'])) {
        echo 'Введите категорию';
    } elseif (empty($_POST['map'])) {
        echo 'Введите карту';
    } else {
        $name = $_POST['name'];
        $date = $_POST['date'];
        $hour_begin = $_POST['hour_begin'];
        $hour_end = $_POST['hour_end'];
        $organization = $_POST['organization'];
        $description = $_POST['description'];
        $address = $_POST['address'];
        $description_full = $_POST['description_full'];
        $category = $_POST['category'];
        $map = $_POST['map'];


        $query = "SELECT * FROM event WHERE name='" . $name . "' and date='" . $date . "'";
        $sql = mysqli_query($link, $query);
        $array = mysqli_fetch_array($sql);

        if (empty($array)) {
            $queryinsertevent = "INSERT INTO event (name, date, hour_begin, hour_end, organization, description, address, 
        description_full, category, map) values('" . $name . "', '" . $date . "', '" . $hour_begin . "', '" . $hour_end . "', 
        '" . $organization . "', '" . $description . "',
        '" . $address . "','" . $description_full . "','" . $category . "','" . $map . "')";
            $sqlinsertevent = mysqli_query($link, $queryinsertevent);
            echo 'Событие успешно добавлено';
        }
    }
}

include("footer.php"); ?>