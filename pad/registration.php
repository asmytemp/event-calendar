<?php include("header.php");
$email=null;
$login=null;
$password=null;
$role=null;

if(isset($_POST['login'])) {
    $email=$_REQUEST['email'];
    $login=$_REQUEST['login'];
    $password=$_REQUEST['password'];
    $role=$_REQUEST['role'];
    $query="SELECT * FROM users WHERE email='".$email."' and login='".$login."'";
    $sql=mysqli_query($link, $query);
    $array=mysqli_fetch_array($sql);
    if(empty($array)) {
        $queryinsert="INSERT INTO users (login, password, email, role) 
        values('".$login."', '".$password."', '".$email."', '".$role."')";
        $sqlinsert=mysqli_query($link, $queryinsert);
        header("Location:signin.php");
        }
    else{
        echo 'Такой пользователь существует';
    }
}


?>

<form id="registration_form" method="post">
    <h2 id="registrationh2">Регистрация на сервисе EventCalendar</h2>

    <div class="newuser">E-mail</div>
    <input class="newuserinput" placeholder="Ваш e-mail"  type="email" name="email">

    <div class="newuser">Логин</div>
    <input class="newuserinput" placeholder="Ваш логин"  name="login">

    <div class="newuser">Пароль</div>
    <input class="newuserinput" placeholder="Ваш пароль"  type="password" name="password">

    <div class="newuser">Ваша роль</div>
    <p><input type="radio" value="organization" name="role">Организатор</p>
    <p><input type="radio" value="user" name="role" checked>Пользователь</p>

    <button name="button" type="submit"  id="registration_button">Регистрация</button>
</form>
<?php include("footer.php"); ?>
