<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EL [EVENT CALENDAR]</title>
    <link rel="stylesheet" type="text/css" href="css/aboutevent.css">
    <link rel="stylesheet" type="text/css" href="css/account_user.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/add_event.css">
    <link rel="stylesheet" type="text/css" href="css/alleventscategory.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/homepagecss.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="stylesheet" type="text/css" href="css/registration.css">
    <link rel="stylesheet" type="text/css" href="css/signin.css">

</head>
<?php
require 'conf.php';
$link = mysqli_connect($dbHost, $dbUsername, $dbUserPassword, $dbName);
session_start();
if(!isset($_SESSION['user'])) {
    echo '<body>
          <div id="top_menu">
               <ul id="topmenu_ul">
                    <li class="topmenu_li"><a class="topmenu_li" href="homepage.php">Главная</a></li>
                    <li class="topmenu_li"><a class="topmenu_li" href="alleventscategory.php">События</a></li>
                    <div>
                        <form id="search_type" method="get" action="search.php">
                            <input id="input_search" name="search" placeholder="Искать здесь..." type="search">
                            <button id="b_search" type="submit">Найти</button>
                          </form>
                    </div>    
                    <li id="rightitem" class="topmenu_li"><a class="topmenu_li" href="signin.php">Войти</a></li>
                    <li id="registrationitem" class="topmenu_li"><a class="topmenu_li" href="registration.php">Регистрация</a></li>
               </ul>
          </div>';
}
else {
    $log=$_SESSION['user'];
    $query3 ="SELECT * FROM users WHERE login='".$log."'";
    $sql3=mysqli_query($link, $query3);
    $array=mysqli_fetch_array($sql3);
    $rol = $array['role'];

    $_SESSION['role']=$rol;

    if($rol=='user') {
        echo '<body>
               <div id="top_menu">
                    <ul id="topmenu_ul">
                        <li class="topmenu_li"><a class="topmenu_li" href="homepage.php">Главная</a></li>
                        <li class="topmenu_li"><a class="topmenu_li" href="alleventscategory.php">События</a></li>
                        <div>
                        <form id="search_type" method="get" action="search.php">
                            <input name="search" placeholder="Искать здесь..." type="search">
                            <button type="submit">Найти</button>
                          </form>
                        </div>  
                        <li id="rightitem" class="topmenu_li">
                        <a class="topmenu_li" href="account_user.php?'.$array['id_user'].'">'.$log.'</a>
                        </li>
                        <li id="registrationitem" class="topmenu_li"><a class="topmenu_li" href="signout.php">Выход</a>
                        </li>
                    </ul>
               </div>';
    }

    elseif ($rol=='organization') {
        echo '<body>
                <div id="top_menu">
                    <ul id="topmenu_ul">
                        <li class="topmenu_li"><a class="topmenu_li" href="homepage.php">Главная</a></li>
                        <li class="topmenu_li"><a class="topmenu_li" href="add_event.php">Добавить событие</a></li>
                        <li class="topmenu_li"><a class="topmenu_li" href="alleventscategory.php">События</a></li>
                        <div>
                        <form id="search_type" method="get" action="search.php">
                            <input name="search" placeholder="Искать здесь..." type="search">
                            <button type="submit">Найти</button>
                          </form>
                        </div>  
                        <li id="rightitem" class="topmenu_li">
                        <a class="topmenu_li" href="account_user.php?'.$array['id_user'].'">'.$log.'</a>
                        </li>
                        <li id="registrationitem" class="topmenu_li"><a class="topmenu_li" href="signout.php">Выход</a>
                        </li>
                    </ul>
                </div>';
    }

    else {
        echo '<body>
                <div id="top_menu">
                    <ul id="topmenu_ul">
                        <li class="topmenu_li"><a class="topmenu_li" href="homepage.php">Главная</a></li>
                        <li class="topmenu_li"><a class="topmenu_li" href="admin.php">Редактирование</a></li>
                        <li class="topmenu_li"><a class="topmenu_li" href="alleventscategory.php">События</a></li>
                        <div>
                        <form id="search_type" method="get" action="search.php">
                            <input name="search" placeholder="Искать здесь..." type="search">
                            <button type="submit">Найти</button>
                          </form>
                        </div> 
                        <li id="rightitem" class="topmenu_li">
                        <a class="topmenu_li" href="account_user.php?'.$array['id_user'].'">'.$log.'</a>
                        </li>
                        <li id="registrationitem" class="topmenu_li"><a class="topmenu_li" href="signout.php">Выход</a></li>
                    </ul>
                </div>';
    }
}
echo '  <div id="container">';
mysqli_set_charset($link,"utf8"); ?>