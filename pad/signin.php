<?php include("header.php");
$login = null;
$pass = null;
if(isset($_POST['login'])) {
    $login = $_REQUEST['login'];
    $pass = $_REQUEST['password'];
    $query ="SELECT * FROM users WHERE login='".$login."' and password='".$pass."'";
    $sql=mysqli_query($link, $query);
    $array=mysqli_fetch_array($sql);

    if(!empty($array)) {
        session_start();
        $_SESSION['user']=$login;
        header("Location:homepage.php");
        exit();
    }
    else{
        echo 'Введите существующие логин и пароль.<br> Данная пара не подходит';
    }
}

?>
<form id="signin_form" method="post">
    <h2>Вход на EventCalendar</h2>
    <div id="em_personal_data">
        <div id="email_personal_data">Логин</div>
        <input class="inputsignin" placeholder="Ваш логин"  type="login" name="login"></div>
    <div id="pass_personal_data">
        <div id="password_personal_data">Пароль</div>
        <input class="inputsignin" placeholder="Ваш пароль"  type="password" id="user_password" name="password">
    </div>
    <button name="button" type="submit"  id="signin_button">Войти</button>
</form>
<?php include("footer.php"); ?>
